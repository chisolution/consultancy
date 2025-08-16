<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class LocaleHelper
{
    /**
     * Get the current locale
     */
    public static function getCurrentLocale(): string
    {
        return App::getLocale();
    }

    /**
     * Get all supported locales
     */
    public static function getSupportedLocales(): array
    {
        return [
            'en' => 'English',
            'fr' => 'Français',
        ];
    }

    /**
     * Generate a localized route URL
     */
    public static function route(string $name, array $parameters = [], string $locale = null): string
    {
        $locale = $locale ?: self::getCurrentLocale();
        $parameters = array_merge(['locale' => $locale], $parameters);
        
        return route($name, $parameters);
    }

    /**
     * Generate URL for switching language
     */
    public static function switchLanguageUrl(string $locale): string
    {
        return route('language.switch', ['locale' => $locale]);
    }

    /**
     * Get the alternate language
     */
    public static function getAlternateLocale(): string
    {
        return self::getCurrentLocale() === 'en' ? 'fr' : 'en';
    }

    /**
     * Check if current locale is RTL
     */
    public static function isRtl(): bool
    {
        // For future expansion to Arabic or other RTL languages
        return false;
    }

    /**
     * Get locale flag emoji
     */
    public static function getLocaleFlag(string $locale = null): string
    {
        $locale = $locale ?: self::getCurrentLocale();
        
        return match($locale) {
            'en' => '🇺🇸',
            'fr' => '🇫🇷',
            default => '🌐',
        };
    }

    /**
     * Get locale display name
     */
    public static function getLocaleDisplayName(string $locale = null): string
    {
        $locale = $locale ?: self::getCurrentLocale();
        $locales = self::getSupportedLocales();
        
        return $locales[$locale] ?? $locale;
    }
}
