import { createInertiaApp } from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';
import { renderToString } from '@vue/server-renderer';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createSSRApp, h } from 'vue';
// import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/index';
import DefaultLayout from './Layouts/DefaultLayout.vue';

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        resolve: (name) => {
            const page = resolvePageComponent(
                `./Pages/${name}.vue`,
                import.meta.glob('./Pages/**/*.vue'),
                import.meta.glob('../assets/images/**/*.*'),
            );
            page.then((module) => {
                module.default.layout = module.default.layout || DefaultLayout;
            });
            return page;
        },
        setup({ App, props, plugin }) {
            return createSSRApp({
                render: () => h(App, props),
            })
                .use(plugin)
        },
    }),
);
