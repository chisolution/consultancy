@extends('layouts.app')

@section('title', __('services.career_development.meta.title'))
@section('description', __('services.career_development.meta.description'))
@section('keywords', __('services.career_development.meta.keywords'))

@push('structured-data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.career_development.title') }}",
  "description": "{{ __('services.career_development.meta.description') }}",
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
  "serviceType": "Career Development Services",
  "offers": {
    "@type": "Offer",
    "price": "200",
    "priceCurrency": "USD",
    "description": "Starting from $200 for career coaching sessions"
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
            <li class="text-gray-900 font-medium">{{ __('services.career_development.title') }}</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-secondary-600 to-accent-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                    {{ __('services.career_development.title') }}
                </h1>
                <p class="text-xl text-secondary-100 mb-8 leading-relaxed">
                    {{ __('services.career_development.hero.subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#consultation" class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.career_development.cta.start_coaching') }}
                    </a>
                    <a href="#services" class="border-2 border-white text-white hover:bg-white hover:text-secondary-600 px-8 py-4 rounded-lg font-semibold transition-colors duration-200 text-center">
                        {{ __('services.career_development.cta.view_programs') }}
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-3xl font-bold text-primary-300">500+</div>
                            <div class="text-secondary-100">{{ __('services.career_development.stats.careers_advanced') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">92%</div>
                            <div class="text-secondary-100">{{ __('services.career_development.stats.success_rate') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">6+</div>
                            <div class="text-secondary-100">{{ __('services.career_development.stats.years_experience') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary-300">85%</div>
                            <div class="text-secondary-100">{{ __('services.career_development.stats.promotion_rate') }}</div>
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
                    {{ __('services.career_development.overview.title') }}
                </h2>
                <div class="prose prose-lg text-gray-600 mb-8">
                    <p>{{ __('services.career_development.overview.description') }}</p>
                    <p>{{ __('services.career_development.overview.expertise') }}</p>
                </div>
                
                <!-- Key Services -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.career_development.services.career_coaching.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.career_development.services.career_coaching.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.career_development.services.resume_optimization.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.career_development.services.resume_optimization.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.career_development.services.interview_prep.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.career_development.services.interview_prep.description') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('services.career_development.services.skill_development.title') }}</h3>
                            <p class="text-gray-600">{{ __('services.career_development.services.skill_development.description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Contact -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.career_development.contact.title') }}</h3>
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
                            <span class="text-gray-600">careers@consultancy.rw</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ __('services.career_development.contact.hours') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="block w-full bg-secondary-600 hover:bg-secondary-700 text-white text-center py-3 rounded-lg font-semibold mt-4 transition-colors duration-200">
                        {{ __('services.career_development.contact.cta') }}
                    </a>
                </div>
                
                <!-- Career Assessment -->
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('services.career_development.assessment.title') }}</h3>
                    <p class="text-sm text-gray-600 mb-4">{{ __('services.career_development.assessment.description') }}</p>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-700">{{ __('services.career_development.assessment.items.strengths') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-700">{{ __('services.career_development.assessment.items.goals') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-700">{{ __('services.career_development.assessment.items.opportunities') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-700">{{ __('services.career_development.assessment.items.action_plan') }}</span>
                        </div>
                    </div>
                    <button class="w-full bg-accent-600 hover:bg-accent-700 text-white py-2 rounded-lg font-medium text-sm mt-4 transition-colors duration-200">
                        {{ __('services.career_development.assessment.cta') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Career Programs -->
<section id="services" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.career_development.programs.title') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('services.career_development.programs.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Individual Coaching -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.career_development.programs.individual.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.career_development.programs.individual.description') }}</p>
                <div class="text-sm text-gray-500 mb-4">
                    <p><strong>{{ __('services.career_development.programs.duration') }}:</strong> {{ __('services.career_development.programs.individual.duration') }}</p>
                    <p><strong>{{ __('services.career_development.programs.format') }}:</strong> {{ __('services.career_development.programs.individual.format') }}</p>
                </div>
                <div class="text-lg font-bold text-secondary-600 mb-4">{{ __('services.career_development.programs.individual.price') }}</div>
            </div>
            
            <!-- Group Workshops -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.career_development.programs.group.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.career_development.programs.group.description') }}</p>
                <div class="text-sm text-gray-500 mb-4">
                    <p><strong>{{ __('services.career_development.programs.duration') }}:</strong> {{ __('services.career_development.programs.group.duration') }}</p>
                    <p><strong>{{ __('services.career_development.programs.format') }}:</strong> {{ __('services.career_development.programs.group.format') }}</p>
                </div>
                <div class="text-lg font-bold text-accent-600 mb-4">{{ __('services.career_development.programs.group.price') }}</div>
            </div>
            
            <!-- Executive Coaching -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ __('services.career_development.programs.executive.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.career_development.programs.executive.description') }}</p>
                <div class="text-sm text-gray-500 mb-4">
                    <p><strong>{{ __('services.career_development.programs.duration') }}:</strong> {{ __('services.career_development.programs.executive.duration') }}</p>
                    <p><strong>{{ __('services.career_development.programs.format') }}:</strong> {{ __('services.career_development.programs.executive.format') }}</p>
                </div>
                <div class="text-lg font-bold text-primary-600 mb-4">{{ __('services.career_development.programs.executive.price') }}</div>
            </div>
        </div>
    </div>
</section>

<!-- Consultation Form -->
<section id="consultation" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ __('services.career_development.consultation.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.career_development.consultation.subtitle') }}
            </p>
        </div>
        
        <div class="bg-gray-50 rounded-2xl p-8">
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.name') }}</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.email') }}</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="current_role" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.career_development.form.current_role') }}</label>
                    <input type="text" id="current_role" name="current_role" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.phone') }}</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                </div>
                
                <div>
                    <label for="experience_level" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.career_development.form.experience_level') }}</label>
                    <select id="experience_level" name="experience_level" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                        <option value="">{{ __('services.career_development.form.select_level') }}</option>
                        <option value="entry">{{ __('services.career_development.form.levels.entry') }}</option>
                        <option value="mid">{{ __('services.career_development.form.levels.mid') }}</option>
                        <option value="senior">{{ __('services.career_development.form.levels.senior') }}</option>
                        <option value="executive">{{ __('services.career_development.form.levels.executive') }}</option>
                    </select>
                </div>
                
                <div>
                    <label for="coaching_focus" class="block text-sm font-medium text-gray-700 mb-2">{{ __('services.career_development.form.coaching_focus') }}</label>
                    <select id="coaching_focus" name="coaching_focus" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500">
                        <option value="">{{ __('services.career_development.form.select_focus') }}</option>
                        <option value="career_change">{{ __('services.career_development.form.focus.career_change') }}</option>
                        <option value="promotion">{{ __('services.career_development.form.focus.promotion') }}</option>
                        <option value="leadership">{{ __('services.career_development.form.focus.leadership') }}</option>
                        <option value="skills">{{ __('services.career_development.form.focus.skills') }}</option>
                        <option value="interview">{{ __('services.career_development.form.focus.interview') }}</option>
                    </select>
                </div>
                
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('common.form.message') }}</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500" placeholder="{{ __('services.career_development.form.message_placeholder') }}"></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-secondary-600 hover:bg-secondary-700 text-white py-4 px-8 rounded-lg font-semibold text-lg transition-colors duration-200">
                        {{ __('services.career_development.form.submit') }}
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
                {{ __('services.career_development.related.title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('services.career_development.related.subtitle') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Corporate Training -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.corporate_training.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.corporate_training.short_description') }}</p>
                <a href="{{ route('services.corporate-training', app()->getLocale()) }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
            
            <!-- Business Consultancy -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.business_consultancy.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.business_consultancy.short_description') }}</p>
                <a href="{{ route('services.business-consultancy', app()->getLocale()) }}" class="text-secondary-600 hover:text-secondary-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
            
            <!-- Financial Planning -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('services.financial_planning.title') }}</h3>
                <p class="text-gray-600 mb-4">{{ __('services.financial_planning.short_description') }}</p>
                <a href="{{ route('services.financial-planning', app()->getLocale()) }}" class="text-accent-600 hover:text-accent-700 font-semibold">
                    {{ __('common.learn_more') }} →
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
