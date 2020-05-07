<template>
  <div class="dashboard">
    <Loading v-if="$store.state.isLoading"></Loading>
    <Toolbar></Toolbar>
    <div class="main_wrapper">
      <SideBar></SideBar>
      <main>
        <div class="container">
          <alertBox v-if="!!$store.state.message" type="danger">
            <h4>{{$store.state.message.type}}</h4>
            <p>{{$store.state.message.text}}</p>
          </alertBox>
          <alertBox v-if="!isActive" type="warning">
            <h4>Uh oh, still one more thing</h4>
            <p>
              you have to confirm shopify billing so you'll be able to use the
              application click the
              <a
                :href="getUrl"
              >link</a>
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
    ...mapGetters(['error', 'isActive', 'getUrl'])
  },
  methods: {},

  mounted() {
    this.$router.push('/dashboard/stats');
  }
};
</script>

