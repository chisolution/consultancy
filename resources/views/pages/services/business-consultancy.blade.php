@extends('layouts.app')

@section('title', __('services.business_consultancy.meta.title'))
@section('description', __('services.business_consultancy.meta.description'))
@section('keywords', __('services.business_consultancy.meta.keywords'))

@push('structured-data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.business_consultancy.title') }}",
  "description": "{{ __('services.business_consultancy.meta.description') }}",
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
  "serviceType": "Business Consultancy",
  "offers": {
    "@type": "Offer",
    "price": "500",
    "priceCurrency": "USD",
    "description": "Starting from $500 for strategic business consultation"
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
            <li class="text-gray-900 font-medium">{{ __('services.business_consultancy.title') }}</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.business_consultancy.title') }}
                </h1>
                <p class="text-xl text-primary-100 mb-8 leading-relaxed">
                    {{ __('services.business_consultancy.hero.subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#consultation" class="bg-secondary-600 hover:bg-secondary-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.business_consultancy.cta.get_consultation') }}
                    </a>
                    <a href="#process" class="border-2 border-white text-white hover:bg-white hover:text-primary-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.business_consultancy.cta.learn_process') }}
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">500+</div>
                            <div class="text-primary-100">{{ __('services.business_consultancy.stats.businesses_helped') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">95%</div>
                            <div class="text-primary-100">{{ __('services.business_consultancy.stats.success_rate') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">15+</div>
                            <div class="text-primary-100">{{ __('services.business_consultancy.stats.years_experience') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-secondary-300">24/7</div>
                            <div class="text-primary-100">{{ __('services.business_consultancy.stats.support') }}</div>
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
                    {{ __('services.business_consultancy.overview.title') }}
                </h2>
                <div class="prose prose-lg text-gray-600 mb-8">
                    <p>{{ __('services.business_consultancy.overview.description') }}</p>
                    <p>{{ __('services.business_consultancy.overview.expertise') }}</p>
                </div>
                
                <!-- Key Benefits -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.benefits.strategic_planning.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_consultancy.benefits.strategic_planning.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.benefits.growth_strategy.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_consultancy.benefits.growth_strategy.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.benefits.market_analysis.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_consultancy.benefits.market_analysis.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.benefits.operational_efficiency.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.business_consultancy.benefits.operational_efficiency.description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Contact -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.business_consultancy.contact.title') }}</h3>
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
                            <span class="text-gray-600">hello@consultancy.rw</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-600">Kigali, Rwanda</span>
                        </div>
                    </div>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="block w-full bg-primary-600 hover:bg-primary-700 text-white text-center py-3 rounded-lg font-semibold mt-4 transition-colors duration-200">
                        {{ __('services.business_consultancy.contact.cta') }}
                    </a>
                </div>
                
                <!-- Service Packages -->
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.business_consultancy.packages.title') }}</h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-primary-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.business_consultancy.packages.starter.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.business_consultancy.packages.starter.description') }}</p>
                            <p class="text-lg font-bold text-primary-600">$500</p>
                        </div>
                        <div class="border-l-4 border-secondary-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.business_consultancy.packages.professional.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.business_consultancy.packages.professional.description') }}</p>
                            <p class="text-lg font-bold text-secondary-600">$1,500</p>
                        </div>
                        <div class="border-l-4 border-accent-600 pl-4">
                            <h4 class="font-semibold text-gray-900">{{ __('services.business_consultancy.packages.enterprise.title') }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ __('services.business_consultancy.packages.enterprise.description') }}</p>
                            <p class="text-lg font-bold text-accent-600">{{ __('services.business_consultancy.packages.enterprise.price') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section id="process" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.business_consultancy.process.title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('services.business_consultancy.process.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.process.step1.title') }}</h3>
                <p class="text-gray-600">{{ __('services.business_consultancy.process.step1.description') }}</p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.process.step2.title') }}</h3>
                <p class="text-gray-600">{{ __('services.business_consultancy.process.step2.description') }}</p>
            </div>
            
            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.process.step3.title') }}</h3>
                <p class="text-gray-600">{{ __('services.business_consultancy.process.step3.description') }}</p>
            </div>
            
            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-800 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.process.step4.title') }}</h3>
                <p class="text-gray-600">{{ __('services.business_consultancy.process.step4.description') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Consultation Form -->
<section id="consultation" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.business_consultancy.consultation.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.business_consultancy.consultation.subtitle') }}
            </p>
        </div>
        
        <div class="bg-gray-50 rounded-2xl p-8">
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.company') }}</label>
                    <input type="text" id="company" name="company" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div class="md:col-span-2">
                    <label for="business_stage" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.business_consultancy.form.business_stage') }}</label>
                    <select id="business_stage" name="business_stage" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option value="">{{ __('services.business_consultancy.form.select_stage') }}</option>
                        <option value="idea">{{ __('services.business_consultancy.form.stages.idea') }}</option>
                        <option value="startup">{{ __('services.business_consultancy.form.stages.startup') }}</option>
                        <option value="growth">{{ __('services.business_consultancy.form.stages.growth') }}</option>
                        <option value="established">{{ __('services.business_consultancy.form.stages.established') }}</option>
                    </select>
                </div>
                
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" placeholder="{{ __('services.business_consultancy.form.message_placeholder') }}"></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white py-4 px-8 rounded-lg font-semibold text-lg transition-colors duration-200">
                        {{ __('services.business_consultancy.form.submit') }}
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
                {{ __('services.business_consultancy.related.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.business_consultancy.related.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Business Registration -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.business_registration.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.business_registration.short_description') }}</p>
                <a href="{{ route('services.business-registration', app()->getLocale()) }}" class="text-secondary-600 hover:text-secondary-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
            
            <!-- Financial Planning -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.financial_planning.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.financial_planning.short_description') }}</p>
                <a href="{{ route('services.financial-planning', app()->getLocale()) }}" class="text-accent-600 hover:text-accent-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
            
            <!-- Training -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.training.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.training.short_description') }}</p>
                <a href="{{ route('services.training', app()->getLocale()) }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
