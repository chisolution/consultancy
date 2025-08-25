@extends('layouts.app')

@section('title', __('common.meta.services.title'))
@section('description', __('common.meta.services.description'))
@section('keywords', __('common.meta.services.keywords'))

@section('content')
{{-- Breadcrumb Navigation --}}
<x-breadcrumb :items="[
    ['name' => __('common.nav.home'), 'url' => \App\Helpers\LocaleHelper::route('home')],
    ['name' => __('common.nav.services'), 'url' => url()->current()]
]" />
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary-50 to-secondary-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                {{ __('common.services.title') }}
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Professional business solutions tailored to your needs across multiple markets
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Business Consultancy -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('common.services.business_consultancy.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('common.services.business_consultancy.description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Strategic Planning
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Market Entry Support
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Business Process Optimization
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Accounting Services -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-secondary-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('common.services.accounting.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('common.services.accounting.description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Bookkeeping & Financial Records
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Financial Statement Preparation
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Management Reporting
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Tax Advisory -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('common.services.tax_advisory.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('common.services.tax_advisory.description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Tax Planning & Strategy
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Tax Return Preparation
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Cross-border Tax Compliance
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Financial Planning -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('common.services.financial_planning.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('common.services.financial_planning.description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Financial Forecasting
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Budget Planning & Analysis
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Investment Advisory
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Business Registration -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-secondary-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('common.services.business_registration.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('common.services.business_registration.description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Company Formation
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Legal Documentation
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Regulatory Compliance
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Audit & Compliance -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-accent-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('common.services.audit_compliance.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('common.services.audit_compliance.description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Financial Audits
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Compliance Reviews
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Risk Assessment
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Market Research & Competitor Analysis -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('services.market_research.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('services.market_research.short_description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Market Analysis & Sizing
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Competitive Intelligence
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Customer Insights
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Feasibility Studies -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('services.feasibility_studies.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('services.feasibility_studies.short_description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Market Viability Assessment
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Strategic Location Analysis
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Financial Modeling
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>

            <!-- Business Intelligence & Data Analytics -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('services.data_analytics.title') }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ __('services.data_analytics.short_description') }}</p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Advanced Data Analysis
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Interactive Dashboards
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-secondary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Power BI & Tableau
                    </li>
                </ul>
                <a href="{{ \App\Helpers\LocaleHelper::serviceRoute('') }}" class="btn-primary w-full text-center">
                    {{ __('common.services.learn_more') }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-secondary-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
            {{ __('common.cta.title') }}
        </h2>
        <p class="text-xl text-primary-100 mb-8">
            {{ __('common.cta.subtitle') }}
        </p>
        
        <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="bg-white text-primary-600 hover:bg-gray-100 font-medium py-3 px-8 rounded-lg transition-colors duration-200">
            {{ __('common.cta.button') }}
        </a>
    </div>
</section>
@endsection
