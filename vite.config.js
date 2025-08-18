import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        // Optimize bundle size
        rollupOptions: {
            output: {
                manualChunks: {
                    // Separate vendor chunks for better caching
                    vendor: ['axios'],
                },
            },
        },
        // Enable minification (using esbuild instead of terser)
        minify: 'esbuild',
        // Optimize CSS
        cssMinify: true,
        // Set chunk size warning limit
        chunkSizeWarningLimit: 1000,
    },
    // Optimize dependencies
    optimizeDeps: {
        include: ['axios'],
    },
});
