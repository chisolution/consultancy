<?php

namespace Tests\Feature;

use App\Models\ContactInquiry;
use App\Services\EmailService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Mockery;
use PHPUnit\Framework\Attributes\Test;

class ContactFormTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
    }

    #[Test]
    public function it_can_submit_a_valid_contact_form()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+250123456789',
            'company' => 'Test Company',
            'service' => 'business_consultancy',
            'message' => 'This is a test message',
            'locale' => 'en'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'message' => __('common.contact.form.success_message')
                ]);

        $this->assertDatabaseHas('contact_inquiries', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'service' => 'business_consultancy'
        ]);
    }

    #[Test]
    public function it_validates_required_fields()
    {
        $response = $this->postJson('/contact/submit', []);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['name', 'email', 'message']);
    }

    #[Test]
    public function it_validates_email_format()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'message' => 'Test message'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);
    }

    #[Test]
    public function it_validates_service_selection()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'service' => 'invalid_service',
            'message' => 'Test message'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['service']);
    }

    #[Test]
    public function it_accepts_valid_service_types()
    {
        $validServices = [
            'business_consultancy',
            'accounting',
            'tax_advisory',
            'financial_planning',
            'business_registration'
        ];

        foreach ($validServices as $index => $service) {
            // Use different email and IP for each request to avoid rate limiting
            $data = [
                'name' => 'John Doe',
                'email' => "john{$index}@example.com",
                'service' => $service,
                'message' => 'Test message'
            ];

            $response = $this->withHeaders([
                'X-Forwarded-For' => "192.168.1.{$index}"
            ])->postJson('/contact/submit', $data);

            $response->assertStatus(201);
        }
    }

    #[Test]
    public function it_accepts_remaining_valid_service_types()
    {
        $validServices = [
            'audit_compliance',
            'training',
            'career_development',
            'feasibility_studies',
            'data_analytics',
            'market_research'
        ];

        foreach ($validServices as $index => $service) {
            // Use different email and IP for each request to avoid rate limiting
            $data = [
                'name' => 'Jane Doe',
                'email' => "jane{$index}@example.com",
                'service' => $service,
                'message' => 'Test message'
            ];

            $response = $this->withHeaders([
                'X-Forwarded-For' => "10.0.0.{$index}"
            ])->postJson('/contact/submit', $data);

            $response->assertStatus(201);
        }
    }

    #[Test]
    public function it_generates_unique_reference_numbers()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        $this->postJson('/contact/submit', $data);
        $this->postJson('/contact/submit', $data);

        $inquiries = ContactInquiry::all();
        $this->assertCount(2, $inquiries);
        $this->assertNotEquals($inquiries[0]->reference, $inquiries[1]->reference);
    }

    #[Test]
    public function it_stores_request_metadata()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        $response = $this->postJson('/contact/submit', $data);

        $inquiry = ContactInquiry::first();
        $this->assertNotNull($inquiry->ip_address);
        $this->assertNotNull($inquiry->user_agent);
        $this->assertEquals('en', $inquiry->locale);
    }

    #[Test]
    public function it_handles_optional_fields()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
            // phone, company, service are optional
        ];

        $response = $this->postJson('/contact/submit', $data);

        $response->assertStatus(201);
        
        $inquiry = ContactInquiry::first();
        $this->assertNull($inquiry->phone);
        $this->assertNull($inquiry->company);
        $this->assertNull($inquiry->service);
    }

    #[Test]
    public function it_respects_rate_limiting()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        // Make 11 requests (rate limit is 10 per minute)
        for ($i = 0; $i < 11; $i++) {
            $response = $this->postJson('/contact/submit', $data);
            
            if ($i < 10) {
                $response->assertStatus(201);
            } else {
                $response->assertStatus(429); // Too Many Requests
            }
        }
    }

    #[Test]
    public function it_sets_default_status_and_priority()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message'
        ];

        $this->postJson('/contact/submit', $data);

        $inquiry = ContactInquiry::first();
        $this->assertEquals('new', $inquiry->status);
        $this->assertEquals('medium', $inquiry->priority);
    }
}
