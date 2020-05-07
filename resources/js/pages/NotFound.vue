<template>
  <div class="not_found">
    <h1>404</h1>

    <h2 class="title-2">Page Not Found</h2>

    <p class="text">
      It looks like nothing was found at this location. click the link
      below to go back home.
    </p>

    <button @click="redirect" class="cta">BACK TO HOME</button>

    <img src="../../images/notfound.svg" alt="not_found_bg" />
  </div>
</template>

<script>
export default {
  methods: {
    redirect() {
      this.$router.push('/dashboard/stats');
    }
  }
};
</script>
