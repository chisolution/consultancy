@extends('layouts.app')

@section('title', __('common.meta.contact.title'))
@section('description', __('common.meta.contact.description'))
@section('keywords', __('common.meta.contact.keywords'))

@section('content')
{{-- Breadcrumb Navigation --}}
<x-breadcrumb :items="[
    ['name' => __('common.nav.home'), 'url' => \App\Helpers\LocaleHelper::route('home')],
    ['name' => __('common.nav.contact'), 'url' => url()->current()]
]" />
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary-50 to-secondary-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                {{ __('common.contact.title') }}
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('common.contact.subtitle') }}
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-gray-50 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('common.contact.form.title') }}</h2>
                <form id="contact-form" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('common.contact.form.name') }} *
                            </label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('common.contact.form.email') }} *
                            </label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('common.contact.form.phone') }}
                            </label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200">
                        </div>
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('common.contact.form.company') }}
                            </label>
                            <input type="text" id="company" name="company"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200">
                        </div>
                    </div>
                    
                    <div>
                        <label for="service" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('common.contact.form.service') }}
                        </label>
                        <select id="service" name="service"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200">
                            <option value="">{{ __('common.contact.form.select_service') }}</option>
                            <option value="business_consultancy">{{ __('common.services.business_consultancy.title') }}</option>
                            <option value="accounting">{{ __('common.services.accounting.title') }}</option>
                            <option value="tax_advisory">{{ __('common.services.tax_advisory.title') }}</option>
                            <option value="financial_planning">{{ __('common.services.financial_planning.title') }}</option>
                            <option value="business_registration">{{ __('common.services.business_registration.title') }}</option>
                            <option value="audit_compliance">{{ __('common.services.audit_compliance.title') }}</option>
                            <option value="training">{{ __('common.services.training.title') }}</option>
                            <option value="career_development">{{ __('common.services.career_development.title') }}</option>
                            <option value="feasibility-studies">Feasibility Studies</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('common.contact.form.message') }} *
                        </label>
                        <textarea id="message" name="message" rows="6" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                                  placeholder="{{ __('common.contact.form.message_placeholder') }}"></textarea>
                    </div>
                    
                    <button type="submit" class="btn-primary w-full" id="submit-btn">
                        <span id="submit-text">{{ __('common.contact.form.send_message') }}</span>
                        <span id="loading-text" class="hidden">{{ __('common.ui.loading') }}</span>
                    </button>

                    <!-- Success/Error Messages -->
                    <div id="form-messages" class="hidden">
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

            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('common.contact.info.title') }}</h2>
                <p class="text-gray-600 mb-8">{{ __('common.contact.info.description') }}</p>

                <!-- Office Location -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.footer.office_location') }}</h3>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                                <span class="text-2xl">🇷🇼</span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">{{ __('common.footer.location.city') }}</h4>
                            <p class="text-gray-600">{{ __('common.footer.location.address') }}</p>
                            <p class="text-gray-600">{{ __('common.footer.location.city') }}</p>
                            <p class="text-primary-600 font-medium">{{ __('common.footer.location.phone') }}</p>
                            <p class="text-primary-600 font-medium">{{ __('common.footer.location.email') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Global Service Delivery -->
                <div class="bg-gradient-to-r from-primary-50 to-secondary-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('common.contact.global_service.title') }}</h3>
                    <p class="text-gray-600 mb-4">{{ __('common.contact.global_service.description') }}</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">{{ __('common.contact.global_service.features.remote_consultation') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">{{ __('common.contact.global_service.features.specialist_partnerships') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">{{ __('common.contact.global_service.features.cultural_competency') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-secondary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">{{ __('common.contact.global_service.features.local_expertise') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Methods -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.contact.cta.title') }}</h3>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-primary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span class="text-gray-600">{{ __('common.contact.cta.email') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-primary-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                            <span class="text-gray-600">{{ __('common.contact.cta.phone') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section Placeholder -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('common.contact.map.title') }}</h2>
            <p class="text-xl text-gray-600">{{ __('common.contact.map.subtitle') }}</p>
        </div>

        <!-- Map Placeholder -->
        <div class="bg-gray-200 rounded-2xl h-96 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p class="text-gray-500">{{ __('common.contact.map.coming_soon') }}</p>
                <p class="text-gray-400 text-sm">{{ __('common.contact.map.showing_locations') }}</p>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const loadingText = document.getElementById('loading-text');
    const formMessages = document.getElementById('form-messages');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    const successText = document.getElementById('success-text');
    const errorText = document.getElementById('error-text');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');

        // Hide previous messages
        formMessages.classList.add('hidden');
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');

        try {
            const formData = new FormData(form);

            const response = await fetch('{{ route("contact.submit") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });

            const data = await response.json();

            if (data.success) {
                // Show success message
                successText.textContent = data.message;
                successMessage.classList.remove('hidden');
                formMessages.classList.remove('hidden');

                // Reset form
                form.reset();
            } else {
                throw new Error(data.message || 'An error occurred');
            }

        } catch (error) {
            // Show error message
            errorText.textContent = error.message || '{{ __("common.contact.form.error_message") }}';
            errorMessage.classList.remove('hidden');
            formMessages.classList.remove('hidden');
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            loadingText.classList.add('hidden');
        }
    });
});
</script>
@endpush
@endsection
