<?php

namespace Database\Factories;

use App\Models\ContactInquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactInquiryFactory extends Factory
{
    protected $model = ContactInquiry::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'company' => $this->faker->company(),
            'service' => $this->faker->randomElement([
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
                'market_research'
            ]),
            'message' => $this->faker->paragraph(),
            'locale' => $this->faker->randomElement(['en', 'fr']),
            'status' => $this->faker->randomElement(['new', 'in_progress', 'responded', 'closed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
            'metadata' => null,
            'responded_at' => null,
            'assigned_to' => null,
        ];
    }

    public function new(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'new',
        ]);
    }

    public function withService(string $service): static
    {
        return $this->state(fn (array $attributes) => [
            'service' => $service,
        ]);
    }

    public function responded(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'responded',
            'responded_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
        ]);
    }

    public function highPriority(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority' => 'high',
        ]);
    }
}
