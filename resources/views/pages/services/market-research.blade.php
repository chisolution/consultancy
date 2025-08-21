@extends('layouts.app')

@section('title', __('services.market_research.meta.title'))
@section('description', __('services.market_research.meta.description'))
@section('keywords', __('services.market_research.meta.keywords'))

@push('structured-data')
    <x-seo.structured-data type="service" :data="[
        'name' => __('services.market_research.title'),
        'description' => __('services.market_research.short_description'),
        'serviceType' => 'Market Research',
        'category' => 'Business Intelligence',
        'offers' => [
            'description' => __('services.market_research.packages.basic.description'),
            'priceRange' => '$2,500 - $15,000'
        ],
        'url' => url()->current()
    ]" />
    <x-seo.structured-data type="webpage" :data="[
        'title' => __('services.market_research.meta.title'),
        'description' => __('services.market_research.meta.description')
    ]" />
@endpush

@section('content')
{{-- Breadcrumb Navigation --}}
<x-breadcrumb :items="[
    ['name' => __('common.nav.home'), 'url' => \App\Helpers\LocaleHelper::route('home')],
    ['name' => __('common.nav.services'), 'url' => \App\Helpers\LocaleHelper::route('services')],
    ['name' => __('services.market_research.title'), 'url' => url()->current()]
]" />

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-primary-600 to-primary-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.market_research.title') }}
                </h1>
                <p class="text-xl text-primary-100 mb-8 leading-relaxed">
                    {{ __('services.market_research.hero.subtitle') }}
                </p>
                
                {{-- Stats --}}
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-secondary-400">500+</div>
                        <div class="text-primary-200">{{ __('services.market_research.stats.research_projects') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-secondary-400">25+</div>
                        <div class="text-primary-200">{{ __('services.market_research.stats.markets_analyzed') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-secondary-400">15+</div>
                        <div class="text-primary-200">{{ __('services.market_research.stats.years_experience') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-secondary-400">98%</div>
                        <div class="text-primary-200">{{ __('services.market_research.stats.client_satisfaction') }}</div>
                    </div>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="bg-secondary-500 hover:bg-secondary-600 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.market_research.cta.get_research') }}
                    </a>
                    <a href="#packages" class="border-2 border-white text-white hover:bg-white hover:text-primary-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.market_research.cta.view_samples') }}
                    </a>
                </div>
            </div>
            
            {{-- Hero Image/Illustration --}}
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
                    <svg class="w-64 h-64 mx-auto text-secondary-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <p class="text-primary-100 mt-4">{{ __('services.market_research.overview.title') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Overview Section --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    {{ __('services.market_research.overview.title') }}
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ __('services.market_research.overview.description') }}
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ __('services.market_research.overview.expertise') }}
                </p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">{{ __('services.market_research.services.market_analysis.title') }}</h3>
                <ul class="space-y-4">
                    @foreach(__('services.market_research.services.market_analysis.features') as $feature)
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-secondary-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Research Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive market intelligence solutions tailored to your business needs</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['market_analysis', 'competitor_analysis', 'industry_research', 'customer_insights'] as $service)
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ __("services.market_research.services.{$service}.title") }}
                </h3>
                <p class="text-gray-600 mb-4">
                    {{ __("services.market_research.services.{$service}.description") }}
                </p>
                <ul class="space-y-2">
                    @foreach(__("services.market_research.services.{$service}.features") as $feature)
                    <li class="flex items-start text-sm">
                        <svg class="w-4 h-4 text-secondary-600 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Packages Section --}}
<section id="packages" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.market_research.packages.title') }}</h2>
            <p class="text-xl text-gray-600">Choose the research package that fits your needs</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach(['basic', 'comprehensive', 'strategic'] as $package)
            <div class="bg-white rounded-2xl p-8 shadow-lg {{ $package === 'comprehensive' ? 'ring-2 ring-primary-500 transform scale-105' : '' }}">
                @if($package === 'comprehensive')
                <div class="bg-primary-500 text-white text-sm font-semibold px-4 py-2 rounded-full text-center mb-6">Most Popular</div>
                @endif
                
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    {{ __("services.market_research.packages.{$package}.title") }}
                </h3>
                <p class="text-gray-600 mb-6">
                    {{ __("services.market_research.packages.{$package}.description") }}
                </p>
                <div class="text-3xl font-bold text-primary-600 mb-6">
                    {{ __("services.market_research.packages.{$package}.price") }}
                </div>
                <a href="#contact" class="block w-full bg-primary-600 hover:bg-primary-700 text-white text-center py-3 rounded-lg font-semibold transition-colors duration-200">
                    Get Started
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Process Section --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.market_research.process.title') }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __('services.market_research.process.subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['step1', 'step2', 'step3', 'step4'] as $index => $step)
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    {{ $index + 1 }}
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ __("services.market_research.process.{$step}.title") }}
                </h3>
                <p class="text-gray-600">
                    {{ __("services.market_research.process.{$step}.description") }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-20 bg-primary-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">{{ __('services.market_research.consultation.title') }}</h2>
            <p class="text-xl text-primary-100">{{ __('services.market_research.consultation.subtitle') }}</p>
        </div>

        <div class="bg-white rounded-2xl p-8">
            <form id="market-research-form" class="space-y-6">
                @csrf
                <input type="hidden" name="service_type" value="market_research">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.company') }}</label>
                        <input type="text" id="company" name="company" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                </div>

                <!-- Research Types - Checkboxes for multiple selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">{{ __('services.market_research.form.research_type') }}</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach(__('services.market_research.form.types') as $key => $type)
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="research_type[]" value="{{ $key }}" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <span class="ml-3 text-sm text-gray-700">{{ $type }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Target Markets - Checkboxes for multiple selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">{{ __('services.market_research.form.target_market') }}</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach(__('services.market_research.form.markets') as $key => $market)
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="target_market[]" value="{{ $key }}" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <span class="ml-3 text-sm text-gray-700">{{ $market }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 text-gray-900 bg-white" placeholder="{{ __('services.market_research.form.message_placeholder') }}"></textarea>
                </div>

                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white py-4 rounded-lg font-semibold transition-colors duration-200">
                    {{ __('services.market_research.form.submit') }}
                </button>
            </form>
        </div>
    </div>
</section>

{{-- Related Services --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.market_research.related.title') }}</h2>
            <p class="text-xl text-gray-600">{{ __('services.market_research.related.subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.feasibility_studies.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.feasibility_studies.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.feasibility-studies') }}" class="text-primary-600 hover:text-primary-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.data_analytics.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.data_analytics.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.data-analytics') }}" class="text-primary-600 hover:text-primary-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.business_consultancy.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.business_consultancy.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-consultancy') }}" class="text-primary-600 hover:text-primary-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
        </div>
    </div>
</section>
@endsection
