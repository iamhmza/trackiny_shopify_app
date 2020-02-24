<template>
  <div class="alert danger">
    <div class="icon">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="30"
        height="50"
        viewBox="0 0 30 50"
      >
        <text
          transform="translate(15 48)"
          fill="#fff"
          stroke="#fff"
          stroke-width="1"
          font-size="26"
          font-family="IkonoDemoL-4, Ikono Demo L"
        >
          <tspan x="-13.715" y="0"></tspan>
        </text>
      </svg>
    </div>
    <p>
      you have to confirm shopify billing so you'll be able to use the
      application click the link
      <a href="/dashborad/billing">here</a>
    </p>
  </div>
</template>

<script>
export default {
  name: 'alert_box'
};
</script>
