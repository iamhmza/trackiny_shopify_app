<template>
  <div class="account page">
    <h2 class="title-2">Account</h2>

    <h3 class="title-3">Paypal Secure Connection</h3>

    <p class="text">
      We work with secure Paypal credentials. Paypal monitors and encrypts this connection. This way
      your privacy and funds are 100% safe.
      <br />
      <br />Please log in to Paypal and provide your client and secret here!
    </p>

    <form class="form">
      <label for="token">Token</label>
      <input type="text" class="input" placeholder="dzjjzdenfiuezfnuiez5ez26f5484sd8f4" />

      <label for="secret">Secret</label>
      <input type="text" class="input" placeholder="****************************" />

      <button class="cta primary">Update</button>
    </form>
  </div>
</template>

<script>
export default {}
</script>

