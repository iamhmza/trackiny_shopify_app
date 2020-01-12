<template>
    <aside>
        <ul>
            <li>
                <router-link to="/dashboard/stats">
                    <DashboardIcon></DashboardIcon>
                    <span>Dashboard</span>
                </router-link>
            </li>
            <li>
                <router-link to="/dashboard/account">
                    <LinkIcon />
                    <span>Account</span>
                </router-link>
            </li>
            <li>
                <router-link to="/dashboard/setting">
                    <SettingIcon />
                    <span>Setting</span>
                </router-link>
            </li>
            <li>
                <router-link to="/dashboard/tutorials">
                    <VideoTutorialIcon></VideoTutorialIcon>
                    <span>Tutorials</span>
                </router-link>
            </li>
            <li>
                <router-link to="/dashboard/support">
                    <SupportIcon></SupportIcon>
                    <span>Support</span>
                </router-link>
            </li>
        </ul>
    </aside>
</template>

<script>
import DashboardIcon from "./icons/DashboardIcon";
import LinkIcon from "./icons/LinkIcon";
import SettingIcon from "./icons/SettingIcon";
import SupportIcon from "./icons/SupportIcon";
import VideoTutorialIcon from "./icons/VideoTutorialIcon";
export default {
    components: {
        DashboardIcon,
        LinkIcon,
        SettingIcon,
        SupportIcon,
        VideoTutorialIcon
    }
};
</script>
