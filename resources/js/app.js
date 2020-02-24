import './bootstrap';
import Vue from 'vue';

import Chartkick from 'vue-chartkick';
import Chart from 'chart.js';

Vue.use(Chartkick.use(Chart));

import router from './router';
import store from './store';

const app = new Vue({
  el: '#app',
  router,
  store,
  created() {
    this.$store.dispatch('getData');
  }
});
