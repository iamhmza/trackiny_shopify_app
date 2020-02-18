import './bootstrap';

import VueRouter from 'vue-router';
import Vue from 'vue';

import Chartkick from 'vue-chartkick';
import Chart from 'chart.js';

Vue.use(Chartkick.use(Chart));

import router from './router';
Vue.use(VueRouter);

const app = new Vue({
  el: '#app',
  router
});
