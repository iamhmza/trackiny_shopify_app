<template>
  <div class="stats page">
    <h2 class="title-2">Board</h2>

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
        a: 2,
        b: 3,
        c: 5,
        d: 9,
        e: 2,
        c: 11
      },
      orders: []
    };
  },
  mounted() {
    console.log('fetch');
    axios('/me/orders').then(res => console.log(res.data));
  }
};
</script>

<style>
.chart-container {
  width: 100%;
  background-color: white;
  margin-bottom: 2rem;
  border-radius: 7px;
  box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.2);
}
.chart-container .heading {
  padding: 1rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}
.chart-container .heading .title-3 {
  margin: 0 !important;
}
.chart-wrapper {
  padding: 1rem;
}
</style>
