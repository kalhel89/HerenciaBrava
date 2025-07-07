import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // ← los dos archivos de entrada
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
    // ✅ hace que las URLs en producción sean /build/...
    base: '/build/',
});
