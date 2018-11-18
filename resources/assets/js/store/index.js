// import Vue from 'vue'
import Vuex from 'vuex'
import credential from './credential'
import shared from './shared'
import Vue from 'vue';
Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
      credential: credential,
      shared: shared
    }
})
