import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/sass/app.scss',
                // 'public/assets/webfonts/inter/inter.css',
                // 'public/assets/css/app.min.css',
                // 'public/assets/css/custom.css',
                // 'public/assets/vendors/jquery/jquery.js',
                // 'public/assets/vendors/bootstrap/bootstrap.bundle.min.js',
                // 'public/assets/vendors/magnific-popup/jquery.magnific-popup.min.js',
                // 'public/assets/vendors/svg-inject/svg-inject.min.js',
                // 'public/assets/vendors/modal-stepes/modal-steps.min.js',
                // 'public/assets/js/custom.js',
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
