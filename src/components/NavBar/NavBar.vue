<script setup lang="ts">
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import { Button } from "primevue";
import { useRouter } from "vue-router";

const shoppingCartStore = useShoppingCartStore();
const wishListStore = useWishListStore();

const router = useRouter();
</script>

<template>
  <div class="w-full h-full p-3 flex flex-row md:flex-col items-center gap-3">
    <RouterLink
      to="/"
      class="max-h-full p-button-text flex justify-center items-center rounded-3xl aspect-square w-12 lg:w-16 h-full lg:h-16"
      ><img src="/logoLight.svg"
    /></RouterLink>
    <RouterLink
      to="/products"
      class="p-button-text flex justify-center items-center rounded-3xl aspect-square w-12 lg:w-16 h-full lg:h-16"
      ><span class="pi pi-shop"></span
    ></RouterLink>
    <RouterLink
      to="/trending"
      class="p-button-text flex justify-center items-center rounded-3xl aspect-square w-12 lg:w-16 h-full lg:h-16"
      ><span class="pi pi-chart-line"></span
    ></RouterLink>

    <Button
      v-if="!router.currentRoute.value.fullPath.includes('/profile')"
      class="flex justify-center items-center rounded-3xl aspect-square w-12 lg:w-16 h-full lg:h-16 border-none"
      title="Click to view your wishlist"
      icon="pi pi-heart"
      variant="text"
      @click="wishListStore.showWishList = true"
    />
    <div class="relative">
      <Button
        :disabled="router.currentRoute.value.fullPath.includes('/payment')"
        class="flex justify-center items-center rounded-3xl aspect-square w-12 lg:w-16 h-full lg:h-16 border-none"
        title="Click to view your shopping cart"
        icon="pi pi-shopping-cart"
        :variant="
          shoppingCartStore.items.length > 0 &&
          !router.currentRoute.value.fullPath.includes('/payment')
            ? undefined
            : 'text'
        "
        @click="shoppingCartStore.showShoppingCart = true"
      />

      <span
        v-if="
          shoppingCartStore.items.length > 0 &&
          !router.currentRoute.value.fullPath.includes('/payment')
        "
        class="absolute right-0 top-0 w-3 h-3 block animate-pulse rounded-full bg-violet-100"
      ></span>
    </div>

    <RouterLink
      to="/profile"
      class="ml-auto md:ml-0 mt-0 md:mt-auto p-button-text flex justify-center items-center rounded-3xl aspect-square w-12 lg:w-16 h-full lg:h-16"
      ><span class="pi pi-user"></span
    ></RouterLink>
  </div>
</template>

<style lang="css" scoped></style>
