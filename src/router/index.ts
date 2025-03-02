import { createRouter, createWebHistory } from "vue-router";

import LandingPage from "@/pages/LandingPage.vue";
import ProductsPage from "@/pages/ProductsPage.vue";
import PaymentsPage from "@/pages/PaymentsPage.vue";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import ProfilePage from "@/pages/ProfilePage.vue";
import TrendingPage from "@/pages/TrendingPage.vue";
import toastHandler from "@/composables/toastHandeler";

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
  const { showToast } = toastHandler();

  // Check if cookie exists more reliably
  const hasAccountCookie = document.cookie
    .split(";")
    .map((cookie) => cookie.trim())
    .some((cookie) => cookie.startsWith("OrchidStoreLoginAccount="));

  // If going to landing page and already logged in
  if (to.path === "/" && hasAccountCookie) {
    showToast(
      "info",
      "User is logged in",
      "You are already logged in, navigating you to products page"
    );
    return next("/products");
  }

  // If going to protected pages and NOT logged in
  if (
    (to.path === "/products" ||
      to.path.startsWith("/products/") ||
      to.path === "/profile" ||
      to.path === "/trending") &&
    !hasAccountCookie
  ) {
    showToast(
      "warn",
      "Authentication required",
      "Please log in to access this page"
    );
    return next("/");
  }

  // Otherwise proceed normally
  next();
});

export default router;
