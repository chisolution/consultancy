<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'path',
        'disk',
        'mime_type',
        'size',
        'alt_text',
        'caption',
        'metadata',
        'type',
        'is_public',
    ];

    protected $casts = [
        'alt_text' => 'array',
        'caption' => 'array',
        'metadata' => 'array',
        'is_public' => 'boolean',
    ];

    /**
     * Get the full URL to the media file
     */
    public function getUrl(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }

    /**
     * Get the alt text for a specific locale
     */
    public function getAltText(string $locale = 'en'): string
    {
        return $this->alt_text[$locale] ?? $this->alt_text['en'] ?? '';
    }

    /**
     * Get the caption for a specific locale
     */
    public function getCaption(string $locale = 'en'): string
    {
        return $this->caption[$locale] ?? $this->caption['en'] ?? '';
    }

    /**
     * Get formatted file size
     */
    public function getFormattedSize(): string
    {
        $bytes = $this->size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Check if the media is an image
     */
    public function isImage(): bool
    {
        return str_starts_with($this->mime_type, 'image/');
    }

    /**
     * Check if the media is a document
     */
    public function isDocument(): bool
    {
        return in_array($this->mime_type, [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }

    /**
     * Scope for public media
     */
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    /**
     * Scope by media type
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }
}
