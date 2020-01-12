<template>
  <div class="install_wrapper">
    <Installer placeholder="Store name" color="shopify">
      <h2 class="title-2">Installation</h2>
      <img src="../../assets/shopify.png" alt="shopify logo" />
      <p class="sub-text">
        Authenticate to your store by typing the name of the store .
        <br />you will be redirected to shopify for the authentication proccess.
      </p>
      <input class="input" type="text" placeholder="Store name" />
    </Installer>
    <Hero />
  </div>
</template>

<script>
import Installer from '@/components/install/Installer'
import Hero from '@/components/install/Hero'

export default {
  components: {
    Installer,
    Hero
  }
}
</script>
