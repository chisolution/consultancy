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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->string('type')->default('page'); // page, home, about, contact, etc.
            $table->json('title'); // Multi-language titles
            $table->json('content'); // Multi-language content
            $table->json('excerpt')->nullable(); // Multi-language excerpts
            $table->json('meta_title')->nullable(); // SEO meta titles
            $table->json('meta_description')->nullable(); // SEO meta descriptions
            $table->json('meta_keywords')->nullable(); // SEO keywords
            $table->string('featured_image')->nullable(); // Main page image
            $table->json('gallery')->nullable(); // Additional images
            $table->json('custom_fields')->nullable(); // Additional custom data
            $table->boolean('is_published')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
