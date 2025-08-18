{{-- Lazy Loading Image Component --}}
@props([
    'src' => '',
    'alt' => '',
    'class' => '',
    'placeholder' => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzlDQTNBRiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkxvYWRpbmcuLi48L3RleHQ+PC9zdmc+',
    'sizes' => '',
    'srcset' => '',
    'loading' => 'lazy',
    'decoding' => 'async'
])

<img 
    src="{{ $placeholder }}"
    data-src="{{ $src }}"
    @if($srcset)
        data-srcset="{{ $srcset }}"
        sizes="{{ $sizes }}"
    @endif
    alt="{{ $alt }}"
    class="lazy-image {{ $class }}"
    loading="{{ $loading }}"
    decoding="{{ $decoding }}"
    {{ $attributes }}
>

@once
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for lazy loading
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                const src = img.getAttribute('data-src');
                const srcset = img.getAttribute('data-srcset');
                
                if (src) {
                    img.src = src;
                    img.removeAttribute('data-src');
                }
                
                if (srcset) {
                    img.srcset = srcset;
                    img.removeAttribute('data-srcset');
                }
                
                img.classList.remove('lazy-image');
                img.classList.add('lazy-loaded');
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px 0px',
        threshold: 0.01
    });

    // Observe all lazy images
    document.querySelectorAll('.lazy-image').forEach(img => {
        imageObserver.observe(img);
    });
});
</script>
@endpush

@push('head')
<style>
.lazy-image {
    transition: opacity 0.3s ease;
    opacity: 0.7;
}

.lazy-loaded {
    opacity: 1;
}

/* Blur effect while loading */
.lazy-image:not(.lazy-loaded) {
    filter: blur(2px);
}
</style>
@endpush
@endonce
