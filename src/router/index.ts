import { createRouter, createWebHistory } from "vue-router";

import LandingPage from "@/pages/LandingPage.vue";
import ProductsPage from "@/pages/ProductsPage.vue";
import PaymentsPage from "@/pages/PaymentsPage.vue";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import ProfilePage from "@/pages/ProfilePage.vue";
import TrendingPage from "@/pages/TrendingPage.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "landing",
      component: LandingPage,
      meta: { title: "Welcome to Orchid Store" },
    },
    {
      path: "/trending",
      name: "trending",
      component: TrendingPage,
      meta: { title: "Orchid Store -  Trending Products" },
    },
    {
      path: "/products",
      name: "products",
      component: ProductsPage,
      meta: { title: "Orchid Store -  Products page" },
    },
    {
      path: "/products/:productId?",
      name: "products",
      component: ProductsPage,
      meta: { title: "Orchid Store - Product page" },
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
      path: "/profile",
      name: "profile",
      component: ProfilePage,
      meta: { title: "Orchid Store -  Your Profile" },
    },
    {
      path: "/:pathMatch(.*)*",
      redirect: "/",
    },
  ],
});

router.beforeEach((to, from, next) => {
  if (to.path === "/") {
    const hasAccountCookie = document.cookie
      .split("; ")
      .some((row) => row.startsWith("OrchidStoreLoginAccount="));
    if (hasAccountCookie) {
      return next("/products");
    }
  }
  next();
});

export default router;
