import './bootstrap';
import '../css/app.css';
import '../scss/index.scss';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import {createPinia} from "pinia/dist/pinia";


import {Link} from "@inertiajs/inertia-vue3";
import Layout from "./AppComponents/Layout.vue";


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const Store = createPinia()

const app = createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        );
        page.then((module) => {

            if(name.startsWith('Dashboard') && module.default.components && module.default.components.layout === undefined){
                module.default.inheritAttrs = true
                module.default.layout = (h, page) => { return h(Layout, () => page) };
            }
        });
        return page;
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .component("Link",Link)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(Store)
            .mount(el);
    },
});

Notification.requestPermission().then((result) => {
    console.log(result);
});

const notification = new Notification('To do list', { body: "hi"});



InertiaProgress.init({ color: '#4B5563' });
