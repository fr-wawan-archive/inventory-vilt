import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/vue3";
import Layout from "./Shared/Layout.vue";
import { modal } from "momentum-modal";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

createInertiaApp({
    title: (title) => `${title} - Inventory`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        // return pages[`./Pages/${name}.vue`];
        let page = pages[`./Pages/${name}.vue`];

        page.default.layout = page.default.layout || Layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component("Link", Link)
            .component("Head", Head)
            .use(modal, {
                resolve: (name) =>
                    resolvePageComponent(
                        `./Pages/${name}.vue`,
                        import.meta.glob("./Pages/**/*.vue")
                    ),
            })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});
