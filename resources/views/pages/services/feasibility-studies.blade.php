@extends('layouts.app')

@section('title', __('services.feasibility_studies.meta.title'))
@section('description', __('services.feasibility_studies.meta.description'))
@section('keywords', __('services.feasibility_studies.meta.keywords'))

@push('structured-data')
    <x-seo.structured-data type="service" :data="[
        'name' => __('services.feasibility_studies.title'),
        'description' => __('services.feasibility_studies.short_description'),
        'serviceType' => 'Feasibility Studies',
        'category' => 'Business Consulting',
        'offers' => [
            'description' => __('services.feasibility_studies.packages.market_entry.description'),
            'priceRange' => '$3,500 - $12,000'
        ],
        'url' => url()->current()
    ]" />
    <x-seo.structured-data type="webpage" :data="[
        'title' => __('services.feasibility_studies.meta.title'),
        'description' => __('services.feasibility_studies.meta.description')
    ]" />
@endpush

@section('content')
{{-- Breadcrumb Navigation --}}
<x-breadcrumb :items="[
    ['name' => __('common.nav.home'), 'url' => \App\Helpers\LocaleHelper::route('home')],
    ['name' => __('common.nav.services'), 'url' => \App\Helpers\LocaleHelper::route('services')],
    ['name' => __('services.feasibility_studies.title'), 'url' => url()->current()]
]" />

{{-- Hero Section --}}
<section class="bg-gradient-to-br from-secondary-600 to-secondary-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.feasibility_studies.title') }}
                </h1>
                <p class="text-xl text-secondary-100 mb-8 leading-relaxed">
                    {{ __('services.feasibility_studies.hero.subtitle') }}
                </p>
                
                {{-- Stats --}}
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-400">200+</div>
                        <div class="text-secondary-200">{{ __('services.feasibility_studies.stats.studies_completed') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-400">85%</div>
                        <div class="text-secondary-200">{{ __('services.feasibility_studies.stats.success_rate') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-400">12+</div>
                        <div class="text-secondary-200">{{ __('services.feasibility_studies.stats.years_experience') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-400">5</div>
                        <div class="text-secondary-200">{{ __('services.feasibility_studies.stats.markets_covered') }}</div>
                    </div>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.feasibility_studies.cta.get_study') }}
                    </a>
                    <a href="#locations" class="border-2 border-white text-white hover:bg-white hover:text-secondary-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.feasibility_studies.cta.view_locations') }}
                    </a>
                </div>
            </div>
            
            {{-- Hero Image/Illustration --}}
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
                    <svg class="w-64 h-64 mx-auto text-primary-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <p class="text-secondary-100 mt-4">{{ __('services.feasibility_studies.overview.title') }}</p>
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
                    {{ __('services.feasibility_studies.overview.title') }}
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ __('services.feasibility_studies.overview.description') }}
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ __('services.feasibility_studies.overview.expertise') }}
                </p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Key Assessment Areas</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-secondary-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Market Demand & Competition Analysis</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-secondary-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Strategic Location Assessment</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-secondary-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Regulatory & Legal Requirements</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-secondary-600 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Financial Projections & ROI Analysis</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Comprehensive Feasibility Assessment</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">End-to-end feasibility analysis for informed investment decisions</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['market_viability', 'location_analysis', 'regulatory_guidance', 'financial_modeling'] as $service)
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ __("services.feasibility_studies.services.{$service}.title") }}
                </h3>
                <p class="text-gray-600 mb-4">
                    {{ __("services.feasibility_studies.services.{$service}.description") }}
                </p>
                <ul class="space-y-2">
                    @foreach(__("services.feasibility_studies.services.{$service}.features") as $feature)
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

{{-- Strategic Locations Section --}}
<section id="locations" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Strategic Locations We Cover</h2>
            <p class="text-xl text-gray-600">Prime business locations across Rwanda and Cameroon</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <span class="text-2xl mr-3">🇷🇼</span>
                    <h3 class="text-xl font-semibold text-gray-900">Kigali, Rwanda</h3>
                </div>
                <p class="text-gray-600 mb-4">East Africa's business hub with excellent infrastructure and government support</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>• Special Economic Zones</li>
                    <li>• Tech and Innovation Centers</li>
                    <li>• Financial District</li>
                    <li>• Industrial Parks</li>
                </ul>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <span class="text-2xl mr-3">🇨🇲</span>
                    <h3 class="text-xl font-semibold text-gray-900">Douala, Cameroon</h3>
                </div>
                <p class="text-gray-600 mb-4">Central Africa's economic capital with major port and logistics advantages</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>• Port and Logistics Hub</li>
                    <li>• Industrial Zones</li>
                    <li>• Commercial Districts</li>
                    <li>• Free Trade Areas</li>
                </ul>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <span class="text-2xl mr-3">🇨🇲</span>
                    <h3 class="text-xl font-semibold text-gray-900">Yaoundé, Cameroon</h3>
                </div>
                <p class="text-gray-600 mb-4">Political and administrative center with growing business opportunities</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>• Government Sector</li>
                    <li>• Educational Hub</li>
                    <li>• Service Industries</li>
                    <li>• Diplomatic Quarter</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Packages Section --}}
