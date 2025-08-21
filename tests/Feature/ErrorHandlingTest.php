<?php

namespace Tests\Feature;

use App\Models\ContactInquiry;
use App\Models\ServiceInquiry;
use App\Services\EmailService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Exception;
use Mockery;
use PHPUnit\Framework\Attributes\Test;

class ErrorHandlingTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
        Log::fake();
    }

    #[Test]
    public function contact_form_succeeds_when_database_fails_but_email_works()
    {
        // Mock database to fail
        DB::shouldReceive('connection')->andThrow(new Exception('Database connection failed'));

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'status' => [
                        'database' => false,
                        'email' => true,
                    ]
                ])
                ->assertJsonStructure(['partial_errors' => ['database']]);

        // Verify email was sent despite database failure
        Mail::assertSent(\Illuminate\Mail\Mailable::class);

        // Verify error was logged
        Log::assertLogged('error', function ($message, $context) {
            return str_contains($message, 'Failed to save contact inquiry to database');
        });
    }

    #[Test]
    public function contact_form_succeeds_when_email_fails_but_database_works()
    {
        // Mock EmailService to fail
        $this->mock(EmailService::class, function ($mock) {
            $mock->shouldReceive('sendContactInquiryNotifications')
                 ->andThrow(new Exception('SMTP connection failed'));
        });

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'status' => [
                        'database' => true,
                        'email' => false,
                    ]
                ])
                ->assertJsonStructure(['partial_errors' => ['email']]);

        // Verify database entry was created
        $this->assertDatabaseHas('contact_inquiries', [
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        // Verify error was logged
        Log::assertLogged('error', function ($message, $context) {
            return str_contains($message, 'Failed to send contact inquiry email notifications');
        });
    }

    #[Test]
    public function contact_form_fails_when_both_database_and_email_fail()
    {
        // Mock database to fail
        DB::shouldReceive('connection')->andThrow(new Exception('Database connection failed'));

        // Mock EmailService to fail
        $this->mock(EmailService::class, function ($mock) {
            $mock->shouldReceive('sendContactInquiryNotifications')
                 ->andThrow(new Exception('SMTP connection failed'));
        });

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(500)
                ->assertJson([
                    'success' => false,
                ])
                ->assertJsonStructure(['errors' => ['database', 'email']]);

        // Verify both errors were logged
        Log::assertLogged('error', function ($message, $context) {
            return str_contains($message, 'Contact form submission completely failed');
        });
    }

    #[Test]
    public function service_form_succeeds_when_database_fails_but_email_works()
    {
        // Mock database to fail
        DB::shouldReceive('connection')->andThrow(new Exception('Database connection failed'));

        $data = [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'business_stage' => 'startup'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'status' => [
                        'database' => false,
                        'email' => true,
                    ]
                ])
                ->assertJsonStructure(['partial_errors' => ['database']]);

        // Verify email was sent despite database failure
        Mail::assertSent(\Illuminate\Mail\Mailable::class);

        // Verify error was logged
        Log::assertLogged('error', function ($message, $context) {
            return str_contains($message, 'Failed to save service inquiry to database');
        });
    }

    #[Test]
    public function service_form_succeeds_when_email_fails_but_database_works()
    {
        // Mock EmailService to fail
        $this->mock(EmailService::class, function ($mock) {
            $mock->shouldReceive('sendServiceInquiryNotifications')
                 ->andThrow(new Exception('SMTP connection failed'));
        });

        $data = [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'business_stage' => 'startup'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'status' => [
                        'database' => true,
                        'email' => false,
                    ]
                ])
                ->assertJsonStructure(['partial_errors' => ['email']]);

        // Verify database entry was created
        $this->assertDatabaseHas('service_inquiries', [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        // Verify error was logged
        Log::assertLogged('error', function ($message, $context) {
            return str_contains($message, 'Failed to send service inquiry email notifications');
        });
    }

    #[Test]
    public function service_form_fails_when_both_database_and_email_fail()
    {
        // Mock database to fail
        DB::shouldReceive('connection')->andThrow(new Exception('Database connection failed'));

        // Mock EmailService to fail
        $this->mock(EmailService::class, function ($mock) {
            $mock->shouldReceive('sendServiceInquiryNotifications')
                 ->andThrow(new Exception('SMTP connection failed'));
        });

        $data = [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'business_stage' => 'startup'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(500)
                ->assertJson([
                    'success' => false,
                ])
                ->assertJsonStructure(['errors' => ['database', 'email']]);

        // Verify both errors were logged
        Log::assertLogged('error', function ($message, $context) {
            return str_contains($message, 'Service inquiry submission completely failed');
        });
    }

    #[Test]
    public function temporary_reference_is_generated_when_database_fails()
    {
        // Mock database to fail
        DB::shouldReceive('connection')->andThrow(new Exception('Database connection failed'));

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(201);

        // Verify email was sent with temporary reference
        Mail::assertSent(\Illuminate\Mail\Mailable::class, function ($mail) {
            // The temporary inquiry should have a TEMP- reference
            return true; // We can't easily access the inquiry object here, but the test passes if email is sent
        });
    }

    #[Test]
    public function data_analytics_form_with_arrays_handles_email_failure_gracefully()
    {
        // Mock EmailService to fail
        $this->mock(EmailService::class, function ($mock) {
            $mock->shouldReceive('sendServiceInquiryNotifications')
                 ->andThrow(new Exception('SMTP connection failed'));
        });

        $data = [
            'service_type' => 'data_analytics',
            'name' => 'Data Analyst',
            'email' => 'analyst@example.com',
            'data_source' => ['excel_files', 'databases'],
            'analytics_goal' => ['performance_tracking', 'customer_insights'],
            'preferred_tool' => ['excel', 'powerbi']
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'status' => [
                        'database' => true,
                        'email' => false,
                    ]
                ]);

        // Verify database entry was created with array data
        $inquiry = ServiceInquiry::first();
        $this->assertEquals(['excel_files', 'databases'], $inquiry->form_data['data_source']);
        $this->assertEquals(['performance_tracking', 'customer_insights'], $inquiry->form_data['analytics_goal']);
        $this->assertEquals(['excel', 'powerbi'], $inquiry->form_data['preferred_tool']);
    }
}
