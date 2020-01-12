<template>
  <section class="install">
    <a class="logo" href="/dashboard">
      <img src="../../assets/logo.png" alt="logo" />
    </a>

    <slot></slot>

    <button :class=" 'cta '+ color ">Install</button>
  </section>
</template>

<script>
export default {
  props: {
    placeholder: String,
    color: String
  }
}
</script>
