import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/assets/webfonts/inter/inter.css',
                'resources/assets/css/app.min.css',
                'resources/assets/css/custom.css',
                'resources/assets/vendors/jquery/jquery.js',
                'resources/assets/vendors/bootstrap/bootstrap.bundle.min.js',
                'resources/assets/vendors/magnific-popup/jquery.magnific-popup.min.js',
                'resources/assets/vendors/svg-inject/svg-inject.min.js',
                'resources/assets/vendors/modal-stepes/modal-steps.min.js',
                'resources/assets/js/custom.js',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
