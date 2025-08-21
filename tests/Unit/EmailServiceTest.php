<?php

namespace Tests\Unit;

use App\Models\ContactInquiry;
use App\Models\ServiceInquiry;
use App\Services\EmailService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use Exception;
use PHPUnit\Framework\Attributes\Test;

class EmailServiceTest extends TestCase
{
    use RefreshDatabase;

    protected EmailService $emailService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->emailService = new EmailService();
        Mail::fake();
        Log::fake();
    }

    #[Test]
    public function it_sends_contact_inquiry_notifications_successfully()
    {
        $inquiry = ContactInquiry::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'reference' => 'INQ-2025-001'
        ]);

        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Verify admin emails are sent
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) use ($inquiry) {
            return $mail->hasTo(config('mail.admin_emails.0', 'admin@consultancy.rw'));
        });

        // Verify customer confirmation email is sent
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) use ($inquiry) {
            return $mail->hasTo($inquiry->email);
        });
    }

    #[Test]
    public function it_sends_service_inquiry_notifications_successfully()
    {
        $inquiry = ServiceInquiry::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'service_type' => 'business_consultancy',
            'reference' => 'SRV-2025-001'
        ]);

        $this->emailService->sendServiceInquiryNotifications($inquiry);

        // Verify admin emails are sent
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) use ($inquiry) {
            return $mail->hasTo(config('mail.admin_emails.0', 'admin@consultancy.rw'));
        });

        // Verify customer confirmation email is sent
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) use ($inquiry) {
            return $mail->hasTo($inquiry->email);
        });
    }

    #[Test]
    public function it_handles_email_sending_failures_gracefully()
    {
        // Mock Mail to throw an exception
        Mail::shouldReceive('send')->andThrow(new Exception('SMTP connection failed'));

        $inquiry = ContactInquiry::factory()->create();

        // This should not throw an exception
        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Verify error is logged
        Log::assertLogged('error', function ($message, $context) use ($inquiry) {
            return str_contains($message, 'Failed to send contact inquiry email notifications') &&
                   $context['inquiry_id'] === $inquiry->id;
        });
    }

    #[Test]
    public function it_logs_successful_email_sending()
    {
        $inquiry = ContactInquiry::factory()->create([
            'reference' => 'INQ-2025-001'
        ]);

        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Verify success is logged
        Log::assertLogged('info', function ($message, $context) use ($inquiry) {
            return str_contains($message, 'Contact inquiry email notifications sent successfully') &&
                   $context['inquiry_id'] === $inquiry->id &&
                   $context['reference'] === 'INQ-2025-001';
        });
    }

    #[Test]
    public function it_sends_emails_to_multiple_admin_addresses()
    {
        Config::set('mail.admin_emails', ['admin1@consultancy.rw', 'admin2@consultancy.rw']);

        $inquiry = ContactInquiry::factory()->create();

        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Verify emails are sent to both admin addresses
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) {
            return $mail->hasTo('admin1@consultancy.rw');
        });

        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) {
            return $mail->hasTo('admin2@consultancy.rw');
        });
    }

    #[Test]
    public function it_includes_service_display_name_for_service_inquiries()
    {
        $inquiry = ServiceInquiry::factory()->create([
            'service_type' => 'business_consultancy'
        ]);

        $this->emailService->sendServiceInquiryNotifications($inquiry);

        // The service should have a display name property
        $this->assertNotNull($inquiry->service_display_name);
        $this->assertEquals('Business Consultancy', $inquiry->service_display_name);
    }

    #[Test]
    public function it_handles_missing_admin_email_configuration()
    {
        Config::set('mail.admin_emails', []);

        $inquiry = ContactInquiry::factory()->create();

        // Should not throw an exception even with no admin emails configured
        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Should still send customer confirmation
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) use ($inquiry) {
            return $mail->hasTo($inquiry->email);
        });
    }

    #[Test]
    public function it_sets_correct_reply_to_address()
    {
        $inquiry = ContactInquiry::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Verify admin email has reply-to set to customer email
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) use ($inquiry) {
            return $mail->hasReplyTo($inquiry->email, $inquiry->name);
        });
    }

    #[Test]
    public function it_handles_partial_email_failures()
    {
        Config::set('mail.admin_emails', ['admin1@consultancy.rw', 'admin2@consultancy.rw']);

        $inquiry = ContactInquiry::factory()->create();

        // Mock Mail to fail for first admin but succeed for others
        Mail::shouldReceive('send')
            ->times(3) // 2 admin emails + 1 customer email
            ->andReturnUsing(function ($view, $data, $callback) {
                static $callCount = 0;
                $callCount++;
                
                if ($callCount === 1) {
                    throw new Exception('First admin email failed');
                }
                
                return true;
            });

        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Should log the failure but continue with other emails
        Log::assertLogged('error');
    }

    #[Test]
    public function it_provides_service_display_names_for_all_service_types()
    {
        $serviceTypes = [
            'business_consultancy' => 'Business Consultancy',
            'accounting' => 'Accounting',
            'tax_advisory' => 'Tax Advisory',
            'financial_planning' => 'Financial Planning',
            'business_registration' => 'Business Registration',
            'audit_compliance' => 'Audit & Compliance',
            'training' => 'Corporate Training',
            'career_development' => 'Career Development',
            'feasibility_studies' => 'Feasibility Studies',
            'data_analytics' => 'Data Analytics',
            'market_research' => 'Market Research'
        ];

        foreach ($serviceTypes as $serviceType => $expectedDisplayName) {
            $inquiry = ServiceInquiry::factory()->create([
                'service_type' => $serviceType
            ]);

            $this->emailService->sendServiceInquiryNotifications($inquiry);

            $this->assertEquals($expectedDisplayName, $inquiry->service_display_name);
        }
    }
}
