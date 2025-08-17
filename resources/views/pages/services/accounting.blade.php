@extends('layouts.app')

@section('title', __('services.accounting.meta.title'))
@section('description', __('services.accounting.meta.description'))
@section('keywords', __('services.accounting.meta.keywords'))

@push('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.accounting.title') }}",
  "description": "{{ __('services.accounting.meta.description') }}",
  "provider": {
    "@type": "Organization",
    "name": "Professional Consultancy Rwanda",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "KG 123 St, Gasabo District",
      "addressLocality": "Kigali",
      "addressCountry": "RW"
    }
  },
  "areaServed": "Global",
  "serviceType": "Accounting Services",
  "offers": {
    "@type": "Offer",
    "price": "300",
    "priceCurrency": "USD",
    "description": "Starting from $300 for monthly accounting services"
  }
}
</script>
@endpush

@section('content')
<!-- Breadcrumb -->
<nav class="bg-gray-50 py-4" aria-label="Breadcrumb">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <ol class="flex items-center space-x-2 text-sm">
            <li><a href="{{ route('home', app()->getLocale()) }}" class="text-gray-500 hover:text-primary-600">{{ __('common.nav.home') }}</a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('services', app()->getLocale()) }}" class="text-gray-500 hover:text-primary-600">{{ __('common.nav.services') }}</a></li>
            <li class="text-gray-400">/</li>
            <li class="text-gray-900 font-medium">{{ __('services.accounting.title') }}</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-secondary-600 to-secondary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.accounting.title') }}
                </h1>
                <p class="text-xl text-secondary-100 mb-8 leading-relaxed">
                    {{ __('services.accounting.hero.subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#consultation" class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.accounting.cta.get_quote') }}
                    </a>
                    <a href="#services" class="border-2 border-white text-white hover:bg-white hover:text-secondary-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.accounting.cta.view_services') }}
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-3xl font-bold text-primary-300">200+</div>
                            <div class="text-secondary-100">{{ __('services.accounting.stats.clients_served') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">99.9%</div>
                            <div class="text-secondary-100">{{ __('services.accounting.stats.accuracy_rate') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">10+</div>
                            <div class="text-secondary-100">{{ __('services.accounting.stats.years_experience') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">24h</div>
                            <div class="text-secondary-100">{{ __('services.accounting.stats.turnaround') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Overview -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    {{ __('services.accounting.overview.title') }}
                </h2>
                <div class="prose prose-lg text-gray-600 mb-8">
                    <p>{{ __('services.accounting.overview.description') }}</p>
                    <p>{{ __('services.accounting.overview.expertise') }}</p>
                </div>
                
                <!-- Key Services -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.accounting.services.bookkeeping.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.accounting.services.bookkeeping.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.accounting.services.financial_statements.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.accounting.services.financial_statements.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.accounting.services.payroll.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.accounting.services.payroll.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.accounting.services.compliance.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.accounting.services.compliance.description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Contact -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.accounting.contact.title') }}</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-600">+250 XXX XXX XXX</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-600">accounting@consultancy.rw</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ __('services.accounting.contact.hours') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="block w-full bg-secondary-600 hover:bg-secondary-700 text-white text-center py-3 rounded-lg font-semibold mt-4 transition-colors duration-200">
                        {{ __('services.accounting.contact.cta') }}
                    </a>
                </div>
                
                <!-- Service Packages -->
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.accounting.packages.title') }}</h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-secondary-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.accounting.packages.basic.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.accounting.packages.basic.description') }}</p>
                            <p class="text-lg font-bold text-secondary-600">$300/{{ __('services.accounting.packages.month') }}</p>
                        </div>
                        <div class="border-l-4 border-primary-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.accounting.packages.standard.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.accounting.packages.standard.description') }}</p>
                            <p class="text-lg font-bold text-primary-600">$600/{{ __('services.accounting.packages.month') }}</p>
                        </div>
                        <div class="border-l-4 border-accent-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.accounting.packages.premium.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.accounting.packages.premium.description') }}</p>
                            <p class="text-lg font-bold text-accent-600">{{ __('services.accounting.packages.premium.price') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Detail Section -->
<section id="services" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.accounting.detailed_services.title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('services.accounting.detailed_services.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Bookkeeping -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.accounting.services.bookkeeping.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.accounting.services.bookkeeping.detailed_description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.bookkeeping.features.daily_transactions') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.bookkeeping.features.bank_reconciliation') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.bookkeeping.features.expense_tracking') }}
                    </li>
                </ul>
            </div>
            
            <!-- Financial Statements -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.accounting.services.financial_statements.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.accounting.services.financial_statements.detailed_description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.financial_statements.features.income_statement') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.financial_statements.features.balance_sheet') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.financial_statements.features.cash_flow') }}
                    </li>
                </ul>
            </div>
            
            <!-- Tax Preparation -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.accounting.services.tax_preparation.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.accounting.services.tax_preparation.detailed_description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.tax_preparation.features.vat_returns') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.tax_preparation.features.income_tax') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.accounting.services.tax_preparation.features.compliance') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Consultation Form -->
<section id="consultation" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.accounting.consultation.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.accounting.consultation.subtitle') }}
            </p>
        </div>
        
        <div class="bg-gray-50 rounded-2xl p-8">
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.company') }}</label>
                    <input type="text" id="company" name="company" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div class="md:col-span-2">
                    <label for="service_needed" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.accounting.form.service_needed') }}</label>
                    <select id="service_needed" name="service_needed" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                        <option value="">{{ __('services.accounting.form.select_service') }}</option>
                        <option value="bookkeeping">{{ __('services.accounting.services.bookkeeping.title') }}</option>
                        <option value="financial_statements">{{ __('services.accounting.services.financial_statements.title') }}</option>
                        <option value="tax_preparation">{{ __('services.accounting.services.tax_preparation.title') }}</option>
                        <option value="payroll">{{ __('services.accounting.services.payroll.title') }}</option>
                        <option value="full_service">{{ __('services.accounting.form.full_service') }}</option>
                    </select>
                </div>
                
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500" placeholder="{{ __('services.accounting.form.message_placeholder') }}"></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-secondary-600 hover:bg-secondary-700 text-white py-4 px-8 rounded-lg font-semibold text-lg transition-colors duration-200">
                        {{ __('services.accounting.form.submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Related Services -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.accounting.related.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.accounting.related.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Tax Advisory -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.tax_advisory.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.tax_advisory.short_description') }}</p>
                <a href="{{ route('services.tax-advisory', app()->getLocale()) }}" class="text-accent-600 hover:text-accent-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
            
            <!-- Financial Planning -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.financial_planning.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.financial_planning.short_description') }}</p>
                <a href="{{ route('services.financial-planning', app()->getLocale()) }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
            
            <!-- Audit & Compliance -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.audit_compliance.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.audit_compliance.short_description') }}</p>
                <a href="{{ route('services.audit-compliance', app()->getLocale()) }}" class="text-secondary-600 hover:text-secondary-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
