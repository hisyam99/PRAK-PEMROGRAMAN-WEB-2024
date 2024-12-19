//import vue router
import { createRouter, createWebHistory } from "vue-router";

//define a routes
const routes = [
  {
    path: "/",
    name: "home",
    component: () => import(/* webpackChunkName: "home" */ "../views/home.vue"),
  },
  {
    path: "/services",
    name: "services.index",
    component: () =>
      import(/* webpackChunkName: "index" */ "../views/services/index.vue"),
  },
  {
    path: "/admin/services",
    name: "admin.services.index",
    component: () =>
      import(/* webpackChunkName: "index" */ "../views/admin/services/index.vue"),
  },
  {
    path: "/admin/services/create",
    name: "admin.services.create",
    component: () =>
      import(/* webpackChunkName: "create" */ "../views/admin/services/create.vue"),
  },
  {
    path: "/admin/services/edit/:id",
    name: "admin.services.edit",
    component: () =>
      import(/* webpackChunkName: "edit" */ "../views/admin/services/edit.vue"),
  },
];
//create router
const router = createRouter({
  history: createWebHistory(),
  routes, // <-- routes,
});
export default router;
