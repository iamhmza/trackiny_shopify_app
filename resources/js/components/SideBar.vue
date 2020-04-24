<template>
  <aside>
    <ul>
      <li>
        <router-link to="/dashboard/stats">
          <div class="icon-container">
            <!-- resources/svg/dashboard.svg -->
            <svg-vue icon="dashboard"></svg-vue>
          </div>
          <span>Dashboard</span>
        </router-link>
      </li>

      <li>
        <router-link to="/dashboard/account">
          <div class="icon-container">
            <svg-vue icon="link"></svg-vue>
          </div>
          <span>Account</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/setting">
          <div class="icon-container">
            <svg-vue icon="setting"></svg-vue>
          </div>
          <span>Setting</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/tutorials">
          <div class="icon-container">
            <svg-vue icon="tuts"></svg-vue>
          </div>
          <span>Tutorials</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/support">
          <div class="icon-container">
            <svg-vue icon="support"></svg-vue>
          </div>
          <span>Support</span>
        </router-link>
      </li>
    </ul>
  </aside>
</template>

<script>
export default {
  name: 'sidebar'
};
</script>
