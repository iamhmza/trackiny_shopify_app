<template>
  <div class="stats page">
    <h1>Board</h1>

    <line-chart :data="dataChart"></line-chart>
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

<style></style>
