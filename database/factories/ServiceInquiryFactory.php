<?php

namespace Database\Factories;

use App\Models\ServiceInquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceInquiryFactory extends Factory
{
    protected $model = ServiceInquiry::class;

    public function definition(): array
    {
        $serviceType = $this->faker->randomElement([
            'business_consultancy',
            'accounting',
            'tax_advisory',
            'financial_planning',
            'business_registration',
            'audit_compliance',
            'training',
            'career_development',
            'feasibility_studies',
            'data_analytics',
            'market_research',
        ]);

        return [
            'service_type' => $serviceType,
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'company' => $this->faker->company(),
            'message' => $this->faker->paragraph(),
            'form_data' => $this->generateFormData($serviceType),
            'locale' => $this->faker->randomElement(['en', 'fr']),
            'status' => $this->faker->randomElement(['new', 'in_progress', 'quoted', 'accepted', 'completed', 'cancelled']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'estimated_value' => $this->faker->randomFloat(2, 500, 50000),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
            'responded_at' => null,
            'assigned_to' => null,
        ];
    }

    private function generateFormData(string $serviceType): array
    {
        return match ($serviceType) {
            'business_consultancy' => [
                'business_stage' => $this->faker->randomElement(['idea', 'startup', 'growth', 'established']),
                'industry' => $this->faker->randomElement(['technology', 'retail', 'manufacturing', 'services']),
            ],
            'accounting' => [
                'accounting_service' => $this->faker->randomElement(['bookkeeping', 'tax_preparation', 'financial_statements', 'payroll']),
                'company_size' => $this->faker->randomElement(['1-10', '11-50', '51-200', '200+']),
            ],
            'tax_advisory' => [
                'tax_issue' => $this->faker->randomElement(['compliance', 'planning', 'audit', 'dispute']),
                'entity_type' => $this->faker->randomElement(['individual', 'corporation', 'partnership', 'llc']),
            ],
            'financial_planning' => [
                'age' => $this->faker->randomElement(['18-25', '26-35', '36-45', '46-55', '56-65', '65+']),
                'financial_goals' => $this->faker->randomElement(['retirement', 'wealth_building', 'education', 'home_purchase', 'business_investment']),
            ],
            'business_registration' => [
                'business_type' => $this->faker->randomElement(['sole_proprietorship', 'partnership', 'llc', 'corporation']),
                'registration_location' => $this->faker->randomElement(['kigali', 'rwanda_other', 'douala', 'yaounde']),
            ],
            'audit_compliance' => [
                'audit_type' => $this->faker->randomElement(['financial', 'operational', 'compliance', 'internal']),
                'company_size' => $this->faker->randomElement(['1-10', '11-50', '51-200', '200+']),
            ],
            'training' => [
                'team_size' => $this->faker->randomElement(['1-10', '11-25', '26-50', '51-100', '100+']),
                'training_focus' => $this->faker->randomElement(['leadership', 'communication', 'technical', 'teamwork', 'customer_service']),
            ],
            'career_development' => [
                'career_stage' => $this->faker->randomElement(['entry', 'mid', 'senior', 'executive']),
                'focus_area' => $this->faker->randomElement(['career_coaching', 'resume_optimization', 'interview_prep', 'skill_development']),
            ],
            'feasibility_studies' => [
                'business_concept' => $this->faker->sentence(10),
                'target_location' => $this->faker->randomElement(['kigali', 'rwanda_other', 'douala', 'yaounde', 'cameroon_other']),
                'investment_range' => $this->faker->randomElement(['under_50k', '50k_200k', '200k_500k', '500k_1m', 'over_1m']),
            ],
            'data_analytics' => [
                'data_source' => $this->faker->randomElements(['excel_files', 'databases', 'web_data', 'surveys', 'multiple_sources'], 2),
                'analytics_goal' => $this->faker->randomElements(['performance_tracking', 'predictive_analytics', 'customer_insights', 'operational_efficiency', 'strategic_planning'], 2),
                'preferred_tool' => $this->faker->randomElements(['excel', 'powerbi', 'tableau', 'python', 'no_preference'], 2),
            ],
            'market_research' => [
                'research_type' => $this->faker->randomElements(['market_entry', 'competitor_analysis', 'customer_research', 'industry_analysis', 'opportunity_assessment'], 2),
                'target_market' => $this->faker->randomElements(['rwanda', 'cameroon', 'east_africa', 'central_africa', 'multiple_markets'], 2),
            ],
            default => [],
        };
    }

    public function businessConsultancy(): static
    {
        return $this->state(fn (array $attributes) => [
            'service_type' => 'business_consultancy',
            'form_data' => [
                'business_stage' => 'startup',
                'industry' => 'technology',
            ],
        ]);
    }

    public function dataAnalytics(): static
    {
        return $this->state(fn (array $attributes) => [
            'service_type' => 'data_analytics',
            'form_data' => [
                'data_source' => ['excel_files', 'databases'],
                'analytics_goal' => ['performance_tracking', 'customer_insights'],
                'preferred_tool' => ['excel', 'powerbi'],
            ],
        ]);
    }

    public function marketResearch(): static
    {
        return $this->state(fn (array $attributes) => [
            'service_type' => 'market_research',
            'form_data' => [
                'research_type' => ['market_entry', 'competitor_analysis'],
                'target_market' => ['rwanda', 'east_africa'],
            ],
        ]);
    }

    public function asNew(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'new',
        ]);
    }

    public function highValue(): static
    {
        return $this->state(fn (array $attributes) => [
            'estimated_value' => $this->faker->randomFloat(2, 10000, 100000),
            'priority' => 'high',
        ]);
    }
}
