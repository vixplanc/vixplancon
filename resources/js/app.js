import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import ElementPlus from 'element-plus';
import * as ElementPlusIconsVue from '@element-plus/icons-vue'
import 'element-plus/dist/index.css';
import '@formkit/themes/genesis'
import store from './Store/index';
import { pt } from '@formkit/i18n'
import { plugin as fkPlugin, defaultConfig as fkDefaultConfig } from '@formkit/vue'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(store)
            .use(Link)
            .use(plugin)
            .use(ElementPlus)
            .use(ElementPlusIconsVue)
            .use(fkPlugin, fkDefaultConfig({locales: {pt}, locale: 'pt'}))
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
