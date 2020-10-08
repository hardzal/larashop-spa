import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import cart from '@/stores/cart';
import alert from '@/stores/alert';
import auth from '@/stores/auth';
import dialog from '@/stores/dialog';
import region from '@/stores/region';

export default new Vuex.Store({
  state: {},
  mutations: {},
  getters: {},
  modules: {
    cart,
    alert,
    auth,
    dialog,
    region,
  },
});
