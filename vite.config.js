import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
export default defineConfig({
    base: '/build/', // This helps Laravel find Vite assets in production
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/css/welcome-page.css',
                'resources/js/app.js',
                'resources/js/carousel.jsx',
            ],
            refresh: true,
        }),
        react(),
    ],
});


