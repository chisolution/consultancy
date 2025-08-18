{{-- Performance Monitoring Component --}}
@props(['enabled' => app()->environment('production')])

@if($enabled)
@once
@push('head')
<!-- Performance monitoring and optimization -->
<script>
// Critical performance optimizations that must run immediately
(function() {
    // Preload critical resources
    const criticalResources = [
        { href: '{{ asset("images/logo.svg") }}', as: 'image' },
        { href: '{{ asset("images/logo-white.svg") }}', as: 'image' }
    ];

    criticalResources.forEach(resource => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.href = resource.href;
        link.as = resource.as;
        document.head.appendChild(link);
    });

    // Optimize font loading
    if ('fonts' in document) {
        // Preload critical fonts
        const fontPromises = [
            new FontFace('Inter', 'url(https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hiA.woff2)', {
                weight: '400',
                style: 'normal',
                display: 'swap'
            }).load(),
            new FontFace('Poppins', 'url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecnFHGPc.woff2)', {
                weight: '400', 
                style: 'normal',
                display: 'swap'
            }).load()
        ];

        Promise.all(fontPromises).then(fonts => {
            fonts.forEach(font => document.fonts.add(font));
        }).catch(err => console.warn('Font preload failed:', err));
    }

    // Reduce layout shift by setting image dimensions
    const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            mutation.addedNodes.forEach(node => {
                if (node.nodeType === 1 && node.tagName === 'IMG') {
                    if (!node.width && !node.height) {
                        node.style.aspectRatio = '16/9'; // Default aspect ratio
                    }
                }
            });
        });
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            observer.observe(document.body, { childList: true, subtree: true });
        });
    } else {
        observer.observe(document.body, { childList: true, subtree: true });
    }
})();
</script>
@endpush

@push('scripts')
<script>
// Performance monitoring and reporting
(function() {
    // Core Web Vitals monitoring
    function sendMetric(name, value, id) {
        // In production, send to analytics service
        if (typeof gtag !== 'undefined') {
            gtag('event', name, {
                event_category: 'Web Vitals',
                value: Math.round(name === 'CLS' ? value * 1000 : value),
                event_label: id,
                non_interaction: true,
            });
        }
        
        // Log for development
        @if(app()->environment('local'))
        console.log(`${name}: ${value} (${id})`);
        @endif
    }

    // Largest Contentful Paint
    function observeLCP() {
        const observer = new PerformanceObserver((list) => {
            const entries = list.getEntries();
            const lastEntry = entries[entries.length - 1];
            sendMetric('LCP', lastEntry.startTime, lastEntry.id);
        });
        observer.observe({ entryTypes: ['largest-contentful-paint'] });
    }

    // First Input Delay
    function observeFID() {
        const observer = new PerformanceObserver((list) => {
            const entries = list.getEntries();
            entries.forEach(entry => {
                sendMetric('FID', entry.processingStart - entry.startTime, entry.name);
            });
        });
        observer.observe({ entryTypes: ['first-input'] });
    }

    // Cumulative Layout Shift
    function observeCLS() {
        let clsValue = 0;
        let clsEntries = [];
        let sessionValue = 0;
        let sessionEntries = [];

        const observer = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
                if (!entry.hadRecentInput) {
                    const firstSessionEntry = sessionEntries[0];
                    const lastSessionEntry = sessionEntries[sessionEntries.length - 1];

                    if (sessionValue && entry.startTime - lastSessionEntry.startTime < 1000 &&
                        entry.startTime - firstSessionEntry.startTime < 5000) {
                        sessionValue += entry.value;
                        sessionEntries.push(entry);
                    } else {
                        sessionValue = entry.value;
                        sessionEntries = [entry];
                    }

                    if (sessionValue > clsValue) {
                        clsValue = sessionValue;
                        clsEntries = [...sessionEntries];
                        sendMetric('CLS', clsValue, clsEntries.map(e => e.sources?.[0]?.node).filter(Boolean).join(','));
                    }
                }
            }
        });

        observer.observe({ entryTypes: ['layout-shift'] });
    }

    // Initialize monitoring
    if ('PerformanceObserver' in window) {
        observeLCP();
        observeFID();
        observeCLS();
    }

    // Page load performance
    window.addEventListener('load', () => {
        const navigation = performance.getEntriesByType('navigation')[0];
        if (navigation) {
            sendMetric('TTFB', navigation.responseStart - navigation.requestStart, 'navigation');
            sendMetric('Load', navigation.loadEventEnd - navigation.loadEventStart, 'navigation');
        }
    });
})();
</script>
@endpush
@endonce
@endif
