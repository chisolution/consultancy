@extends('layouts.app')

@section('title', __('services.data_analytics.meta.title'))
@section('description', __('services.data_analytics.meta.description'))
@section('keywords', __('services.data_analytics.meta.keywords'))

@push('structured-data')
    <x-seo.structured-data type="service" :data="[
        'name' => __('services.data_analytics.title'),
        'description' => __('services.data_analytics.short_description'),
        'serviceType' => 'Data Analytics',
        'category' => 'Business Intelligence',
        'offers' => [
            'description' => __('services.data_analytics.packages.basic.description'),
            'priceRange' => '$1,500 - $10,000+'
        ],
        'url' => url()->current()
    ]" />
    <x-seo.structured-data type="webpage" :data="[
        'title' => __('services.data_analytics.meta.title'),
        'description' => __('services.data_analytics.meta.description')
    ]" />
@endpush

@section('content')
{{-- Breadcrumb Navigation --}}
<x-breadcrumb :items="[
    ['name' => __('common.nav.home'), 'url' => \App\Helpers\LocaleHelper::route('home')],
    ['name' => __('common.nav.services'), 'url' => \App\Helpers\LocaleHelper::route('services')],
    ['name' => __('services.data_analytics.title'), 'url' => url()->current()]
]" />

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-gray-900 to-gray-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.data_analytics.title') }}
                </h1>
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    {{ __('services.data_analytics.hero.subtitle') }}
                </p>
                
                {{-- Stats --}}
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-400">1000+</div>
                        <div class="text-gray-300">{{ __('services.data_analytics.stats.data_projects') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-400">5000+</div>
                        <div class="text-gray-300">{{ __('services.data_analytics.stats.insights_generated') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-400">10+</div>
                        <div class="text-gray-300">{{ __('services.data_analytics.stats.years_experience') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-400">5</div>
                        <div class="text-gray-300">{{ __('services.data_analytics.stats.tools_mastered') }}</div>
                    </div>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.data_analytics.cta.get_analytics') }}
                    </a>
                    <a href="#tools" class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.data_analytics.cta.view_dashboards') }}
                    </a>
                </div>
            </div>
            
            {{-- Hero Image/Illustration --}}
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
                    <svg class="w-64 h-64 mx-auto text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3v18h18V3H3zm16 16H5V5h14v14zM7 12h2v5H7v-5zm4-3h2v8h-2V9zm4-3h2v11h-2V6z"/>
                    </svg>
                    <p class="text-gray-300 mt-4">{{ __('services.data_analytics.overview.title') }}</p>
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
                    {{ __('services.data_analytics.overview.title') }}
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ __('services.data_analytics.overview.description') }}
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ __('services.data_analytics.overview.expertise') }}
                </p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Our Analytics Capabilities</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Advanced Statistical Analysis & Modeling</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Interactive Dashboard Development</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Predictive Analytics & Forecasting</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Automated Reporting Solutions</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Analytics Tools Section --}}
<section id="tools" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.data_analytics.tools.title') }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Industry-leading tools for comprehensive data analysis and visualization</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            @foreach(['excel', 'python', 'sql', 'powerbi', 'tableau'] as $tool)
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3v18h18V3H3zm16 16H5V5h14v14zM7 12h2v5H7v-5zm4-3h2v8h-2V9zm4-3h2v11h-2V6z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    {{ __("services.data_analytics.tools.{$tool}.name") }}
                </h3>
                <p class="text-gray-600 text-sm">
                    {{ __("services.data_analytics.tools.{$tool}.description") }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Comprehensive Analytics Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">End-to-end data solutions from collection to actionable insights</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['data_collection', 'data_analysis', 'data_visualization', 'business_intelligence'] as $service)
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3v18h18V3H3zm16 16H5V5h14v14zM7 12h2v5H7v-5zm4-3h2v8h-2V9zm4-3h2v11h-2V6z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ __("services.data_analytics.services.{$service}.title") }}
                </h3>
                <p class="text-gray-600 mb-4">
                    {{ __("services.data_analytics.services.{$service}.description") }}
                </p>
                <ul class="space-y-2">
                    @foreach(__("services.data_analytics.services.{$service}.features") as $feature)
                    <li class="flex items-start text-sm">
                        <svg class="w-4 h-4 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
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
<section id="packages" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.data_analytics.packages.title') }}</h2>
            <p class="text-xl text-gray-600">Scalable analytics solutions for every business size</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach(['basic', 'advanced', 'enterprise'] as $package)
            <div class="bg-white rounded-2xl p-8 shadow-lg {{ $package === 'advanced' ? 'ring-2 ring-blue-500 transform scale-105' : '' }}">
                @if($package === 'advanced')
                <div class="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-full text-center mb-6">Most Popular</div>
                @endif
                
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    {{ __("services.data_analytics.packages.{$package}.title") }}
                </h3>
                <p class="text-gray-600 mb-6">
                    {{ __("services.data_analytics.packages.{$package}.description") }}
                </p>
                <div class="text-3xl font-bold text-blue-600 mb-6">
                    {{ __("services.data_analytics.packages.{$package}.price") }}
                </div>
                <a href="#contact" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-lg font-semibold transition-colors duration-200">
                    Get Started
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Process Section --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.data_analytics.process.title') }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __('services.data_analytics.process.subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['step1', 'step2', 'step3', 'step4'] as $index => $step)
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    {{ $index + 1 }}
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ __("services.data_analytics.process.{$step}.title") }}
                </h3>
                <p class="text-gray-600">
                    {{ __("services.data_analytics.process.{$step}.description") }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-20 bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">{{ __('services.data_analytics.consultation.title') }}</h2>
            <p class="text-xl text-gray-300">{{ __('services.data_analytics.consultation.subtitle') }}</p>
        </div>

        <div class="bg-white rounded-2xl p-8">
            <form id="data-analytics-form" class="space-y-6">
                @csrf
                <input type="hidden" name="service_type" value="data_analytics">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.company') }}</label>
                        <input type="text" id="company" name="company" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                </div>

                <!-- Data Sources - Checkboxes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">{{ __('services.data_analytics.form.data_source') }}</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach(__('services.data_analytics.form.sources') as $key => $source)
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="data_source[]" value="{{ $key }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-3 text-sm text-gray-700">{{ $source }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Analytics Goals - Checkboxes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">{{ __('services.data_analytics.form.analytics_goal') }}</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach(__('services.data_analytics.form.goals') as $key => $goal)
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="analytics_goal[]" value="{{ $key }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-3 text-sm text-gray-700">{{ $goal }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Preferred Tools - Checkboxes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">{{ __('services.data_analytics.form.preferred_tool') }}</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @foreach(__('services.data_analytics.form.tools') as $key => $tool)
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="preferred_tool[]" value="{{ $key }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-3 text-sm text-gray-700">{{ $tool }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-gray-900 bg-white" placeholder="{{ __('services.data_analytics.form.message_placeholder') }}"></textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-lg font-semibold transition-colors duration-200">
                    {{ __('services.data_analytics.form.submit') }}
                </button>
            </form>
        </div>
    </div>
</section>

{{-- Related Services --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.data_analytics.related.title') }}</h2>
            <p class="text-xl text-gray-600">{{ __('services.data_analytics.related.subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.market_research.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.market_research.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.market-research') }}" class="text-blue-600 hover:text-blue-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.business_consultancy.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.business_consultancy.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-consultancy') }}" class="text-blue-600 hover:text-blue-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.training.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.training.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.corporate-training') }}" class="text-blue-600 hover:text-blue-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
        </div>
    </div>
</section>
@endsection
