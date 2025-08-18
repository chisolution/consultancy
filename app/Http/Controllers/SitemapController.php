<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\LocaleHelper;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap for the website
     */
    public function index(): Response
    {
        $urls = $this->generateSitemapUrls();

        $xml = $this->generateSitemapXml($urls);

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap URLs for all pages and locales
     */
    private function generateSitemapUrls(): array
    {
        $urls = [];
        $supportedLocales = LocaleHelper::getSupportedLocales();

        // Define all public routes
        $routes = [
            'home' => [
                'priority' => '1.0',
                'changefreq' => 'weekly'
            ],
            'services' => [
                'priority' => '0.9',
                'changefreq' => 'weekly'
            ],
            'services.business-consultancy' => [
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            'services.accounting' => [
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            'services.tax-advisory' => [
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            'services.financial-planning' => [
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            'services.business-registration' => [
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            'services.audit-compliance' => [
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            'services.corporate-training' => [
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ],
            'services.career-development' => [
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ],
            'about' => [
                'priority' => '0.6',
                'changefreq' => 'monthly'
            ],
            'contact' => [
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ]
        ];

        // Generate URLs for each route and locale
        foreach ($routes as $routeName => $config) {
            foreach ($supportedLocales as $locale => $name) {
                try {
                    $url = LocaleHelper::route($routeName, [], $locale);
                    $urls[] = [
                        'loc' => $url,
                        'lastmod' => now()->toISOString(),
                        'changefreq' => $config['changefreq'],
                        'priority' => $config['priority'],
                        'hreflang' => $locale
                    ];
                } catch (\Exception $e) {
                    // Skip if route doesn't exist
                    continue;
                }
            }
        }

        return $urls;
    }

    /**
     * Generate XML sitemap content
     */
    private function generateSitemapXml(array $urls): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . $url['lastmod'] . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
