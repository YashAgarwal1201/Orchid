import { createRouter, createWebHistory } from "vue-router";
// import HomeView from '../views/HomeView.vue'

import LandingPage from "@/pages/LandingPage.vue";
import ProductsPage from "@/pages/ProductsPage.vue";
import PaymentsPage from "@/pages/PaymentsPage.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: LandingPage,
      meta: { title: "Welcome to Orchid Store" },
    },
    {
      path: "/products",
      name: "products",
      component: ProductsPage,
      meta: { title: "Orchid Store -  Products page" },
    },

    {
      path: "/payment",
      name: "payment",
      component: PaymentsPage,
      meta: { title: "Orchid Store -  Make Payment" },
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import("../views/AboutView.vue"),
    },
  ],
});

export default router;
