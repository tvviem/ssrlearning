import Vue from 'vue';
import Vuex from 'vuex'
import credential from './credential'
import shared from './shared'

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
      credential: credential,
      shared: shared
    }
})