<?php

namespace Tests\Feature;

use App\Models\ServiceInquiry;
use App\Services\EmailService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ServiceFormTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
    }

    #[Test]
    public function it_can_submit_business_consultancy_form()
    {
        $data = [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+250123456789',
            'company' => 'Test Company',
            'business_stage' => 'startup',
            'message' => 'Need business consultation',
            'locale' => 'en'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(201)
                ->assertJson(['success' => true]);

        $this->assertDatabaseHas('service_inquiries', [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $inquiry = ServiceInquiry::first();
        $this->assertEquals('startup', $inquiry->form_data['business_stage']);
    }

    #[Test]
    public function it_can_submit_accounting_form()
    {
        $data = [
            'service_type' => 'accounting',
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'accounting_service' => 'bookkeeping',
            'company_size' => 'small',
            'message' => 'Need accounting services'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(201);

        $inquiry = ServiceInquiry::first();
        $this->assertEquals('accounting', $inquiry->service_type);
        $this->assertEquals('bookkeeping', $inquiry->form_data['accounting_service']);
        $this->assertEquals('small', $inquiry->form_data['company_size']);
    }

    #[Test]
    public function it_can_submit_data_analytics_form_with_arrays()
    {
        $data = [
            'service_type' => 'data_analytics',
            'name' => 'Data Analyst',
            'email' => 'analyst@example.com',
            'data_source' => ['excel_files', 'databases'],
            'analytics_goal' => ['performance_tracking', 'customer_insights'],
            'preferred_tool' => ['excel', 'powerbi'],
            'message' => 'Need data analytics'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(201);
        
        $inquiry = ServiceInquiry::first();
        $this->assertEquals(['excel_files', 'databases'], $inquiry->form_data['data_source']);
        $this->assertEquals(['performance_tracking', 'customer_insights'], $inquiry->form_data['analytics_goal']);
        $this->assertEquals(['excel', 'powerbi'], $inquiry->form_data['preferred_tool']);
    }

    #[Test]
    public function it_can_submit_market_research_form_with_arrays()
    {
        $data = [
            'service_type' => 'market_research',
            'name' => 'Market Researcher',
            'email' => 'researcher@example.com',
            'research_type' => ['market_entry', 'competitor_analysis'],
            'target_market' => ['rwanda', 'east_africa'],
            'message' => 'Need market research'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(201);
        
        $inquiry = ServiceInquiry::first();
        $this->assertEquals(['market_entry', 'competitor_analysis'], $inquiry->form_data['research_type']);
        $this->assertEquals(['rwanda', 'east_africa'], $inquiry->form_data['target_market']);
    }

    #[Test]
    public function it_validates_required_service_fields()
    {
        $response = $this->postJson('/services/inquiry', []);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['service_type', 'name', 'email']);
    }

    #[Test]
    public function it_validates_service_type()
    {
        $data = [
            'service_type' => 'invalid_service',
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['service_type']);
    }

    #[Test]
    public function it_validates_data_analytics_array_fields()
    {
        $data = [
            'service_type' => 'data_analytics',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'data_source' => ['invalid_source'],
            'analytics_goal' => ['invalid_goal'],
            'preferred_tool' => ['invalid_tool']
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['data_source.0', 'analytics_goal.0', 'preferred_tool.0']);
    }

    #[Test]
    public function it_validates_market_research_array_fields()
    {
        $data = [
            'service_type' => 'market_research',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'research_type' => ['invalid_type'],
            'target_market' => ['invalid_market']
        ];

        $response = $this->postJson('/services/inquiry', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['research_type.0', 'target_market.0']);
    }

    #[Test]
    public function it_generates_unique_service_references()
    {
        $data = [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];

        $this->postJson('/services/inquiry', $data);
        $this->postJson('/services/inquiry', $data);

        $inquiries = ServiceInquiry::all();
        $this->assertCount(2, $inquiries);
        $this->assertNotEquals($inquiries[0]->reference, $inquiries[1]->reference);
        $this->assertStringStartsWith('SRV-', $inquiries[0]->reference);
        $this->assertStringStartsWith('SRV-', $inquiries[1]->reference);
    }

    #[Test]
    public function it_stores_service_metadata()
    {
        $data = [
            'service_type' => 'business_consultancy',
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];

        $this->postJson('/services/inquiry', $data);

        $inquiry = ServiceInquiry::first();
        $this->assertNotNull($inquiry->ip_address);
        $this->assertNotNull($inquiry->user_agent);
        $this->assertEquals('en', $inquiry->locale);
        $this->assertEquals('new', $inquiry->status);
    }

    /**
     * Test all service types can be submitted successfully
     * #[Test]
     */
    public function it_accepts_all_valid_service_types()
    {
        $serviceTypes = [
            'business_consultancy' => ['business_stage' => 'startup'],
            'accounting' => ['accounting_service' => 'bookkeeping', 'company_size' => 'small'],
            'tax_advisory' => ['tax_issue' => 'tax_planning', 'entity_type' => 'individual'],
            'financial_planning' => ['age' => '26-35', 'financial_goals' => 'retirement'],
            'business_registration' => ['business_type' => 'sole_proprietorship', 'registration_location' => 'kigali'],
            'audit_compliance' => ['audit_type' => 'financial', 'company_size' => 'medium'],
            'training' => ['team_size' => '1-10', 'training_focus' => 'leadership'],
            'career_development' => ['career_stage' => 'mid', 'focus_area' => 'career_coaching'],
            'feasibility_studies' => ['business_concept' => 'Test concept', 'target_location' => 'kigali', 'investment_range' => 'under_50k'],
            'data_analytics' => ['data_source' => ['excel_files'], 'analytics_goal' => ['performance_tracking'], 'preferred_tool' => ['excel']],
            'market_research' => ['research_type' => ['market_entry'], 'target_market' => ['rwanda']]
        ];

        foreach ($serviceTypes as $serviceType => $formData) {
            $data = array_merge([
                'service_type' => $serviceType,
                'name' => 'Test User',
                'email' => 'test@example.com'
            ], $formData);

            $response = $this->postJson('/services/inquiry', $data);
            
            $response->assertStatus(201, "Failed for service type: {$serviceType}");
            
            $inquiry = ServiceInquiry::where('service_type', $serviceType)->first();
            $this->assertNotNull($inquiry, "Inquiry not created for service type: {$serviceType}");
        }
    }
}
