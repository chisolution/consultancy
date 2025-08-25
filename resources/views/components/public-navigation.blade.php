<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and Brand -->
            <div class="flex items-center">
                <a href="{{ \App\Helpers\LocaleHelper::route('home') }}" class="flex items-center">
                    <x-application-logo class="h-8 w-auto" />
                    <span class="ml-3 text-xl font-bold text-gray-900">Professional Consultancy</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ \App\Helpers\LocaleHelper::route('home') }}"
                   class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-primary-600 border-b-2 border-primary-600' : '' }}">
                    {{ __('common.nav.home') }}
                </a>

                <a href="{{ \App\Helpers\LocaleHelper::route('services') }}"
                   class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('services*') ? 'text-primary-600 border-b-2 border-primary-600' : '' }}">
                    {{ __('common.nav.services') }}
                </a>

                <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}"
                   class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-primary-600 border-b-2 border-primary-600' : '' }}">
                    {{ __('common.nav.contact') }}
                </a>

                <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        {{ \App\Helpers\LocaleHelper::getLocaleFlag() }}
                        <span class="ml-1">{{ \App\Helpers\LocaleHelper::getLocaleDisplayName() }}</span>
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open"
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        @foreach(\App\Helpers\LocaleHelper::getSupportedLocales() as $locale => $name)
                            @if($locale !== \App\Helpers\LocaleHelper::getCurrentLocale())
                                <a href="{{ \App\Helpers\LocaleHelper::switchLanguageUrl($locale) }}"
                                   class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ \App\Helpers\LocaleHelper::getLocaleFlag($locale) }}
                                    <span class="ml-2">{{ $name }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Auth Section -->
                @auth
                    <!-- User Avatar/Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                            <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-2">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            {{ Auth::user()->name }}
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open"
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Dashboard
                            </a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Login Link -->
                    <a href="{{ route('login') }}"
                       class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Login
                    </a>
                @endauth

                <!-- CTA Button -->
                <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}"
                   class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    {{ __('common.nav.get_quote') }}
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-gray-700 hover:text-primary-600 focus:outline-none focus:text-primary-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="md:hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ \App\Helpers\LocaleHelper::route('home') }}"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md {{ request()->routeIs('home') ? 'text-primary-600 bg-primary-50' : '' }}">
                {{ __('common.nav.home') }}
            </a>

            <a href="{{ \App\Helpers\LocaleHelper::route('services') }}"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md {{ request()->routeIs('services*') ? 'text-primary-600 bg-primary-50' : '' }}">
                {{ __('common.nav.services') }}
            </a>

            <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md {{ request()->routeIs('contact') ? 'text-primary-600 bg-primary-50' : '' }}">
                {{ __('common.nav.contact') }}
            </a>

            <!-- Mobile Auth Section -->
            @auth
                <div class="border-t border-gray-200 pt-2 mt-2">
                    <div class="px-3 py-2 text-sm font-medium text-gray-500">{{ Auth::user()->name }}</div>
                    <a href="{{ route('dashboard') }}"
                       class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md">
                        Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}"
                       class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md">
                            Log Out
                        </button>
                    </form>
                </div>
            @else
                <div class="border-t border-gray-200 pt-2 mt-2">
                    <a href="{{ route('login') }}"
                       class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md">
                        Login
                    </a>
                </div>
            @endauth

            <!-- Mobile Language Switcher -->
            <div class="border-t border-gray-200 pt-2 mt-2">
                <div class="px-3 py-2 text-sm font-medium text-gray-500">{{ __('common.nav.language') }}</div>
                @foreach(\App\Helpers\LocaleHelper::getSupportedLocales() as $locale => $name)
                    @if($locale !== \App\Helpers\LocaleHelper::getCurrentLocale())
                        <a href="{{ \App\Helpers\LocaleHelper::switchLanguageUrl($locale) }}"
                           class="flex items-center px-3 py-2 text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-md">
                            {{ \App\Helpers\LocaleHelper::getLocaleFlag($locale) }}
                            <span class="ml-2">{{ $name }}</span>
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Mobile CTA -->
            <div class="border-t border-gray-200 pt-2 mt-2">
                <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}"
                   class="block mx-3 bg-primary-600 hover:bg-primary-700 text-white text-center px-4 py-2 rounded-lg text-base font-medium transition-colors duration-200">
                    {{ __('common.nav.get_quote') }}
                </a>
            </div>
        </div>
    </div>
</nav>
