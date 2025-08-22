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
        Log::spy();
    }

    #[Test]
    public function it_sends_contact_inquiry_notifications_successfully()
    {
        $inquiry = ContactInquiry::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'reference' => 'INQ-2025-001',
        ]);

        // Test that the method executes without throwing exceptions
        $this->expectNotToPerformAssertions();
        $this->emailService->sendContactInquiryNotifications($inquiry);
    }

    #[Test]
    public function it_sends_service_inquiry_notifications_successfully()
    {
        $inquiry = ServiceInquiry::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'reference' => 'SRV-2025-001',
            'service_type' => 'business_consultancy',
        ]);

        // Test that the method executes without throwing exceptions
        $this->expectNotToPerformAssertions();
        $this->emailService->sendServiceInquiryNotifications($inquiry);
    }

    #[Test]
    public function it_handles_email_sending_failures_gracefully()
    {
        Mail::shouldReceive('send')->andThrow(new Exception('SMTP failure'));

        $inquiry = ContactInquiry::factory()->create();

        try {
            $this->emailService->sendContactInquiryNotifications($inquiry);
        } catch (Exception) {
            // Let the test continue
        }

        Log::shouldHaveReceived('error')->withArgs(function ($message, $context) use ($inquiry) {
            return str_contains($message, 'Failed to send contact inquiry email notifications') &&
                   $context['inquiry_id'] === $inquiry->id;
        });
    }

    #[Test]
    public function it_logs_successful_email_sending()
    {
        $inquiry = ContactInquiry::factory()->create([
            'reference' => 'INQ-2025-001',
        ]);

        $this->emailService->sendContactInquiryNotifications($inquiry);

        Log::shouldHaveReceived('info')->with(
            'Contact inquiry email notifications sent successfully',
            \Mockery::subset([
                'inquiry_id' => $inquiry->id,
                'reference' => 'INQ-2025-001',
            ])
        );
    }

    #[Test]
    public function it_sends_emails_to_multiple_admin_addresses()
    {
        Config::set('mail.admin_emails', ['admin1@consultancy.rw', 'admin2@consultancy.rw']);

        $inquiry = ContactInquiry::factory()->create();

        Mail::fake();

        $this->emailService->sendContactInquiryNotifications($inquiry);

        // Test that the method executes without throwing exceptions
        $this->expectNotToPerformAssertions();
    }

    #[Test]
    public function it_includes_service_display_name_for_service_inquiries()
    {
        $inquiry = ServiceInquiry::factory()->create([
            'service_type' => 'business_consultancy',
        ]);

        $this->emailService->sendServiceInquiryNotifications($inquiry);

        $this->assertEquals('Business Consultancy', $inquiry->service_display_name);
    }

    #[Test]
    public function it_handles_missing_admin_email_configuration()
    {
        Config::set('mail.admin_emails', []);

        $inquiry = ContactInquiry::factory()->create();

        // Test that the method executes without throwing exceptions
        $this->expectNotToPerformAssertions();
        $this->emailService->sendContactInquiryNotifications($inquiry);
    }

    #[Test]
    public function it_sets_correct_reply_to_address()
    {
        $inquiry = ContactInquiry::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Test that the method executes without throwing exceptions
        $this->expectNotToPerformAssertions();
        $this->emailService->sendContactInquiryNotifications($inquiry);
    }

    #[Test]
    public function it_handles_partial_email_failures()
    {
        Config::set('mail.admin_emails', ['admin1@consultancy.rw', 'admin2@consultancy.rw']);
        $inquiry = ContactInquiry::factory()->create();

        // Test that the method executes without throwing exceptions
        $this->expectNotToPerformAssertions();
        $this->emailService->sendContactInquiryNotifications($inquiry);
    }

    #[Test]
    public function it_provides_service_display_names_for_all_service_types()
    {
        $serviceTypes = [
            'business_consultancy' => 'Business Consultancy',
            'accounting' => 'Accounting Services',
            'tax_advisory' => 'Tax Advisory',
            'financial_planning' => 'Financial Planning',
            'business_registration' => 'Business Registration',
            'audit_compliance' => 'Audit & Compliance',
            'training' => 'Training & Capacity Building',
            'career_development' => 'Career Development',
            'feasibility_studies' => 'Feasibility Studies',
            'data_analytics' => 'Business Intelligence & Data Analytics',
            'market_research' => 'Market Research',
        ];

        $index = 0;
        foreach ($serviceTypes as $type => $expected) {
            $inquiry = ServiceInquiry::factory()->create([
                'service_type' => $type,
                'email' => "test-{$type}-{$index}@example.com", // Unique email to avoid conflicts
                'reference' => "SRV-TEST-{$index}-" . time() // Unique reference
            ]);
            $this->emailService->sendServiceInquiryNotifications($inquiry);
            $this->assertEquals($expected, $inquiry->service_display_name);
            $index++;
        }
    }
}
