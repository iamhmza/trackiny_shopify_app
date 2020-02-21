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
        <img src="../../images/admin.png" alt="admin" />
        {{ store.split('.')[0] }}
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 30"
        >
          <text
            transform="translate(10 34)"
            font-size="19"
            font-family="IkonoDemoL-1, Ikono Demo L"
          >
            <tspan x="-9.633" y="0"></tspan>
          </text>
        </svg>
        <div v-show="show_notification" class="notification">
          <div>
            <a href="/me/logout">Logout</a>
          </div>
        </div>
      </span>
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
