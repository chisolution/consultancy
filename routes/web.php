<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\SitemapController;

// Default route (redirect to default language)
Route::get('/', function () {
    return redirect('/en');
});

// Language switch route
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Localized routes
Route::prefix('{locale}')->where(['locale' => 'en|fr'])->group(function () {
    // Homepage
    Route::get('/', function () {
        return view('pages.home');
    })->name('home');

    // Services
    Route::get('/services', function () {
        return view('pages.services');
    })->name('services');

    // About
    Route::get('/about', function () {
        return view('pages.about');
    })->name('about');

    // Contact
    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('contact');

    // Individual service pages
    Route::get('/services/business-consultancy', function () {
        return view('pages.services.business-consultancy');
    })->name('services.business-consultancy');

    Route::get('/services/accounting', function () {
        return view('pages.services.accounting');
    })->name('services.accounting');

    Route::get('/services/tax-advisory', function () {
        return view('pages.services.tax-advisory');
    })->name('services.tax-advisory');

    Route::get('/services/financial-planning', function () {
        return view('pages.services.financial-planning');
    })->name('services.financial-planning');

    Route::get('/services/business-registration', function () {
        return view('pages.services.business-registration');
    })->name('services.business-registration');

    Route::get('/services/audit-compliance', function () {
        return view('pages.services.audit-compliance');
    })->name('services.audit-compliance');

    Route::get('/services/corporate-training', function () {
        return view('pages.services.corporate-training');
    })->name('services.corporate-training');

    Route::get('/services/career-development', function () {
        return view('pages.services.career-development');
    })->name('services.career-development');

    // New Research & Analytics Services
    Route::get('/services/market-research', function () {
        return view('pages.services.market-research');
    })->name('services.market-research');

    Route::get('/services/feasibility-studies', function () {
        return view('pages.services.feasibility-studies');
    })->name('services.feasibility-studies');

    Route::get('/services/data-analytics', function () {
        return view('pages.services.data-analytics');
    })->name('services.data-analytics');
});
