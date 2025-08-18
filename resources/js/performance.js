/**
 * Performance Optimization Module
 * Handles lazy loading, preloading, and performance monitoring
 */

// Critical Resource Hints
export function addResourceHints() {
    // Preload critical fonts
    const fontPreloads = [
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap'
    ];

    fontPreloads.forEach(href => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'style';
        link.href = href;
        link.onload = function() { this.rel = 'stylesheet'; };
        document.head.appendChild(link);
    });
}

// Lazy load non-critical CSS
export function loadNonCriticalCSS() {
    const nonCriticalCSS = [
        // Add any non-critical CSS files here
    ];

    nonCriticalCSS.forEach(href => {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = href;
        link.media = 'print';
        link.onload = function() { this.media = 'all'; };
        document.head.appendChild(link);
    });
}

// Preload next page on hover
export function initPreloadOnHover() {
    const links = document.querySelectorAll('a[href^="/"]');
    const preloadedUrls = new Set();

    links.forEach(link => {
        link.addEventListener('mouseenter', function() {
            const url = this.href;
            if (!preloadedUrls.has(url)) {
                const linkEl = document.createElement('link');
                linkEl.rel = 'prefetch';
                linkEl.href = url;
                document.head.appendChild(linkEl);
                preloadedUrls.add(url);
            }
        }, { once: true });
    });
}

// Optimize images with WebP support
export function optimizeImages() {
    // Check WebP support
    const supportsWebP = (function() {
        const canvas = document.createElement('canvas');
        canvas.width = 1;
        canvas.height = 1;
        return canvas.toDataURL('image/webp').indexOf('data:image/webp') === 0;
    })();

    if (supportsWebP) {
        // Replace image sources with WebP versions if available
        const images = document.querySelectorAll('img[data-webp]');
        images.forEach(img => {
            img.src = img.dataset.webp;
        });
    }
}

// Performance monitoring
export function initPerformanceMonitoring() {
    // Monitor page load performance
    window.addEventListener('load', () => {
        const perfData = performance.getEntriesByType('navigation')[0];

        // Log performance metrics in development
        if (window.location.hostname === 'localhost') {
            console.log('Performance Metrics:', {
                'DNS Lookup': perfData.domainLookupEnd - perfData.domainLookupStart,
                'TCP Connection': perfData.connectEnd - perfData.connectStart,
                'Request': perfData.responseStart - perfData.requestStart,
                'Response': perfData.responseEnd - perfData.responseStart,
                'DOM Processing': perfData.domContentLoadedEventStart - perfData.responseEnd,
                'Total Load Time': perfData.loadEventEnd - perfData.navigationStart
            });
        }
    });

    // Basic Core Web Vitals monitoring without external dependencies
    if ('PerformanceObserver' in window) {
        // Monitor Largest Contentful Paint
        const lcpObserver = new PerformanceObserver((list) => {
            const entries = list.getEntries();
            const lastEntry = entries[entries.length - 1];
            if (window.location.hostname === 'localhost') {
                console.log('LCP:', lastEntry.startTime);
            }
        });
        lcpObserver.observe({ entryTypes: ['largest-contentful-paint'] });

        // Monitor First Input Delay
        const fidObserver = new PerformanceObserver((list) => {
            const entries = list.getEntries();
            entries.forEach(entry => {
                if (window.location.hostname === 'localhost') {
                    console.log('FID:', entry.processingStart - entry.startTime);
                }
            });
        });
        fidObserver.observe({ entryTypes: ['first-input'] });
    }
}

// Reduce layout shifts
export function reduceLayoutShifts() {
    // Add aspect ratio containers for images
    const images = document.querySelectorAll('img:not([width]):not([height])');
    images.forEach(img => {
        img.addEventListener('load', function() {
            const aspectRatio = this.naturalHeight / this.naturalWidth;
            this.style.aspectRatio = `1 / ${aspectRatio}`;
        });
    });
}

// Initialize all performance optimizations
export function initPerformanceOptimizations() {
    // Run immediately
    addResourceHints();
    optimizeImages();
    
    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            loadNonCriticalCSS();
            initPreloadOnHover();
            reduceLayoutShifts();
            initPerformanceMonitoring();
        });
    } else {
        loadNonCriticalCSS();
        initPreloadOnHover();
        reduceLayoutShifts();
        initPerformanceMonitoring();
    }
}

// Auto-initialize if this script is loaded
if (typeof window !== 'undefined') {
    initPerformanceOptimizations();
}
