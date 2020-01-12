<template>
  <div class="install_wrapper">
    <Installer placeholder="Paypal API secret " color="paypal">
      <h2 class="title-2">Link account</h2>
      <img src="../../assets/paypal.png" alt="paypal logo" />
      <p class="sub-text">
        We work with secure Paypal credentials. Paypal monitors and encrypts
        this connection. This way your privacy and funds are 100% safe.
        <br />Please log in to Paypal and provide your client and secret here!
        <br />Need Help ? Click
        <a
          @click="show_video = true"
          href="#"
          style="text-decoration: underline;"
        >
          <b>the link</b>
        </a>
        to see Video!
      </p>
      <input class="input" type="text" placeholder="API key" />
      <input class="input" type="text" placeholder="API secret" />
    </Installer>
    <Hero color="blueSvg" />
    <div v-show="show_video" @click="show_video = false" class="overlay">
      <div class="video">
        <iframe
          width="100%"
          height="100%"
          src="https://www.youtube.com/embed/6qfE-lwRLuY"
          frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
      </div>
    </div>
  </div>
</template>

<script>
import Installer from '@/components/install/Installer'
import Hero from '@/components/install/Hero'
export default {
  components: {
    Installer,
    Hero
  },
  data() {
    return {
      show_video: false
    }
  }
}
</script>

<style lang="scss">
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;

  background-color: #016fffaa;
  display: flex;
  align-items: center;
  justify-content: center;

  .video {
    width: 50%;
    height: 60vh;
  }
}
</style>
