require('./bootstrap');

require('alpinejs');

//Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import ScrollLoader from 'vue-scroll-loader' 


import highlight from './highlight'
import slick from './slick'
import tooltipster from './tooltipster'
import datepicker from './datepicker'
import select2 from './select2'
import dropzone from './dropzone'
import summernote from './summernote'
import validation from './validation'
import imageZoom from './image-zoom'
import svgLoader from './svg-loader'
import toast from './toast'

// Components
import maps from './maps'
import chat from './chat'
import dropdown from './dropdown'
import modal from './modal'
import showModal from './show-modal'
import tab from './tab'
import accordion from './accordion'
import search from './search'
import copyCode from './copy-code'
import showCode from './show-code'
import sideMenu from './side-menu'
import mobileMenu from './mobile-menu'
import sideMenuTooltip from './side-menu-tooltip'

const el = document.getElementById('app');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(ScrollLoader)
    .mount(el);

    InertiaProgress.init({ color: '#2563eb' });
