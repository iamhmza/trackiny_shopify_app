<template>
  <div class="stats page">
    <h2 class="title-2">Board</h2>

    <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">Orders synced</h3>
      </div>
      <div class="chart-wrapper">
        {{ count }}
      </div>
    </div>

    <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">title for the chart</h3>
      </div>
      <div class="chart-wrapper">
        <line-chart :data="dataChart"></line-chart>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'stats',
  data() {
    return {
      dataChart: {
        a: 2
      },
      orders: []
    };
  },
  computed: {
    count() {
      return _.size(this.orders);
    }
  },
  mounted() {
    console.log('fetch');
    axios('/me/orders').then(res => {
      console.log(res.data);
      this.orders = res.data;
    });
  }
};
</script>
