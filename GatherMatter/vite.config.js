import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/custom.css',
                'resources/js/custom.js',
                'resources/css/bootstrap.min.css',
                'resources/js/bootstrap.bundle.js',
                'resources/js/bootstrap.bundle.min.js',
            ],
            refresh: true,
        }),
    ],
});
