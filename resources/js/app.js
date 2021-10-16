
require('./bootstrap');
import router from './router/routes'
import Vue from 'vue'

import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
Vue.use(VueLoading, {
    color: "#007bff",
    loader: 'bars'
});
Vue.component('loading', VueLoading)

import VueMeta from 'vue-meta'
Vue.use(VueMeta, {
    // optional pluginOptions
    refreshOnceOnNavigation: true
})

import VueMask from 'v-mask'
Vue.use(VueMask);

Vue.component('pagination', require('laravel-vue-pagination'));

window.Vue = require('vue').default;

// componet chamado no arquivo index.blade.php
Vue.component('app-layout', require('./components/layout/AppLayout.vue').default);

const app = new Vue({
    el: '#app',
    router
});
