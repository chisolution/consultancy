@extends('layouts.app')

@section('title', __('common.meta.about.title'))
@section('description', __('common.meta.about.description'))
@section('keywords', __('common.meta.about.keywords'))

@section('content')
{{-- Breadcrumb Navigation --}}
<x-breadcrumb :items="[
    ['name' => __('common.nav.home'), 'url' => \App\Helpers\LocaleHelper::route('home')],
    ['name' => __('common.nav.about'), 'url' => url()->current()]
]" />
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary-50 to-secondary-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                About Our Consultancy
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Bridging business expertise across borders with cultural competency and professional excellence
            </p>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
                <div class="prose prose-lg text-gray-600">
                    <p class="mb-6">
                        Founded with a vision to bridge business expertise across borders, we serve clients in Rwanda, Canada, US, and Cameroon with deep cultural understanding and professional excellence.
                    </p>
                    <p class="mb-6">
                        Our team combines international experience with local market knowledge, providing businesses with the insights and support they need to thrive in today's global economy.
                    </p>
                    <p class="mb-6">
                        We believe that successful business transcends borders, and our mission is to make professional consultancy services accessible and culturally relevant across all the markets we serve.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="{{ \App\Helpers\LocaleHelper::route('services') }}" class="btn-primary text-center">
                        Explore Our Services
                    </a>
                    <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="btn-secondary text-center">
                        Get In Touch
                    </a>
                </div>
            </div>

            <!-- Image Placeholder -->
            <div class="relative">
                <div class="bg-gradient-to-br from-primary-100 to-secondary-100 rounded-2xl p-8 h-96 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-primary-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600 text-sm">Team Collaboration Image</p>
                        <p class="text-gray-500 text-xs mt-1">Professional photo placeholder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Our Values</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                The principles that guide our work and relationships with clients
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Excellence -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Excellence</h3>
                <p class="text-gray-600">
                    We deliver quality work that exceeds expectations, maintaining the highest professional standards in everything we do.
                </p>
            </div>

            <!-- Integrity -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Integrity</h3>
                <p class="text-gray-600">
                    Transparent and honest in all our dealings, building trust through consistent ethical practices and open communication.
                </p>
            </div>

            <!-- Cultural Sensitivity -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Cultural Sensitivity</h3>
                <p class="text-gray-600">
                    Respecting diverse business cultures and practices, adapting our approach to meet local market needs and expectations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Experienced professionals dedicated to your business success
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="text-center">
                <div class="w-32 h-32 bg-primary-200 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <span class="text-3xl text-primary-600 font-bold">JD</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">John Doe</h3>
                <p class="text-primary-600 font-medium mb-3">CEO & Founder</p>
                <p class="text-gray-600 mb-4">CPA, MBA - 15+ years international experience</p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-gray-400 hover:text-primary-600 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="text-center">
                <div class="w-32 h-32 bg-secondary-200 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <span class="text-3xl text-secondary-600 font-bold">JS</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Jane Smith</h3>
                <p class="text-secondary-600 font-medium mb-3">Senior Consultant</p>
                <p class="text-gray-600 mb-4">CPA, Tax Specialist - Cross-border expertise</p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-gray-400 hover:text-secondary-600 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="text-center">
                <div class="w-32 h-32 bg-accent-200 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <span class="text-3xl text-accent-600 font-bold">MD</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Marie Dubois</h3>
                <p class="text-accent-600 font-medium mb-3">Tax Specialist</p>
                <p class="text-gray-600 mb-4">Bilingual expertise - French & English markets</p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-gray-400 hover:text-accent-600 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-secondary-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Our Impact</h2>
            <p class="text-xl text-primary-100">Trusted by businesses across four countries</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-white mb-2">150+</div>
                <div class="text-primary-100">Clients Served</div>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-white mb-2">4</div>
                <div class="text-primary-100">Countries</div>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-white mb-2">10+</div>
                <div class="text-primary-100">Years Experience</div>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-white mb-2">98%</div>
                <div class="text-primary-100">Client Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
            Ready to Work Together?
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            Let's discuss how we can help your business succeed across borders
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ \App\Helpers\LocaleHelper::route('contact') }}" class="btn-primary">
                Get Started Today
            </a>
            <a href="{{ \App\Helpers\LocaleHelper::route('services') }}" class="btn-secondary">
                View Our Services
            </a>
        </div>
    </div>
</section>
@endsection
