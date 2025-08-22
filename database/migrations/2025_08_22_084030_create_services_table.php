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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->json('name'); // Multi-language names
            $table->json('description'); // Multi-language descriptions
            $table->json('content'); // Multi-language full content
            $table->json('meta_title')->nullable(); // SEO meta titles
            $table->json('meta_description')->nullable(); // SEO meta descriptions
            $table->json('pricing')->nullable(); // Pricing information
            $table->string('icon')->nullable(); // Service icon
            $table->string('image')->nullable(); // Service main image
            $table->json('gallery')->nullable(); // Additional images
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
