import { createRouter, createWebHistory } from "vue-router";

// Views Components
import LeadsManage from '@/pages/LeadsManage.vue'
import PageNotFound from '@/pages/PageNotFound.vue'


const routes = [
  {
    path: '/',
    name: 'Leads',
    component: LeadsManage,
  },
  {
    path: '/leads',
    name: 'Leads',
    component: LeadsManage,
  }, {
    path: '/:pathMatch(.*)*',
    name: '404',
    component: PageNotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;