<template>
  <div class="stats page">
    <h2 class="title-2">Board</h2>

    <!-- <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">Fullfiled orders</h3>
      </div>
      <div class="chart-wrapper">{{ getOrdersCount }}</div>
    </div>
    <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">Synced Orders</h3>
      </div>
      <div class="chart-wrapper">{{ count }}</div>
    </div>-->

    <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">Orders</h3>
      </div>
      <div class="chart-wrapper">
        <pie-chart :data="[['Synced orders', count], ['Fullfiled orders', getOrdersCount]]"></pie-chart>
      </div>
    </div>
    <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">synced Orders</h3>
      </div>
      <div class="chart-wrapper">
        <line-chart :data="{'2017-05-13': 2, '2017-05-14': 5}"></line-chart>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  name: 'stats',
  data() {
    return {
      orders: []
    };
  },
  computed: {
    ...mapGetters(['getOrdersCount']),
    count() {
      return this.orders.length;
    },
    lineChartData() {
      return this.orders.reduce(function(obj, current, i) {
        let newObj = { ...obj };
        newObj[current['created_at']] = i;
        return newObj;
      }, {});
    }
  },
  mounted() {
    axios('/me/orders').then(res => {
      this.orders = res.data;
      console.log(res.data);
    });
  }
};
</script>

<style>
.synced {
  color: green;
  padding: 5px;
  background-color: lightgreen;
}
</style>
