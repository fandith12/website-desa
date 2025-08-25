import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Kita hanya akan memuat file-file ini
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Pastikan server host diatur untuk menghindari masalah [::1]
    server: {
        host: 'localhost',
    },
});
