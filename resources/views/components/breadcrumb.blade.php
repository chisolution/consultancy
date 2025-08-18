{{-- Breadcrumb Navigation Component --}}
@props(['items' => []])

@if(count($items) > 1)
<nav class="bg-gray-50 border-b border-gray-200" aria-label="Breadcrumb">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <ol class="flex items-center space-x-2 py-3 text-sm">
            @foreach($items as $index => $item)
                <li class="flex items-center">
                    @if($index > 0)
                        <svg class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    
                    @if($loop->last)
                        <span class="text-gray-500 font-medium" aria-current="page">
                            {{ $item['name'] }}
                        </span>
                    @else
                        <a href="{{ $item['url'] }}" class="text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200">
                            {{ $item['name'] }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>

{{-- Add structured data for breadcrumbs --}}
@push('structured-data')
    <x-seo.structured-data type="breadcrumb" :data="$items" />
@endpush
@endif
