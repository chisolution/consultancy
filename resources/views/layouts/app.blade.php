<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ \App\Helpers\LocaleHelper::isRtl() ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', __('common.hero.title')) - Professional Business Consultancy</title>
    <meta name="description" content="@yield('description', __('common.hero.subtitle'))">
    
    <!-- SEO Meta Tags -->
    <meta name="keywords" content="business consultancy, accounting services, tax advisory, Rwanda, Canada, USA, Cameroon">
    <meta name="author" content="Professional Business Consultancy">
    <meta name="robots" content="index, follow">
    
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
    @foreach(\App\Helpers\LocaleHelper::getSupportedLocales() as $locale => $name)
        <link rel="alternate" hreflang="{{ $locale }}" href="{{ \App\Helpers\LocaleHelper::route(Route::currentRouteName(), request()->route()->parameters(), $locale) }}">
    @endforeach
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
                        <a href="{{ \App\Helpers\LocaleHelper::route('services') }}" 
                           class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('services*') ? 'text-primary-600' : '' }}">
                            {{ __('common.nav.services') }}
                        </a>
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
                    <a href="{{ \App\Helpers\LocaleHelper::route('services') }}" 
                       class="text-gray-900 hover:text-primary-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('services*') ? 'text-primary-600' : '' }}">
                        {{ __('common.nav.services') }}
                    </a>
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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
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

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">{{ __('common.footer.quick_links') }}</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('home') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.home') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('services') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.services') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('about') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.about') }}</a></li>
                        <li><a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-200">{{ __('common.nav.contact') }}</a></li>
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

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const languageDropdown = document.getElementById('language-dropdown');
            const languageButton = event.target.closest('button');
            
            if (!languageButton || !languageButton.onclick.toString().includes('toggleLanguageDropdown')) {
                languageDropdown.classList.add('hidden');
            }
        });
    </script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
