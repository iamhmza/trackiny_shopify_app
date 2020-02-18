<template>
  <nav>
    <a class="logo" href="/dashboard">
      <img src="../../images/logo_w.png" alt="logo" />
    </a>

    <div class="search">
      <input class="input" type="text" placeholder="Search..." />
    </div>

    <div class="admin">
      <span class="notification_wrapper" @click="show_notification = !show_notification">
        >
        <div v-show="show_notification" class="notification">
          <h4>Notifications</h4>
          <div>
            <strong>#5646</strong>
            a new paypal transaction
          </div>
          <div>notification 1</div>
          <div>notification 2</div>
        </div>
      </span>
      <img src="../../images/admin.png" alt="admin" />
      {{ store.split('.')[0] }}
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      show_notification: false,
      store: ''
    };
  },
  created() {
    axios('/me').then(res => {
      this.store = res.data.name;
    });
  }
};
</script>
