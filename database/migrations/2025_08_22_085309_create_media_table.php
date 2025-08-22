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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('filename'); // Original filename
            $table->string('path'); // Storage path
            $table->string('disk')->default('public'); // Storage disk
            $table->string('mime_type'); // File MIME type
            $table->bigInteger('size'); // File size in bytes
            $table->json('alt_text')->nullable(); // Multi-language alt text
            $table->json('caption')->nullable(); // Multi-language captions
            $table->json('metadata')->nullable(); // Additional metadata (dimensions, etc.)
            $table->string('type')->default('image'); // image, document, video, etc.
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
