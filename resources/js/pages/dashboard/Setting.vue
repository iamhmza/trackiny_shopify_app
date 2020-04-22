<template>
  <div class="setting page">
    <h2 class="title-2">Setting</h2>

    <form class="form">
      <div class="flex">
        <div class="item">
          <div class="input-container" :data-state="state">
            <label for="name">Name</label>
            <input id="name" type="text" placeholder="Name" :value="name" />
            <!-- <span v-if="errors['subject']" class="feedback-text">{{ errors['subject'][0] }}</span> -->
          </div>
          <!-- <label for="Name">Name</label>
          <input
            :value="name"
            class="input"
            type="text"
            placeholder="First name..."
          />-->
        </div>

        <div class="item">
          <div class="input-container" :data-state="state">
            <label for="domain">Domain</label>
            <input :value="domain" class="input" type="text" placeholder="Last name..." />
          </div>
        </div>
      </div>

      <div class="input-container">
        <label for="email">Email</label>
        <input :value="email" class="input" type="email" placeholder="youremail@example.com" />
      </div>

      <h3 class="title-3">Additional Informations</h3>

      <div class="flex">
        <div class="item">
          <div class="input-container" :data-state="state">
            <label for="city">City</label>
            <input :value="city" class="input" type="text" placeholder="city..." />
          </div>
        </div>

        <div class="item">
          <div class="input-container" :data-state="state">
            <label for="zip">Zip code</label>
            <input :value="zip" class="input" type="text" placeholder="zip code..." />
          </div>
        </div>

        <div class="item">
          <div class="input-container" :data-state="state">
            <label for="country">Country</label>
            <input :value="country" class="input" type="text" placeholder="country..." />
          </div>
        </div>
      </div>
      <div class="flex">
        <div class="item">
          <div class="input-container" :data-state="state">
            <label for="phone">Phone</label>
            <input :value="phone" class="input" type="text" placeholder="Phone number..." />
          </div>
        </div>

        <div class="item">
          <div class="input-container" :data-state="state">
            <label for="business">Company/Business</label>
            <input class="input" type="text" placeholder="Business name..." />
          </div>
        </div>
      </div>

      <button class="cta primary">Save</button>
    </form>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  name: 'setting',
  data() {
    return {
      state: ''
    };
  },
  computed: {
    ...mapGetters({
      domain: 'getDomain',
      name: 'getStoreName',
      phone: 'getPhone',
      city: 'getCity',
      zip: 'getZip',
      country: 'getCountry',
      email: 'getEmail'
    })
  }
};
</script>
