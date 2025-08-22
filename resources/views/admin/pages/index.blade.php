<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Page Management') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.pages.create') }}" 
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Page
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
                    <form method="GET" action="{{ route('admin.pages.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Search -->
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                       placeholder="Page title, slug, content..."
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <!-- Type Filter -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Page Type</label>
                                <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="all">All Types</option>
                                    @foreach($pageTypes as $type)
                                        <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                                            {{ ucfirst($type) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status Filter -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">All Statuses</option>
                                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>

                            <!-- Sort Options -->
                            <div>
                                <label for="sort_by" class="block text-sm font-medium text-gray-700">Sort By</label>
                                <div class="flex space-x-2">
                                    <select name="sort_by" id="sort_by" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="sort_order" {{ request('sort_by', 'sort_order') === 'sort_order' ? 'selected' : '' }}>Sort Order</option>
                                        <option value="title" {{ request('sort_by') === 'title' ? 'selected' : '' }}>Title</option>
                                        <option value="type" {{ request('sort_by') === 'type' ? 'selected' : '' }}>Type</option>
                                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Date Created</option>
                                        <option value="updated_at" {{ request('sort_by') === 'updated_at' ? 'selected' : '' }}>Last Updated</option>
                                    </select>
                                    <select name="sort_direction" class="mt-1 block w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="asc" {{ request('sort_direction', 'asc') === 'asc' ? 'selected' : '' }}>Asc</option>
                                        <option value="desc" {{ request('sort_direction') === 'desc' ? 'selected' : '' }}>Desc</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Apply Filters
                                </button>
                                <a href="{{ route('admin.pages.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Clear Filters
                                </a>
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ $pages->total() }} total pages
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Pages Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Page
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Slug
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Featured
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Last Updated
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pages as $page)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $page->getTitle('en') }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($page->getExcerpt('en'), 50) }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ ucfirst($page->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-mono text-gray-900">{{ $page->slug }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $page->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $page->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($page->is_featured)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Featured
                                            </span>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $page->updated_at->format('M j, Y') }}
                                        <div class="text-xs text-gray-400">{{ $page->updated_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.pages.show', $page) }}" 
                                               class="text-indigo-600 hover:text-indigo-900">View</a>
                                            <a href="{{ route('admin.pages.edit', $page) }}" 
                                               class="text-green-600 hover:text-green-900">Edit</a>
                                            <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" 
                                                  onsubmit="return confirm('Are you sure you want to delete this page?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        No pages found. <a href="{{ route('admin.pages.create') }}" class="text-blue-600 hover:text-blue-800">Create your first page</a>.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($pages->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $pages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
