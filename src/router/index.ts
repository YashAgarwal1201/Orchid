import { createRouter, createWebHistory } from "vue-router";
// import HomeView from '../views/HomeView.vue'

import LandingPage from "@/pages/LandingPage.vue";
import ProductsPage from "@/pages/ProductsPage.vue";
import PaymentsPage from "@/pages/PaymentsPage.vue";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";

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
      beforeEnter: (to, from, next) => {
        const shoppingCartStore = useShoppingCartStore();
        if (shoppingCartStore.items.length === 0) {
          next("/products");
        } else {
          next();
        }
      },
    },
    {
      path: "/:pathMatch(.*)*",
      redirect: "/",
    },
  ],
});

export default router;
