import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';

import { isNull, pick } from 'lodash';

Vue.use(Vuex);

const store = {
  state: {
    isLoading: true,
    isError: false,
    user: {
      city: '',
      country: '',
      phone: '',
      email: '',
      zip: ''
    },
    store: {
      domain: '',
      name: ''
    },
    charge: {
      name: '',
      confirmation_url: '',
      status: '',
      trial_ends_at: null,
      ends_at: null
    },
    account: {
      api_key: '',
      api_secret: ''
    }
  },

  getters: {
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
    }
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
    }
  },

  actions: {
    getData() {
      this.state.isLoading = true;
      Axios('/me').then(res => {
        this.commit(
          'SET_USER',
          pick(res.data, ['city', 'email', 'phone', 'zip', 'country'])
        );
        this.commit('SET_STORE', res.data.store);
        this.commit(
          'SET_ACCOUNT',
          pick(res.data.store.account, ['api_key', 'api_secret'])
        );
        this.commit(
          'SET_STORE_CHARGE',
          pick(res.data.store_charge, [
            'name',
            'confirmation_url',
            'status',
            'trial_ends_at',
            'ends_at'
          ])
        );

        console.log('fetching done!');
        this.state.isLoading = false;
      });
    }
  }
};

export default new Vuex.Store(store);