<section id="packages" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.feasibility_studies.packages.title') }}</h2>
            <p class="text-xl text-gray-600">Comprehensive feasibility studies tailored to your investment level</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach(['market_entry', 'comprehensive', 'investment_grade'] as $package)
            <div class="bg-white rounded-2xl p-8 shadow-lg {{ $package === 'comprehensive' ? 'ring-2 ring-secondary-500 transform scale-105' : '' }}">
                @if($package === 'comprehensive')
                <div class="bg-secondary-500 text-white text-sm font-semibold px-4 py-2 rounded-full text-center mb-6">Most Popular</div>
                @endif
                
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    {{ __("services.feasibility_studies.packages.{$package}.title") }}
                </h3>
                <p class="text-gray-600 mb-6">
                    {{ __("services.feasibility_studies.packages.{$package}.description") }}
                </p>
                <div class="text-3xl font-bold text-secondary-600 mb-6">
                    {{ __("services.feasibility_studies.packages.{$package}.price") }}
                </div>
                <a href="#contact" class="block w-full bg-secondary-600 hover:bg-secondary-700 text-white text-center py-3 rounded-lg font-semibold transition-colors duration-200">
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
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.feasibility_studies.process.title') }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __('services.feasibility_studies.process.subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['step1', 'step2', 'step3', 'step4'] as $index => $step)
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    {{ $index + 1 }}
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                    {{ __("services.feasibility_studies.process.{$step}.title") }}
                </h3>
                <p class="text-gray-600">
                    {{ __("services.feasibility_studies.process.{$step}.description") }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-20 bg-secondary-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">{{ __('services.feasibility_studies.consultation.title') }}</h2>
            <p class="text-xl text-secondary-100">{{ __('services.feasibility_studies.consultation.subtitle') }}</p>
        </div>

        <div class="bg-white rounded-2xl p-8">
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.contact.form.name') }} *</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.contact.form.email') }} *</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 transition-colors duration-200 text-gray-900 bg-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="target_location" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.feasibility_studies.form.target_location') }}</label>
                        <select id="target_location" name="target_location" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 transition-colors duration-200 text-gray-900 bg-white">
                            <option value="">{{ __('services.feasibility_studies.form.select_location') }}</option>
                            @foreach(__('services.feasibility_studies.form.locations') as $key => $location)
                            <option value="{{ $key }}">{{ $location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="investment_range" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.feasibility_studies.form.investment_range') }}</label>
                        <select id="investment_range" name="investment_range" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 transition-colors duration-200 text-gray-900 bg-white">
                            <option value="">{{ __('services.feasibility_studies.form.select_range') }}</option>
                            @foreach(__('services.feasibility_studies.form.ranges') as $key => $range)
                            <option value="{{ $key }}">{{ $range }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label for="business_concept" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.feasibility_studies.form.business_concept') }} *</label>
                    <textarea id="business_concept" name="business_concept" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 transition-colors duration-200 text-gray-900 bg-white" placeholder="{{ __('services.feasibility_studies.form.message_placeholder') }}"></textarea>
                </div>

                <button type="submit" class="w-full bg-secondary-600 hover:bg-secondary-700 text-white py-4 rounded-lg font-semibold transition-colors duration-200">
                    {{ __('services.feasibility_studies.form.submit') }}
                </button>
            </form>
        </div>
    </div>
</section>

{{-- Related Services --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('services.feasibility_studies.related.title') }}</h2>
            <p class="text-xl text-gray-600">{{ __('services.feasibility_studies.related.subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.market_research.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.market_research.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.market-research') }}" class="text-secondary-600 hover:text-secondary-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.business_registration.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.business_registration.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-registration') }}" class="text-secondary-600 hover:text-secondary-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.business_consultancy.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.business_consultancy.short_description') }}</p>
                <a href="{{ \App\Helpers\LocaleHelper::route('services.business-consultancy') }}" class="text-secondary-600 hover:text-secondary-700 font-semibold">{{ __('common.learn_more') }} →</a>
            </div>
        </div>
    </div>
</section>
@endsection
