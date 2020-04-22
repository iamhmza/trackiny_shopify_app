<template>
  <div v-if="!off" class="alert" :class="type">
    <div class="icon">
      <span class="lnr" :class="icon"></span>
    </div>
    <div class="body">
      <slot></slot>
    </div>

    <div class="action">
      <span class="lnr lnr-cross" @click="off = true"></span>
    </div>
  </div>
</template>

<script>
export default {
  name: 'alert_box',
  props: ['type'],
  data() {
    return {
      off: false
    };
  },

  computed: {
    icon() {
      if (this.type == 'success') {
        return 'lnr-checkmark-circle';
      } else if (this.type == 'warning') {
        return 'lnr-warning';
      } else {
        return 'lnr-cross-circle';
      }
    }
  }
};
</script>
