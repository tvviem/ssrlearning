require('./axios')
import Vue from 'vue'
import router from './router'
import { store } from './store'
import { initialize } from './helpers/general'

import Vuetify from 'vuetify'
Vue.component('app-alert', require('./components/shared/Alert.vue'));

Vue.use(Vuetify);
Vue.config.productionTip = false;
initialize(store, router);

const app = new Vue({
    el: '#app',
    router,
    store
});
