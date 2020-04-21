<template>
  <div class="dashboard">
    <Loading v-if="$store.state.isLoading"></Loading>
    <Toolbar></Toolbar>
    <div class="main_wrapper">
      <SideBar></SideBar>
      <main>
        <div class="container">
          <alertBox v-if="error">
            <p>
              you have to confirm shopify billing so you'll be able to use the
              application click the link
              <a
                href="/dashborad/billing"
              >here</a>
            </p>
          </alertBox>
          <transition name="route-anim" enter-active-class="animated fadeInDown">
            <router-view />
          </transition>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import Toolbar from '../components/Toolbar';
import SideBar from '../components/SideBar';
import AlertBox from '../components/AlertBox';
import Loading from '../components/Loading';
/* state */
import { mapGetters } from 'vuex';
export default {
  components: {
    Toolbar,
    SideBar,
    AlertBox,
    Loading
  },
  computed: {
    ...mapGetters(['error'])
  },

  mounted() {
    this.$router.push('/dashboard/stats');
  }
};
</script>

<style></style>
