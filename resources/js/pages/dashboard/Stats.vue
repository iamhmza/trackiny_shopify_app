<template>
  <div class="stats page">
    <h2 class="title-2">Board</h2>

    <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">Orders synced</h3>
      </div>
      <div class="chart-wrapper">{{ count }}</div>
    </div>

    <!-- <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">Orders</h3>
      </div>
      <div class="chart-wrapper">
        <table class="charging">
          <thead>
            <tr>
              <th>Id</th>
              <th>transaction number</th>
              <th>status</th>
              <th>synced</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in orders" :key="order.id">
              <td>{{ order.id }}</td>
              <td>{{ order.tracking_number }}</td>
              <td>{{ order.status }}</td>
              <td>
                <span class="synced">success</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>-->

    <div class="chart-container">
      <div class="heading">
        <h3 class="title-3">synced Orders</h3>
      </div>
      <div class="chart-wrapper">
        <column-chart :data="[['orders synced', count]]" width="111px"></column-chart>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'stats',
  data() {
    return {
      orders: []
    };
  },
  computed: {
    count() {
      return this.orders.length;
    }
  },
  mounted() {
    axios('/me/orders').then(res => {
      this.orders = res.data;
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
