<template>
  <div class="dashboard">
    <Toolbar></Toolbar>
    <div class="main_wrapper">
      <SideBar></SideBar>
      <main>
        <div class="container">
          <transition name="route-anim" enter-active-class="animated fadeInDown">
            <router-view />
          </transition>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import Toolbar from '../components/Toolbar'
import SideBar from '../components/SideBar'
export default {
  components: {
    Toolbar,
    SideBar
  },

  mounted() {
    this.$router.push('/dashboard/stats')
  }
}
</script>

<style lang="scss">
.page {
  // position: fixed;
  position: relative;
}

/*!
 * animate.css -https://daneden.github.io/animate.css/
 * Version - 3.7.2
 * Licensed under the MIT license - http://opensource.org/licenses/MIT
 *
 * Copyright (c) 2019 Daniel Eden
 */
.animated {
  -webkit-animation-duration: 100ms;
  animation-duration: 100ms;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  // animation-timing-function: ease-in;
}

@-webkit-keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
}
</style>
