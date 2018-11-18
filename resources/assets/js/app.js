import Vue from 'vue'
import { routes } from './routes';
import { store } from './store'

import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'
import VueRouter from 'vue-router'
require('./axios');

Vue.use(Vuetify, {
    theme: {
        primary: colors.purple.darken2,
        secondary: colors.grey.darken1,
        accent: colors.shades.black,
        error: colors.red.accent3
    }
})
Vue.use(VueRouter)
//Vue.use(Vuex)
// Use Components in *.vue file
Vue.component('app-alert', require('./components/shared/Alert.vue'));
Vue.component('login-form', require('./components/credential/LoginComponent.vue'));

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    store
});
