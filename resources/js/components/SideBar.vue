<template>
  <aside>
    <ul>
      <li>
        <router-link to="/dashboard/stats">
          <div class="icon-container">
            <DashboardIcon></DashboardIcon>
          </div>
          <span>Dashboard</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/billing">
          <div class="icon-container">
            <DashboardIcon></DashboardIcon>
          </div>
          <span>Billing</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/account">
          <div class="icon-container">
            <LinkIcon />
          </div>
          <span>Account</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/setting">
          <div class="icon-container">
            <SettingIcon />
          </div>
          <span>Setting</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/tutorials">
          <div class="icon-container">
            <VideoTutorialIcon></VideoTutorialIcon>
          </div>
          <span>Tutorials</span>
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/support">
          <div class="icon-container">
            <SupportIcon></SupportIcon>
          </div>
          <span>Support</span>
        </router-link>
      </li>
    </ul>
  </aside>
</template>

<script>
import DashboardIcon from './icons/DashboardIcon';
import LinkIcon from './icons/LinkIcon';
import SettingIcon from './icons/SettingIcon';
import SupportIcon from './icons/SupportIcon';
import VideoTutorialIcon from './icons/VideoTutorialIcon';
export default {
  name: 'sidebar',
  components: {
    DashboardIcon,
    LinkIcon,
    SettingIcon,
    SupportIcon,
    VideoTutorialIcon
  }
};
</script>
