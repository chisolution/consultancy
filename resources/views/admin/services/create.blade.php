<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Service') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.services.index') }}" 
                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Services
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.services.store') }}">
                        @csrf

                        <!-- Basic Information -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Slug -->
                                <div class="md:col-span-2">
                                    <label for="slug" class="block text-sm font-medium text-gray-700">URL Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                                           placeholder="business-consultancy"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <p class="mt-2 text-sm text-gray-500">URL-friendly identifier (e.g., business-consultancy)</p>
                                </div>

                                <!-- Sort Order -->
                                <div>
                                    <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>

                                <!-- Icon -->
                                <div>
                                    <label for="icon" class="block text-sm font-medium text-gray-700">Icon Class</label>
                                    <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
                                           placeholder="fas fa-chart-line"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <p class="mt-1 text-xs text-gray-500">FontAwesome or similar icon class</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <!-- Status Checkboxes -->
                                <div class="flex items-center space-x-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="is_active" id="is_active" value="1" 
                                               {{ old('is_active', true) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="is_featured" id="is_featured" value="1" 
                                               {{ old('is_featured') ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Multi-language Content -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Content (Multi-language)</h3>
                            
                            <!-- Tabs for Languages -->
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex space-x-8">
                                    <button type="button" onclick="showTab('en')" id="tab-en" 
                                            class="tab-button border-b-2 border-indigo-500 py-2 px-1 text-sm font-medium text-indigo-600">
                                        English
                                    </button>
                                    <button type="button" onclick="showTab('fr')" id="tab-fr"
                                            class="tab-button border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                        French
                                    </button>
                                </nav>
                            </div>

                            <!-- English Content -->
                            <div id="content-en" class="tab-content mt-6">
                                <div class="space-y-6">
                                    <div>
                                        <label for="name_en" class="block text-sm font-medium text-gray-700">Service Name (English)</label>
                                        <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}" required
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>

                                    <div>
                                        <label for="description_en" class="block text-sm font-medium text-gray-700">Short Description (English)</label>
                                        <textarea name="description_en" id="description_en" rows="3" required
                                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description_en') }}</textarea>
                                    </div>

                                    <div>
                                        <label for="content_en" class="block text-sm font-medium text-gray-700">Full Content (English)</label>
                                        <textarea name="content_en" id="content_en" rows="8" required
                                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('content_en') }}</textarea>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="meta_title_en" class="block text-sm font-medium text-gray-700">Meta Title (English)</label>
                                            <input type="text" name="meta_title_en" id="meta_title_en" value="{{ old('meta_title_en') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label for="meta_description_en" class="block text-sm font-medium text-gray-700">Meta Description (English)</label>
                                            <input type="text" name="meta_description_en" id="meta_description_en" value="{{ old('meta_description_en') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- French Content -->
                            <div id="content-fr" class="tab-content mt-6 hidden">
                                <div class="space-y-6">
                                    <div>
                                        <label for="name_fr" class="block text-sm font-medium text-gray-700">Service Name (French)</label>
                                        <input type="text" name="name_fr" id="name_fr" value="{{ old('name_fr') }}" required
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>

                                    <div>
                                        <label for="description_fr" class="block text-sm font-medium text-gray-700">Short Description (French)</label>
                                        <textarea name="description_fr" id="description_fr" rows="3" required
                                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description_fr') }}</textarea>
                                    </div>

                                    <div>
                                        <label for="content_fr" class="block text-sm font-medium text-gray-700">Full Content (French)</label>
                                        <textarea name="content_fr" id="content_fr" rows="8" required
                                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('content_fr') }}</textarea>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="meta_title_fr" class="block text-sm font-medium text-gray-700">Meta Title (French)</label>
                                            <input type="text" name="meta_title_fr" id="meta_title_fr" value="{{ old('meta_title_fr') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>
                                        <div>
                                            <label for="meta_description_fr" class="block text-sm font-medium text-gray-700">Meta Description (French)</label>
                                            <input type="text" name="meta_description_fr" id="meta_description_fr" value="{{ old('meta_description_fr') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('admin.services.index') }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Service
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(lang) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active styles from all tabs
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('border-indigo-500', 'text-indigo-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Show selected tab content
            document.getElementById('content-' + lang).classList.remove('hidden');
            
            // Add active styles to selected tab
            const activeTab = document.getElementById('tab-' + lang);
            activeTab.classList.remove('border-transparent', 'text-gray-500');
            activeTab.classList.add('border-indigo-500', 'text-indigo-600');
        }

        // Auto-generate slug from English name
        document.getElementById('name_en').addEventListener('input', function() {
            const slug = this.value.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            document.getElementById('slug').value = slug;
        });
    </script>
</x-app-layout>
