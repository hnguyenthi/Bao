import '@assets/scss/app.scss';
import './bootstrap';
import '@vuepic/vue-datepicker/dist/main.css'; 
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/index';
import DefaultLayout from './Layouts/DefaultLayout.vue';
import { Ziggy } from './ziggy';
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        );
        page.then((module) => {
                module.default.layout = module.default.layout || DefaultLayout;
            });
        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({ methods: { route } })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
