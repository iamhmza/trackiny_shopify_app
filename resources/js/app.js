import './bootstrap';

import VueRouter from 'vue-router';
import Vue from 'vue';

import router from './router';
Vue.use(VueRouter);

const app = new Vue({
  el: '#app',
  router
});
