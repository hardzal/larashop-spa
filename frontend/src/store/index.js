import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import cart from '@/stores/cart';
import alert from '@/stores/alert';

export default new Vuex.Store({
  state: {},
  mutations: {},
  getters: {},
  modules: {
    cart,
    alert,
  },
});
