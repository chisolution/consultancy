<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Media Library') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.media.create') }}" 
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Upload Media
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filters and Search -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.media.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Search -->
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                       placeholder="Filename, alt text..."
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <!-- Type Filter -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Media Type</label>
                                <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="all">All Types</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                                            {{ ucfirst($type) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- MIME Type Filter -->
                            <div>
                                <label for="mime_type" class="block text-sm font-medium text-gray-700">File Type</label>
                                <select name="mime_type" id="mime_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="all">All File Types</option>
                                    <option value="image" {{ request('mime_type') === 'image' ? 'selected' : '' }}>Images</option>
                                    <option value="document" {{ request('mime_type') === 'document' ? 'selected' : '' }}>Documents</option>
                                </select>
                            </div>

                            <!-- Sort Options -->
                            <div>
                                <label for="sort_by" class="block text-sm font-medium text-gray-700">Sort By</label>
                                <div class="flex space-x-2">
                                    <select name="sort_by" id="sort_by" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="created_at" {{ request('sort_by', 'created_at') === 'created_at' ? 'selected' : '' }}>Date Uploaded</option>
                                        <option value="filename" {{ request('sort_by') === 'filename' ? 'selected' : '' }}>Filename</option>
                                        <option value="size" {{ request('sort_by') === 'size' ? 'selected' : '' }}>File Size</option>
                                        <option value="mime_type" {{ request('sort_by') === 'mime_type' ? 'selected' : '' }}>File Type</option>
                                    </select>
                                    <select name="sort_direction" class="mt-1 block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="desc" {{ request('sort_direction', 'desc') === 'desc' ? 'selected' : '' }}>Desc</option>
                                        <option value="asc" {{ request('sort_direction') === 'asc' ? 'selected' : '' }}>Asc</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Apply Filters
                                </button>
                                <a href="{{ route('admin.media.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Clear Filters
                                </a>
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ $media->total() }} total files
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Media Grid -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($media->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                            @foreach($media as $item)
                                <div class="group relative bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                                    <div class="aspect-square flex items-center justify-center p-4">
                                        @if($item->isImage())
                                            <img src="{{ $item->getUrl() }}" 
                                                 alt="{{ $item->getAltText() }}"
                                                 class="max-w-full max-h-full object-contain rounded">
                                        @else
                                            <div class="text-center">
                                                <div class="text-4xl text-gray-400 mb-2">
                                                    @if($item->isDocument())
                                                        📄
                                                    @else
                                                        📁
                                                    @endif
                                                </div>
                                                <div class="text-xs text-gray-600 font-medium">
                                                    {{ strtoupper(pathinfo($item->filename, PATHINFO_EXTENSION)) }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Overlay with actions -->
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-200 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.media.show', $item) }}" 
                                               class="bg-white text-gray-800 px-3 py-1 rounded text-sm hover:bg-gray-100">
                                                View
                                            </a>
                                            <a href="{{ route('admin.media.edit', $item) }}" 
                                               class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- File info -->
                                    <div class="p-3 bg-white">
                                        <div class="text-xs font-medium text-gray-900 truncate" title="{{ $item->filename }}">
                                            {{ $item->filename }}
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ $item->getFormattedSize() }}
                                        </div>
                                        <div class="flex items-center justify-between mt-2">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                                                {{ $item->type === 'image' ? 'bg-green-100 text-green-800' : 
                                                   ($item->type === 'document' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                                {{ ucfirst($item->type) }}
                                            </span>
                                            @if(!$item->is_public)
                                                <span class="text-xs text-red-600">Private</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="text-gray-400 text-6xl mb-4">📁</div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No media files found</h3>
                            <p class="text-gray-500 mb-4">Upload your first media file to get started.</p>
                            <a href="{{ route('admin.media.create') }}" 
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Upload Media
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                @if($media->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $media->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
