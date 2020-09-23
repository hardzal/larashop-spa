'use strict';

import Vue from 'vue';

const Helper = {
  install(Vue) {
    Vue.prototype.appName = process.env.VUE_APP_NAME;
    Vue.prototype.getImage = function(imageUrl) {
      if (imageUrl != null && imageUrl.length > 0) {
        return process.env.VUE_APP_BACKEND_URL + '/images' + imageUrl;
      }

      return process.env.VUE_APP_BACKEND_URL + '/images/unavailable.png';
    };
  },
};

Vue.use(Helper);
