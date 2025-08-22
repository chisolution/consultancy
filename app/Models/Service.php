<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'pricing',
        'icon',
        'image',
        'gallery',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'content' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'pricing' => 'array',
        'gallery' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the service name for a specific locale
     */
    public function getName(string $locale = 'en'): string
    {
        return $this->name[$locale] ?? $this->name['en'] ?? '';
    }

    /**
     * Get the service description for a specific locale
     */
    public function getDescription(string $locale = 'en'): string
    {
        return $this->description[$locale] ?? $this->description['en'] ?? '';
    }

    /**
     * Get the service content for a specific locale
     */
    public function getContent(string $locale = 'en'): string
    {
        return $this->content[$locale] ?? $this->content['en'] ?? '';
    }

    /**
     * Get the meta title for a specific locale
     */
    public function getMetaTitle(string $locale = 'en'): string
    {
        return $this->meta_title[$locale] ?? $this->meta_title['en'] ?? $this->getName($locale);
    }

    /**
     * Get the meta description for a specific locale
     */
    public function getMetaDescription(string $locale = 'en'): string
    {
        return $this->meta_description[$locale] ?? $this->meta_description['en'] ?? $this->getDescription($locale);
    }

    /**
     * Scope for active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured services
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordered services
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name->en');
    }
}
