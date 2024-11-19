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
    <RouterLink to="/" class="aspect-square max-h-full rounded-full"
      ><img src="/logoLight.svg"
    /></RouterLink>
    <RouterLink to="/products" class="p-button p-button-rounded p-button-text"
      ><span class="pi pi-shop"></span
    ></RouterLink>
    <RouterLink to="/trending" class="p-button p-button-rounded p-button-text"
      ><span class="pi pi-chart-line"></span
    ></RouterLink>

    <!-- <Button title="Click to go to home" icon="pi pi-home" rounded variant="text" to="/" />
    <Button
      title="Click to go to products page"
      icon="pi pi-shop"
      rounded
      variant="text"
      to="/products"
    /> -->

    <Button
      v-if="!router.currentRoute.value.fullPath.includes('/profile')"
      title="Click to view your wishlist"
      icon="pi pi-heart"
      rounded
      variant="text"
      @click="wishListStore.showWishList = true"
    />
    <div class="relative">
      <Button
        :disabled="router.currentRoute.value.fullPath.includes('/payment')"
        title="Click to view your shopping cart"
        icon="pi pi-shopping-cart"
        rounded
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
      class="ml-auto md:ml-0 mt-0 md:mt-auto p-button p-button-rounded p-button-text"
      ><span class="pi pi-user"></span
    ></RouterLink>
  </div>
</template>

<style lang="css" scoped></style>
