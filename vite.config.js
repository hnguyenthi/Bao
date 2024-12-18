import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/assets/scss/app.scss', 'resources/js/app.js'],
            ssr: ['resources/js/ssr.js', 'resources/assets/scss/app.scss'],
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
            '@assets': '/resources/assets',
            '@utils': '/resources/utils',
            ziggy: 'vendor/tightenco/ziggy/dist',
        },
    },
    build: {
        ssr: true,
    },
    optimizeDeps: {
        exclude: ['chart.js'],
    },
});
