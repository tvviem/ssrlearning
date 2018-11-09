require('./axios');
import Vue from 'vue'
import Vuetify from 'vuetify'
Vue.use(Vuetify)
import VueRouter from 'vue-router'
Vue.use(VueRouter)

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
