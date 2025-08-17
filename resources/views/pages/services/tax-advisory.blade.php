@extends('layouts.app')

@section('title', __('services.tax_advisory.meta.title'))
@section('description', __('services.tax_advisory.meta.description'))
@section('keywords', __('services.tax_advisory.meta.keywords'))

@push('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.tax_advisory.title') }}",
  "description": "{{ __('services.tax_advisory.meta.description') }}",
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
  "serviceType": "Tax Advisory Services",
  "offers": {
    "@type": "Offer",
    "price": "200",
    "priceCurrency": "USD",
    "description": "Starting from $200 for tax consultation services"
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
            <li class="text-gray-900 font-medium">{{ __('services.tax_advisory.title') }}</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-accent-600 to-accent-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.tax_advisory.title') }}
                </h1>
                <p class="text-xl text-accent-100 mb-8 leading-relaxed">
                    {{ __('services.tax_advisory.hero.subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#consultation" class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.tax_advisory.cta.get_consultation') }}
                    </a>
                    <a href="#tax-services" class="border-2 border-white text-white hover:bg-white hover:text-accent-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.tax_advisory.cta.view_services') }}
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-3xl font-bold text-primary-300">150+</div>
                            <div class="text-accent-100">{{ __('services.tax_advisory.stats.tax_returns_filed') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">100%</div>
                            <div class="text-accent-100">{{ __('services.tax_advisory.stats.compliance_rate') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">8+</div>
                            <div class="text-accent-100">{{ __('services.tax_advisory.stats.years_experience') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">48h</div>
                            <div class="text-accent-100">{{ __('services.tax_advisory.stats.response_time') }}</div>
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
                    {{ __('services.tax_advisory.overview.title') }}
                </h2>
                <div class="prose prose-lg text-gray-600 mb-8">
                    <p>{{ __('services.tax_advisory.overview.description') }}</p>
                    <p>{{ __('services.tax_advisory.overview.expertise') }}</p>
                </div>
                
                <!-- Key Benefits -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.tax_advisory.benefits.tax_planning.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.tax_advisory.benefits.tax_planning.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.tax_advisory.benefits.compliance.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.tax_advisory.benefits.compliance.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.tax_advisory.benefits.optimization.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.tax_advisory.benefits.optimization.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.tax_advisory.benefits.expert_guidance.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.tax_advisory.benefits.expert_guidance.description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Contact -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.tax_advisory.contact.title') }}</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-600">+250 XXX XXX XXX</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-600">tax@consultancy.rw</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ __('services.tax_advisory.contact.hours') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="block w-full bg-accent-600 hover:bg-accent-700 text-white text-center py-3 rounded-lg font-semibold mt-4 transition-colors duration-200">
                        {{ __('services.tax_advisory.contact.cta') }}
                    </a>
                </div>
                
                <!-- Tax Calendar -->
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.tax_advisory.calendar.title') }}</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600">{{ __('services.tax_advisory.calendar.vat_monthly') }}</span>
                            <span class="font-semibold text-accent-600">{{ __('services.tax_advisory.calendar.15th') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600">{{ __('services.tax_advisory.calendar.income_tax') }}</span>
                            <span class="font-semibold text-accent-600">{{ __('services.tax_advisory.calendar.march_31') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600">{{ __('services.tax_advisory.calendar.payroll_tax') }}</span>
                            <span class="font-semibold text-accent-600">{{ __('services.tax_advisory.calendar.monthly') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">{{ __('services.tax_advisory.calendar.annual_returns') }}</span>
                            <span class="font-semibold text-accent-600">{{ __('services.tax_advisory.calendar.june_30') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tax Services Detail -->
<section id="tax-services" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.tax_advisory.detailed_services.title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('services.tax_advisory.detailed_services.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- VAT Services -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.tax_advisory.services.vat.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.tax_advisory.services.vat.description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.vat.features.registration') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.vat.features.monthly_returns') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.vat.features.compliance') }}
                    </li>
                </ul>
            </div>
            
            <!-- Income Tax -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.tax_advisory.services.income_tax.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.tax_advisory.services.income_tax.description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.income_tax.features.corporate') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.income_tax.features.personal') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.income_tax.features.planning') }}
                    </li>
                </ul>
            </div>
            
            <!-- Payroll Tax -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.tax_advisory.services.payroll_tax.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.tax_advisory.services.payroll_tax.description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.payroll_tax.features.paye') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.payroll_tax.features.social_security') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.tax_advisory.services.payroll_tax.features.compliance') }}
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
                {{ __('services.tax_advisory.consultation.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.tax_advisory.consultation.subtitle') }}
            </p>
        </div>
        
        <div class="bg-gray-50 rounded-2xl p-8">
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500">
                </div>
                
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.company') }}</label>
                    <input type="text" id="company" name="company" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500">
                </div>
                
                <div class="md:col-span-2">
                    <label for="tax_issue" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.tax_advisory.form.tax_issue') }}</label>
                    <select id="tax_issue" name="tax_issue" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500">
                        <option value="">{{ __('services.tax_advisory.form.select_issue') }}</option>
                        <option value="vat">{{ __('services.tax_advisory.services.vat.title') }}</option>
                        <option value="income_tax">{{ __('services.tax_advisory.services.income_tax.title') }}</option>
                        <option value="payroll_tax">{{ __('services.tax_advisory.services.payroll_tax.title') }}</option>
                        <option value="tax_planning">{{ __('services.tax_advisory.form.tax_planning') }}</option>
                        <option value="compliance">{{ __('services.tax_advisory.form.compliance_issue') }}</option>
                    </select>
                </div>
                
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500" placeholder="{{ __('services.tax_advisory.form.message_placeholder') }}"></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-accent-600 hover:bg-accent-700 text-white py-4 px-8 rounded-lg font-semibold text-lg transition-colors duration-200">
                        {{ __('services.tax_advisory.form.submit') }}
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
                {{ __('services.tax_advisory.related.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.tax_advisory.related.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Accounting Services -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.accounting.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.accounting.short_description') }}</p>
                <a href="{{ route('services.accounting', app()->getLocale()) }}" class="text-secondary-600 hover:text-secondary-700 font-semibold">
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
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.audit_compliance.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.audit_compliance.short_description') }}</p>
                <a href="{{ route('services.audit-compliance', app()->getLocale()) }}" class="text-accent-600 hover:text-accent-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
