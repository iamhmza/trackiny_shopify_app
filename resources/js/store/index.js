import Vue from 'vue';
import Vuex from 'vuex';

import { isNull, pick } from 'lodash';

Vue.use(Vuex);

const store = {
  state: {
    isLoading: true,
    isError: false,
    active: false,
    message: null,
    orders_count: 0,
    user: {
      city: '',
      country: '',
      phone: '',
      email: '',
      zip: '',
    },
    store: {
      domain: '',
      name: '',
    },
    charge: {
      name: '',
      confirmation_url: '',
      status: '',
      trial_ends_at: null,
      ends_at: null,
    },
    account: {
      api_key: '',
      api_secret: '',
    },
  },

  getters: {
    isActive(state) {
      if (!state.charge.confirmation_url) {
        return true;
      }
      return false;
    },
    error(state) {
      return isNull(state.charge.trial_ends_at) || isNull(state.charge.ends_at);
    },
    getKey(state) {
      return state.account.api_key;
    },
    getSecret(state) {
      return state.account.api_secret;
    },
    getCity(state) {
      return state.user.city;
    },
    getEmail(state) {
      return state.user.email;
    },
    getPhone(state) {
      return state.user.phone;
    },
    getCountry(state) {
      return state.user.country;
    },
    getZip(state) {
      return state.user.zip;
    },
    getStoreName(state) {
      return state.store.name;
    },
    getDomain(state) {
      return state.store.domain;
    },
    getPlan(state) {
      return state.charge.name;
    },
    getUrl(state) {
      return state.charge.confirmation_url;
    },
    getStatus(state) {
      return state.charge.status;
    },
    getTrailEnds(state) {
      return isNull(state.charge.trial_ends_at)
        ? '-'
        : state.charge.trial_ends_at;
    },
    getOrdersCount(state) {
      return state.orders_count;
    },
  },

  mutations: {
    SET_USER(state, user) {
      state.user = user;
    },
    SET_STORE(state, store) {
      state.store = pick(store, ['domain', 'name']);
    },
    SET_STORE_CHARGE(state, charge) {
      state.charge = charge;
    },
    SET_ACCOUNT(state, account) {
      state.account = account;
    },
    SET_FULLFILED_ORDERS_COUNT(state, count) {
      state.orders_count = count;
    },
  },

  actions: {
    getData() {
      this.state.isLoading = true;

      const user = axios('/me');

      const store = axios('/me/store');

      const account = axios('/me/account');

      const fullfiledOrdersCount = axios('/me/count');

      Promise.all([user, store, account, fullfiledOrdersCount])
        .then((values) => {
          console.log(values[0].data);

          this.commit(
            'SET_USER',
            pick(values[0].data[0], [
              'city',
              'email',
              'phone',
              'zip',
              'country',
            ])
          );

          this.commit(
            'SET_STORE_CHARGE',
            pick(values[0].data[0].store_charge, [
              'name',
              'confirmation_url',
              'status',
              'trial_ends_at',
              'ends_at',
            ])
          );

          this.commit('SET_STORE', values[1].data);

          this.commit(
            'SET_ACCOUNT',
            pick(values[2].data, ['api_key', 'api_secret'])
          );

          this.commit('SET_FULLFILED_ORDERS_COUNT', values[3].data.count);
        })
        .catch((err) => {
          // this.state.isError = true;

          this.state.message = {
            type: 'error',
            text:
              'it looks like something went wrong! try to reload or sent message to support',
          };
        })
        .finally(() => {
          this.state.isLoading = false;
        });
    },
  },
};

export default new Vuex.Store(store);
