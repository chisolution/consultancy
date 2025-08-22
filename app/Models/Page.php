<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'type',
        'title',
        'content',
        'excerpt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'featured_image',
        'gallery',
        'custom_fields',
        'is_published',
        'is_featured',
        'sort_order',
        'published_at',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'excerpt' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array',
        'gallery' => 'array',
        'custom_fields' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Get the page title for a specific locale
     */
    public function getTitle(string $locale = 'en'): string
    {
        return $this->title[$locale] ?? $this->title['en'] ?? '';
    }

    /**
     * Get the page content for a specific locale
     */
    public function getContent(string $locale = 'en'): string
    {
        return $this->content[$locale] ?? $this->content['en'] ?? '';
    }

    /**
     * Get the page excerpt for a specific locale
     */
    public function getExcerpt(string $locale = 'en'): string
    {
        return $this->excerpt[$locale] ?? $this->excerpt['en'] ?? '';
    }

    /**
     * Get the meta title for a specific locale
     */
    public function getMetaTitle(string $locale = 'en'): string
    {
        return $this->meta_title[$locale] ?? $this->meta_title['en'] ?? $this->getTitle($locale);
    }

    /**
     * Get the meta description for a specific locale
     */
    public function getMetaDescription(string $locale = 'en'): string
    {
        return $this->meta_description[$locale] ?? $this->meta_description['en'] ?? $this->getExcerpt($locale);
    }

    /**
     * Get the meta keywords for a specific locale
     */
    public function getMetaKeywords(string $locale = 'en'): string
    {
        return $this->meta_keywords[$locale] ?? $this->meta_keywords['en'] ?? '';
    }

    /**
     * Scope for published pages
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where(function ($q) {
                        $q->whereNull('published_at')
                          ->orWhere('published_at', '<=', now());
                    });
    }

    /**
     * Scope for featured pages
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordered pages
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title->en');
    }

    /**
     * Scope by page type
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }
}
