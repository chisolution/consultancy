@extends('layouts.app')

@section('title', __('services.business_registration.meta.title'))
@section('description', __('services.business_registration.meta.description'))
@section('keywords', __('services.business_registration.meta.keywords'))

@push('structured-data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.business_registration.title') }}",
  "description": "{{ __('services.business_registration.meta.description') }}",
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
  "areaServed": "Rwanda",
  "serviceType": "Business Registration Services",
  "offers": {
    "@type": "Offer",
    "price": "400",
    "priceCurrency": "USD",
    "description": "Starting from $400 for business registration services"
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
            <li class="text-gray-900 font-medium">{{ __('services.business_registration.title') }}</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.business_registration.title') }}
                </h1>
                <p class="text-xl text-primary-100 mb-8 leading-relaxed">
                    {{ __('services.business_registration.hero.subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#consultation" class="bg-secondary-600 hover:bg-secondary-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.business_registration.cta.start_registration') }}
                    </a>
                    <a href="#process" class="border-2 border-white text-white hover:bg-white hover:text-primary-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.business_registration.cta.learn_process') }}
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">300+</div>
                            <div class="text-primary-100">{{ __('services.business_registration.stats.businesses_registered') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">7</div>
                            <div class="text-primary-100">{{ __('services.business_registration.stats.days_average') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">100%</div>
                            <div class="text-primary-100">{{ __('services.business_registration.stats.success_rate') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">5+</div>
                            <div class="text-primary-100">{{ __('services.business_registration.stats.years_experience') }}</div>
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
                    {{ __('services.business_registration.overview.title') }}
                </h2>
                <div class="prose prose-lg text-gray-600 mb-8">
                    <p>{{ __('services.business_registration.overview.description') }}</p>
                    <p>{{ __('services.business_registration.overview.expertise') }}</p>
                </div>
                
                <!-- Key Services -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.services.company_registration.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_registration.services.company_registration.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.services.brand_development.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_registration.services.brand_development.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.services.compliance.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_registration.services.compliance.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.services.ongoing_support.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_registration.services.ongoing_support.description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Contact -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.business_registration.contact.title') }}</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-600">+250 XXX XXX XXX</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-600">registration@consultancy.rw</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ __('services.business_registration.contact.hours') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="block w-full bg-primary-600 hover:bg-primary-700 text-white text-center py-3 rounded-lg font-semibold mt-4 transition-colors duration-200">
                        {{ __('services.business_registration.contact.cta') }}
                    </a>
                </div>
                
                <!-- Service Packages -->
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.business_registration.packages.title') }}</h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-primary-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.business_registration.packages.basic.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.business_registration.packages.basic.description') }}</p>
                            <p class="text-lg font-bold text-primary-600">$400</p>
                        </div>
                        <div class="border-l-4 border-secondary-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.business_registration.packages.complete.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.business_registration.packages.complete.description') }}</p>
                            <p class="text-lg font-bold text-secondary-600">$800</p>
                        </div>
                        <div class="border-l-4 border-accent-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.business_registration.packages.premium.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.business_registration.packages.premium.description') }}</p>
                            <p class="text-lg font-bold text-accent-600">$1,200</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Registration Process -->
<section id="process" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.business_registration.process.title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('services.business_registration.process.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.process.step1.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('services.business_registration.process.step1.description') }}</p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.process.step2.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('services.business_registration.process.step2.description') }}</p>
            </div>
            
            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.process.step3.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('services.business_registration.process.step3.description') }}</p>
            </div>
            
            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-800 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.process.step4.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('services.business_registration.process.step4.description') }}</p>
            </div>
            
            <!-- Step 5 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-800 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">5</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_registration.process.step5.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('services.business_registration.process.step5.description') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form -->
<section id="consultation" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.business_registration.consultation.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.business_registration.consultation.subtitle') }}
            </p>
        </div>
        
        <div class="bg-gray-50 rounded-2xl p-8">
            <form id="business-registration-form" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <input type="hidden" name="service_type" value="business_registration">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label for="business_name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.business_registration.form.business_name') }}</label>
                    <input type="text" id="business_name" name="business_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div class="md:col-span-2">
                    <label for="business_type" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.business_registration.form.business_type') }}</label>
                    <select id="business_type" name="business_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option value="">{{ __('services.business_registration.form.select_type') }}</option>
                        <option value="private_company">{{ __('services.business_registration.form.types.private_company') }}</option>
                        <option value="public_company">{{ __('services.business_registration.form.types.public_company') }}</option>
                        <option value="partnership">{{ __('services.business_registration.form.types.partnership') }}</option>
                        <option value="sole_proprietorship">{{ __('services.business_registration.form.types.sole_proprietorship') }}</option>
                        <option value="ngo">{{ __('services.business_registration.form.types.ngo') }}</option>
                    </select>
                </div>
                
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" placeholder="{{ __('services.business_registration.form.message_placeholder') }}"></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <button type="submit" id="submit-btn" class="w-full bg-primary-600 hover:bg-primary-700 text-white py-4 px-8 rounded-lg font-semibold text-lg transition-colors duration-200">
                        <span id="submit-text">{{ __('services.business_registration.form.submit') }}</span>
                        <span id="loading-text" class="hidden">{{ __('common.ui.loading') }}</span>
                    </button>
                </div>

                <!-- Success/Error Messages -->
                <div id="form-messages" class="hidden md:col-span-2">
                    <div id="success-message" class="hidden bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span id="success-text"></span>
                        </div>
                    </div>
                    <div id="error-message" class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span id="error-text"></span>
                        </div>
                    </div>
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
                {{ __('services.business_registration.related.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.business_registration.related.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Business Consultancy -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.business_consultancy.short_description') }}</p>
                <a href="{{ route('services.business-consultancy', app()->getLocale()) }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
            
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
        </div>
    </div>
</section>
@endsection
