@extends('layouts.app')

@section('title', __('common.hero.title'))
@section('description', __('common.hero.subtitle'))

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-primary-50 to-secondary-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="animate-fade-in-up">
                <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6 text-balance">
                    {{ __('common.hero.title') }}
                </h1>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    {{ __('common.hero.subtitle') }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mb-12">
                    <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="btn-primary text-center">
                        {{ __('common.hero.cta_primary') }}
                    </a>
                    <a href="{{ \App\Helpers\LocaleHelper::route('services') }}" class="btn-secondary text-center">
                        {{ __('common.hero.cta_secondary') }}
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.hero.features.certified') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.hero.features.cultural') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.hero.features.affordable') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.hero.features.delivery') }}
                    </div>
                </div>
            </div>

            <!-- Hero Visual (Placeholder for Spline 3D) -->
            <div class="relative">
                <div class="bg-gradient-to-br from-primary-100 to-secondary-100 rounded-2xl p-8 h-96 flex items-center justify-center">
                    <!-- Placeholder for Spline 3D Animation -->
                    <div class="text-center">
                        <div class="w-32 h-32 bg-primary-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600 text-sm">3D Animation Placeholder</p>
                        <p class="text-gray-500 text-xs mt-1">Spline integration coming soon</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                {{ __('common.services.title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive business solutions tailored to your needs across multiple markets
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Business Consultancy -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.business_consultancy.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.business_consultancy.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-consultancy') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>

            <!-- Accounting Services -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.accounting.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.accounting.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.accounting') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>

            <!-- Tax Advisory -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.tax_advisory.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.tax_advisory.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.tax-advisory') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>

            <!-- Financial Planning -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.financial_planning.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.financial_planning.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.financial-planning') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>

            <!-- Business Registration -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.business_registration.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.business_registration.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-registration') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>

            <!-- Audit & Compliance -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.audit_compliance.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.audit_compliance.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.audit-compliance') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>

            <!-- Training -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.training.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.training.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.training') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>

            <!-- Career Development -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('common.services.career_development.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('common.services.career_development.description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.career-development') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('common.services.learn_more') }} →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    {{ __('common.why_choose.title') }}
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    {{ __('common.why_choose.subtitle') }}
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.why_choose.features.experience') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.why_choose.features.expertise') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.why_choose.features.professionals') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.why_choose.features.pricing') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.why_choose.features.delivery') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-secondary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ __('common.why_choose.features.support') }}
                    </div>
                </div>
            </div>

            <!-- Illustration Placeholder -->
            <div class="relative">
                <div class="bg-gradient-to-br from-primary-100 to-secondary-100 rounded-2xl p-8 h-96 flex items-center justify-center">
                    <!-- Placeholder for unDraw illustration -->
                    <div class="text-center">
                        <div class="w-32 h-32 bg-secondary-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600 text-sm">Cultural Diversity Illustration</p>
                        <p class="text-gray-500 text-xs mt-1">unDraw illustration placeholder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                {{ __('common.testimonials.title') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-200 rounded-full flex items-center justify-center">
                        <span class="text-primary-600 font-semibold">MR</span>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">{{ __('common.testimonials.client1.name') }}</h4>
                        <p class="text-gray-600 text-sm">{{ __('common.testimonials.client1.location') }}</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">"{{ __('common.testimonials.client1.text') }}"</p>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-gray-50 rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-secondary-200 rounded-full flex items-center justify-center">
                        <span class="text-secondary-600 font-semibold">SK</span>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">{{ __('common.testimonials.client2.name') }}</h4>
                        <p class="text-gray-600 text-sm">{{ __('common.testimonials.client2.location') }}</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">"{{ __('common.testimonials.client2.text') }}"</p>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-gray-50 rounded-xl p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-accent-200 rounded-full flex items-center justify-center">
                        <span class="text-accent-600 font-semibold">JM</span>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">{{ __('common.testimonials.client3.name') }}</h4>
                        <p class="text-gray-600 text-sm">{{ __('common.testimonials.client3.location') }}</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">"{{ __('common.testimonials.client3.text') }}"</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-secondary-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
            {{ __('common.cta.title') }}
        </h2>
        <p class="text-xl text-primary-100 mb-8">
            {{ __('common.cta.subtitle') }}
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="bg-white text-primary-600 hover:bg-gray-100 font-medium py-3 px-8 rounded-lg transition-colors duration-200">
                {{ __('common.cta.button') }}
            </a>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center text-primary-100">
            <div class="flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
                {{ __('common.cta.phone') }}
            </div>
            <div class="flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                {{ __('common.cta.email') }}
            </div>
        </div>
    </div>
</section>
@endsection
