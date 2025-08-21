<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ \App\Helpers\LocaleHelper::isRtl() ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', __('common.meta.home.title'))</title>
    <meta name="description" content="@yield('description', __('common.meta.home.description'))">

    <!-- SEO Meta Tags -->
    <meta name="keywords" content="@yield('keywords', __('common.meta.home.keywords'))">
    <meta name="author" content="Professional Business Consultancy">
    <meta name="robots" content="index, follow">
    <meta name="language" content="{{ app()->getLocale() }}">
    <meta name="geo.region" content="RW">
    <meta name="geo.placename" content="Kigali">
    <meta name="geo.position" content="-1.9441;30.0619">
    <meta name="ICBM" content="-1.9441, 30.0619">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', __('common.hero.title'))">
    <meta property="og:description" content="@yield('description', __('common.hero.subtitle'))">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', __('common.hero.title'))">
    <meta name="twitter:description" content="@yield('description', __('common.hero.subtitle'))">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Alternate Language Links -->
    <link rel="alternate" hreflang="x-default" href="{{ \App\Helpers\LocaleHelper::route(Route::currentRouteName(), request()->route()->parameters()) }}">
    @foreach(\App\Helpers\LocaleHelper::getSupportedLocales() as $locale => $name)
        <link rel="alternate" hreflang="{{ $locale }}" href="{{ \App\Helpers\LocaleHelper::route(Route::currentRouteName(), request()->route()->parameters(), $locale) }}">
    @endforeach
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Fonts with performance optimization -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Structured Data -->
    @stack('structured-data')

    <!-- Additional Head Content -->
    @stack('head')
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-primary-600 text-white px-4 py-2 rounded-md z-50">
        Skip to main content
    </a>

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ \App\Helpers\LocaleHelper::route('home') }}" class="flex items-center">
                        <img class="h-8 w-auto" src="{{ asset('images/logo.svg') }}" alt="Professional Consultancy Logo">
                        <span class="ml-2 text-xl font-bold text-gray-900">Consultancy</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ \App\Helpers\LocaleHelper::route('home') }}" 
                           class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">
                            {{ __('common.nav.home') }}
                        </a>
                        <!-- Services Dropdown -->
                        <div class="relative group">
                            <button class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center {{ request()->routeIs('services*') ? 'text-primary-600' : '' }}">
                                {{ __('common.nav.services') }}
                                <svg class="ml-1 h-4 w-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="absolute left-0 mt-2 w-[600px] bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <div class="p-6">
                                    <div class="grid grid-cols-2 gap-6">
                                        <!-- Column 1: Core Business Services -->
                                        <div>
                                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Core Business Services</h3>
                                            <div class="space-y-3">
                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-consultancy') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Business Consultancy</div>
                                                        <div class="text-xs text-gray-500">Strategic planning & development</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-registration') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-secondary-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Business Registration</div>
                                                        <div class="text-xs text-gray-500">Company setup & branding</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.accounting') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-secondary-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Accounting Services</div>
                                                        <div class="text-xs text-gray-500">Bookkeeping & financial records</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.tax-advisory') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-accent-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Tax Advisory</div>
                                                        <div class="text-xs text-gray-500">Tax planning & compliance</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.financial-planning') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Financial Planning</div>
                                                        <div class="text-xs text-gray-500">Investment & wealth management</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.audit-compliance') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-accent-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Audit & Compliance</div>
                                                        <div class="text-xs text-gray-500">Risk assessment & audits</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Column 2: Specialized Services -->
                                        <div>
                                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Specialized Services</h3>
                                            <div class="space-y-3">
                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.corporate-training') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Corporate Training</div>
                                                        <div class="text-xs text-gray-500">Leadership & team development</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.career-development') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-secondary-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Career Development</div>
                                                        <div class="text-xs text-gray-500">Professional coaching & skills</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.market-research') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Market Research</div>
                                                        <div class="text-xs text-gray-500">Competitive analysis & insights</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.feasibility-studies') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Feasibility Studies</div>
                                                        <div class="text-xs text-gray-500">Market entry & viability</div>
                                                    </div>
                                                </a>

                                                <a href="{{ \App\Helpers\LocaleHelper::route('services.data-analytics') }}" class="flex items-start p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 mt-0.5">
                                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Data Analytics</div>
                                                        <div class="text-xs text-gray-500">BI & data visualization</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- View All Services CTA -->
                                    <div class="mt-6 pt-4 border-t border-gray-200">
                                        <a href="{{ \App\Helpers\LocaleHelper::route('services') }}" class="flex items-center justify-center w-full px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                            {{ __('common.services.view_all') }}
                                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ \App\Helpers\LocaleHelper::route('about') }}" 
                           class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'text-primary-600' : '' }}">
                            {{ __('common.nav.about') }}
                        </a>
                        <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" 
                           class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-primary-600' : '' }}">
                            {{ __('common.nav.contact') }}
                        </a>
                    </div>
                </div>

                <!-- Language Switcher & CTA -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Language Switcher -->
                    <div class="relative">
                        <button type="button" class="flex items-center text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200" 
                                onclick="toggleLanguageDropdown()">
                            {{ \App\Helpers\LocaleHelper::getLocaleFlag() }} {{ \App\Helpers\LocaleHelper::getLocaleDisplayName() }}
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="language-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            @foreach(\App\Helpers\LocaleHelper::getSupportedLocales() as $locale => $name)
                                @if($locale !== \App\Helpers\LocaleHelper::getCurrentLocale())
                                    <a href="{{ \App\Helpers\LocaleHelper::switchLanguageUrl($locale) }}" 
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ \App\Helpers\LocaleHelper::getLocaleFlag($locale) }} {{ $name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="btn-primary">
                        {{ __('common.nav.get_quote') }}
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-700 hover:text-primary-600 focus:outline-none focus:text-primary-600" 
                            onclick="toggleMobileMenu()">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                    <a href="{{ \App\Helpers\LocaleHelper::route('home') }}" 
                       class="text-gray-900 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">
                        {{ __('common.nav.home') }}
                    </a>
                    <!-- Mobile Services Dropdown -->
                    <div class="mobile-services-dropdown">
                        <button onclick="toggleMobileServices()" class="w-full text-left text-gray-900 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium flex items-center justify-between {{ request()->routeIs('services*') ? 'text-primary-600' : '' }}">
                            {{ __('common.nav.services') }}
                            <svg id="mobile-services-arrow" class="h-5 w-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div id="mobile-services-menu" class="hidden pl-6 pb-2 space-y-1">
                            <a href="{{ \App\Helpers\LocaleHelper::route('services') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">All Services</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.business-consultancy') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Business Consultancy</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.business-registration') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Business Registration</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.accounting') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Accounting Services</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.tax-advisory') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Tax Advisory</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.financial-planning') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Financial Planning</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.audit-compliance') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Audit & Compliance</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.corporate-training') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Corporate Training</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.career-development') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Career Development</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.market-research') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Market Research</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.feasibility-studies') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Feasibility Studies</a>
                            <a href="{{ \App\Helpers\LocaleHelper::route('services.data-analytics') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-primary-600">Data Analytics</a>
                        </div>
                    </div>
                    <a href="{{ \App\Helpers\LocaleHelper::route('about') }}" 
                       class="text-gray-900 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'text-primary-600' : '' }}">
                        {{ __('common.nav.about') }}
                    </a>
                    <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" 
                       class="text-gray-900 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'text-primary-600' : '' }}">
                        {{ __('common.nav.contact') }}
                    </a>
                    
                    <!-- Mobile Language Switcher -->
                    <div class="border-t pt-2">
                        @foreach(\App\Helpers\LocaleHelper::getSupportedLocales() as $locale => $name)
                            @if($locale !== \App\Helpers\LocaleHelper::getCurrentLocale())
                                <a href="{{ \App\Helpers\LocaleHelper::switchLanguageUrl($locale) }}" 
                                   class="text-gray-700 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium">
                                    {{ \App\Helpers\LocaleHelper::getLocaleFlag($locale) }} {{ $name }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                    
                    <!-- Mobile CTA -->
                    <div class="pt-2">
                        <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="btn-primary w-full text-center block">
                            {{ __('common.nav.get_quote') }}
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="lg:col-span-1">
                    <div class="flex items-center mb-4">
                        <img class="h-8 w-auto" src="{{ asset('images/logo-white.svg') }}" alt="Professional Consultancy Logo">
                        <span class="ml-2 text-xl font-bold">Consultancy</span>
                    </div>
                    <p class="text-gray-300 mb-4">{{ __('common.footer.company_description') }}</p>
                    <div class="flex space-x-4">
                        <!-- Social Media Links -->
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">{{ __('common.footer.services') }}</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services.business-consultancy') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('services.business_consultancy.title') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services.accounting') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('services.accounting.title') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services.tax-advisory') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('services.tax_advisory.title') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services.financial-planning') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('services.financial_planning.title') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services.business-registration') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('services.business_registration.title') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services.audit-compliance') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('services.audit_compliance.title') }}</a></li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">{{ __('common.footer.quick_links') }}</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('home') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.home') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.services') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('about') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.about') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.contact') }}</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.footer.privacy') }}</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.footer.terms') }}</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">{{ __('common.footer.contact_info') }}</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>{{ __('common.footer.location.email') }}</p>
                        <p>{{ __('common.footer.location.phone') }}</p>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-medium mb-2">{{ __('common.footer.office_location') }}</h4>
                        <div class="text-sm text-gray-400 space-y-1">
                            <p>{{ __('common.footer.location.address') }}</p>
                            <p>{{ __('common.footer.location.city') }}</p>
                        </div>
                        <div class="mt-3 text-xs text-gray-500">
                            <p>{{ __('common.footer.global_service_note') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Professional Business Consultancy. {{ __('common.footer.copyright') }}
                </p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-200">{{ __('common.footer.privacy') }}</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-200">{{ __('common.footer.terms') }}</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        function toggleLanguageDropdown() {
            const dropdown = document.getElementById('language-dropdown');
            dropdown.classList.toggle('hidden');
        }

        function toggleMobileServices() {
            const menu = document.getElementById('mobile-services-menu');
            const arrow = document.getElementById('mobile-services-arrow');
            menu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const languageDropdown = document.getElementById('language-dropdown');
            const languageButton = event.target.closest('button');
            
            if (!languageButton || !languageButton.onclick.toString().includes('toggleLanguageDropdown')) {
                languageDropdown.classList.add('hidden');
            }
        });
    </script>

    <!-- Performance Monitoring -->
    <x-performance-monitor />

    <!-- Service Forms Handler -->
    @vite('resources/js/service-forms.js')

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
