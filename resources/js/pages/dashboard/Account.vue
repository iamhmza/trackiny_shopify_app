<template>
  <div class="account page">
    <h2 class="title-2">Account</h2>

    <h3 class="title-3">Paypal Secure Connection</h3>

    <p class="text">
      We work with secure Paypal credentials. Paypal monitors and encrypts this
      connection. This way your privacy and funds are 100% safe.
      <br />
      <br />Please log in to Paypal and provide your client and secret here!
    </p>

    <form class="form">
      <div class="input-container">
        <label for="token">Token</label>
        <input v-model="apiKey" type="text" class="input" :placeholder="apiKey" />
      </div>

      <div class="input-container">
        <label for="secret">Secret</label>
        <input v-model="apiSecret" type="password" class="input" :placeholder="apiSecret" />
      </div>
      <button class="cta primary">Update</button>
    </form>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  name: 'Acoount',

  computed: {
    ...mapGetters({
      apiKey: 'getKey',
      apiSecret: 'getSecret'
    })
  }
};
</script>
