import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/* dashboard */
import Dashboard from '../pages/Dashboard.vue';
import Stats from '../pages/dashboard/Stats.vue';
import Account from '../pages/dashboard/Account.vue';
import Billing from '../pages/dashboard/Billing.vue';
import Setting from '../pages/dashboard/Setting.vue';
import Tuts from '../pages/dashboard/Tuts.vue';
import Support from '../pages/dashboard/Support.vue';

/*not found */
import NotFound from '../pages/NotFound.vue';

const routes = [
  {
    path: '/dashboard',
    component: Dashboard,
    children: [
      {
        path: 'stats',
        component: Stats,
      },
      {
        path: 'billing',
        component: Billing,
      },
      {
        path: 'support',
        component: Support,
      },
      {
        path: 'account',
        component: Account,
      },
      {
        path: 'setting',
        component: Setting,
      },
      {
        path: 'tutorials',
        component: Tuts,
      },
    ],
  },
  {
    path: '**',
    name: 'not found',
    component: NotFound,
  },
];

const router = new VueRouter({
  mode: 'history',
  // base: process.env.BASE_URL,
  routes,
});

export default router;
