<template>
  <div class="billing page">
    <h2 class="title-2">Billing</h2>

    <table class="charging">
      <thead>
        <tr>
          <th>Plan name</th>
          <th>status</th>
          <th>trail ends</th>
          <th>confirm</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ name }}</td>
          <td>{{ status }}</td>
          <td>{{ trailEndsAt }}</td>
          <td>
            <button v-if="error" class="cta primary">
              <a style="color:white" :href="confirmUrl">Confirm</a>
            </button>
            <span v-else>Confirmed</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  name: 'Billing',
  computed: {
    ...mapGetters({
      name: 'getPlan',
      status: 'getStatus',
      trailEndsAt: 'getTrailEnds',
      confirmUrl: 'getUrl',
      error: 'error'
    })
  }
};
</script>
