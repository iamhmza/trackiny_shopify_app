<template>
  <div class="setting page">
    <h2 class="title-2">Setting</h2>

    <form class="form">
      <div class="flex">
        <div class="item">
          <label for="firstName">First Name</label>
          <input class="input" type="text" placeholder="First name..." />
        </div>

        <div class="item">
          <label for="lastName">Last Name</label>
          <input class="input" type="text" placeholder="Last name..." />
        </div>
      </div>

      <label for="email">Email</label>
      <input class="input" type="email" placeholder="youremail@example.com" />

      <h3 class="title-3">Additional Informations</h3>

      <div class="flex">
        <div class="item">
          <label for="city">City</label>
          <input class="input" type="text" placeholder="city..." />
        </div>

        <div class="item">
          <label for="zip">Zip code</label>
          <input class="input" type="text" placeholder="zip code..." />
        </div>

        <div class="item">
          <label for="country">Country</label>
          <input class="input" type="text" placeholder="country..." />
        </div>
      </div>
      <div class="flex">
        <div class="item">
          <label for="phone">Phone</label>
          <input class="input" type="text" placeholder="Phone number..." />
        </div>

        <div class="item">
          <label for="business">Company/Business</label>
          <input class="input" type="text" placeholder="Business name..." />
        </div>
      </div>

      <button class="cta primary">Save</button>
    </form>
  </div>
</template>

<script>
export default {}
</script>


