<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_inquiries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('reference')->unique(); // SRV-2025-001 format
            $table->string('service_type'); // business_consultancy, accounting, tax_advisory, etc.
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->text('message')->nullable();
            $table->json('form_data'); // service-specific form fields
            $table->string('locale', 2)->default('en'); // en, fr
            $table->enum('status', ['new', 'in_progress', 'quoted', 'accepted', 'completed', 'cancelled'])->default('new');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->decimal('estimated_value', 10, 2)->nullable(); // estimated project value
            $table->timestamp('responded_at')->nullable();
            $table->uuid('assigned_to')->nullable(); // admin user id
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index(['service_type', 'created_at']);
            $table->index(['status', 'created_at']);
            $table->index(['assigned_to', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_inquiries');
    }
};
