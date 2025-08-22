<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceInquiryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ContactInquiryController as AdminContactInquiryController;
use App\Http\Controllers\Admin\ServiceInquiryController as AdminServiceInquiryController;
use Illuminate\Support\Facades\Route;

// Public routes (existing)
Route::get('/', function () {
    return redirect('/en');
});

// Localized routes (existing)
Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('contact');

    Route::get('/services/{service}', function ($locale, $service) {
        $validServices = [
            'business-consultancy', 'accounting', 'tax-advisory', 'financial-planning',
            'business-registration', 'audit-compliance', 'corporate-training',
            'career-development', 'feasibility-studies', 'data-analytics', 'market-research'
        ];

        if (!in_array($service, $validServices)) {
            abort(404);
        }

        $viewName = 'pages.services.' . str_replace('-', '-', $service);
        return view($viewName);
    })->name('services.show');
});

// API routes for form submissions (existing)
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/services/inquiry', [ServiceInquiryController::class, 'submit'])->name('services.inquiry');

// Admin Dashboard routes
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin inquiry management routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('contact-inquiries', AdminContactInquiryController::class)
            ->except(['create', 'store']);
        Route::resource('service-inquiries', AdminServiceInquiryController::class)
            ->except(['create', 'store']);
    });
});

require __DIR__.'/auth.php';
