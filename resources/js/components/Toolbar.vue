<template>
  <nav>
    <a class="logo" href="/dashboard">
      <img src="../../images/logo_w.png" alt="logo" />
    </a>

    <!-- <div class="search">
      <input class="input" type="text" placeholder="Search..." />
    </div>-->

    <!-- <div class="admin">
      <div class="admin_box" @click="show_notification = !show_notification">
        <div class="admin_info">
          <span>{{ name }}</span>
        </div>

        <svg fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
            fill-rule="evenodd"
          />
        </svg>
      </div>
      <div :class="show_notification ? 'opened' : ''" class="admin_options">
        <ul>
          <li>
            <svg fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                clip-rule="evenodd"
                fill-rule="evenodd"
              />
            </svg>
            <a href="/me/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>-->

    <div id="admin" class="admin_box">
      <div class="admin_info" @click="open = !open">
        <svg fill="currentColor" :class="open ? 'fliped' : ''" viewBox="0 0 20 20">
          <path
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
            fill-rule="evenodd"
          />
        </svg>
        <span class="admin_name">{{ name }}</span>
        <div class="admin_avatar">
          <img src="../../images/admin.png" alt="admin" />
          <!-- <img src="https://avatars.dicebear.com/v2/male/john.svg" alt="admin" /> -->
        </div>
      </div>
      <div :class="open ? 'opened' : ''" class="admin_options">
        <ul>
          <li>
            <a href="/me/logout">
              <svg fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                  clip-rule="evenodd"
                  fill-rule="evenodd"
                />
              </svg>
              Logout
            </a>
          </li>

          <li>
            <router-link to="/dashboard/support">
              <svg-vue icon="support"></svg-vue>Support
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  data() {
    return {
      open: false
    };
  },
  computed: {
    ...mapGetters({
      name: 'getStoreName'
    })
  }
};
</script>


<style lang="scss" scoped>
/* Admin box
  –––––––––––––––––––––––––––––––––––––––––––––––––– */

.admin_box {
  display: inline-block;
  position: relative;
  .admin_info {
    display: flex;
    align-items: center;
    padding: 1rem;
    cursor: pointer;

    > *:not(:last-child) {
      margin-right: 0.6rem;
    }

    .admin_avatar {
      display: flex;
      align-items: center;
      justify-content: center;
      // border: 1px solid #595959;
      background-color: #fff;
      border-radius: 50%;
      overflow: hidden;
      padding: 0.2rem;
      img {
        width: 30px;
        height: 30px;
      }
    }

    > svg {
      width: 20px;
      height: 20px;
      transition: transform 0.2s ease;

      &.fliped {
        transform: rotate(0.5turn);
      }
    }
  }

  .admin_options {
    position: absolute;
    right: 1rem;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2);
    transform-origin: top;
    transform: scaley(0);
    transition: transform 0.2s ease;
    z-index: 50;

    &.opened {
      transform: scaley(1);
    }

    ul {
      display: block;
      padding: 1rem 0.6rem;

      li + li {
        margin-top: 0.6rem;
      }

      li {
        color: #016fff;

        a {
          display: flex;
          align-items: center;
          padding: 0.6rem 1rem;
          padding-right: 4rem;
          border-radius: 5px;
          color: inherit;

          &:hover {
            background-color: #016fff22;
          }
          svg {
            width: 20px;
            height: 20px;
            color: inherit;
            fill: currentColor;
            margin-right: 1rem;
          }
        }
      }
    }
  }
}
</style>
