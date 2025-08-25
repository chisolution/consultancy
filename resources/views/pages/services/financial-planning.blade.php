@extends('layouts.public')

@section('title', __('services.financial_planning.meta.title'))
@section('description', __('services.financial_planning.meta.description'))
@section('keywords', __('services.financial_planning.meta.keywords'))

@push('structured-data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.financial_planning.title') }}",
  "description": "{{ __('services.financial_planning.meta.description') }}",
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
  "serviceType": "Financial Planning Services",
  "offers": {
    "@type": "Offer",
    "price": "600",
    "priceCurrency": "USD",
    "description": "Starting from $600 for financial planning consultation"
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
            <li class="text-gray-900 font-medium">{{ __('services.financial_planning.title') }}</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-secondary-600 to-secondary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.financial_planning.title') }}
                </h1>
                <p class="text-xl text-secondary-100 mb-8 leading-relaxed">
                    {{ __('services.financial_planning.hero.subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#consultation" class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.financial_planning.cta.get_plan') }}
                    </a>
                    <a href="#services" class="border-2 border-white text-white hover:bg-white hover:text-secondary-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.financial_planning.cta.view_services') }}
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-3xl font-bold text-primary-300">$50M+</div>
                            <div class="text-secondary-100">{{ __('services.financial_planning.stats.assets_managed') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">98%</div>
                            <div class="text-secondary-100">{{ __('services.financial_planning.stats.client_satisfaction') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">12+</div>
                            <div class="text-secondary-100">{{ __('services.financial_planning.stats.years_experience') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">15%</div>
                            <div class="text-secondary-100">{{ __('services.financial_planning.stats.avg_returns') }}</div>
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
                    {{ __('services.financial_planning.overview.title') }}
                </h2>
                <div class="prose prose-lg text-gray-600 mb-8">
                    <p>{{ __('services.financial_planning.overview.description') }}</p>
                    <p>{{ __('services.financial_planning.overview.expertise') }}</p>
                </div>
                
                <!-- Key Services -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.financial_planning.services.investment_strategy.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.financial_planning.services.investment_strategy.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.financial_planning.services.risk_management.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.financial_planning.services.risk_management.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.financial_planning.services.wealth_building.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.financial_planning.services.wealth_building.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.financial_planning.services.retirement_planning.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.financial_planning.services.retirement_planning.description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Contact -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.financial_planning.contact.title') }}</h3>
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
                            <span class="text-gray-600">financial@consultancy.rw</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ __('services.financial_planning.contact.hours') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="block w-full bg-secondary-600 hover:bg-secondary-700 text-white text-center py-3 rounded-lg font-semibold mt-4 transition-colors duration-200">
                        {{ __('services.financial_planning.contact.cta') }}
                    </a>
                </div>
                
                <!-- Investment Calculator -->
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.financial_planning.calculator.title') }}</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('services.financial_planning.calculator.initial_investment') }}</label>
                            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="$10,000">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('services.financial_planning.calculator.monthly_contribution') }}</label>
                            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="$500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('services.financial_planning.calculator.time_horizon') }}</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                <option>5 years</option>
                                <option>10 years</option>
                                <option>15 years</option>
                                <option>20 years</option>
                            </select>
                        </div>
                        <button class="w-full bg-secondary-600 hover:bg-secondary-700 text-white py-2 rounded-lg font-medium text-sm transition-colors duration-200">
                            {{ __('services.financial_planning.calculator.calculate') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Financial Services Detail -->
<section id="services" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.financial_planning.detailed_services.title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('services.financial_planning.detailed_services.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Investment Strategy -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.financial_planning.services.investment_strategy.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.financial_planning.services.investment_strategy.detailed_description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.investment_strategy.features.portfolio_design') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.investment_strategy.features.asset_allocation') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.investment_strategy.features.performance_monitoring') }}
                    </li>
                </ul>
            </div>
            
            <!-- Risk Management -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.financial_planning.services.risk_management.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.financial_planning.services.risk_management.detailed_description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.risk_management.features.risk_assessment') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.risk_management.features.insurance_planning') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.risk_management.features.diversification') }}
                    </li>
                </ul>
            </div>
            
            <!-- Retirement Planning -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.financial_planning.services.retirement_planning.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.financial_planning.services.retirement_planning.detailed_description') }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.retirement_planning.features.retirement_goals') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.retirement_planning.features.savings_strategy') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ __('services.financial_planning.services.retirement_planning.features.income_planning') }}
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
                {{ __('services.financial_planning.consultation.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.financial_planning.consultation.subtitle') }}
            </p>
        </div>
        
        <div class="bg-gray-50 rounded-2xl p-8">
            <form id="financial-planning-form" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <input type="hidden" name="service_type" value="financial_planning">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.financial_planning.form.age') }}</label>
                    <select id="age" name="age" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                        <option value="">{{ __('services.financial_planning.form.select_age') }}</option>
                        <option value="20-30">20-30</option>
                        <option value="31-40">31-40</option>
                        <option value="41-50">41-50</option>
                        <option value="51-60">51-60</option>
                        <option value="60+">60+</option>
                    </select>
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div class="md:col-span-2">
                    <label for="financial_goals" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.financial_planning.form.financial_goals') }}</label>
                    <select id="financial_goals" name="financial_goals" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                        <option value="">{{ __('services.financial_planning.form.select_goals') }}</option>
                        <option value="retirement">{{ __('services.financial_planning.form.goals.retirement') }}</option>
                        <option value="wealth_building">{{ __('services.financial_planning.form.goals.wealth_building') }}</option>
                        <option value="education">{{ __('services.financial_planning.form.goals.education') }}</option>
                        <option value="home_purchase">{{ __('services.financial_planning.form.goals.home_purchase') }}</option>
                        <option value="business_investment">{{ __('services.financial_planning.form.goals.business_investment') }}</option>
                    </select>
                </div>
                
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500" placeholder="{{ __('services.financial_planning.form.message_placeholder') }}"></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <button type="submit" id="submit-btn" class="w-full bg-secondary-600 hover:bg-secondary-700 text-white py-4 px-8 rounded-lg font-semibold text-lg transition-colors duration-200">
                        <span id="submit-text">{{ __('services.financial_planning.form.submit') }}</span>
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
                {{ __('services.financial_planning.related.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.financial_planning.related.subtitle') }}
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
