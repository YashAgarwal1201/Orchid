<script setup lang="ts">
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import { Button } from "primevue";

const shoppingCartStore = useShoppingCartStore();
const wishListStore = useWishListStore();
</script>

<template>
  <div class="w-full h-full p-3 flex flex-row md:flex-col items-center gap-3">
    <RouterLink to="/" class="p-button p-button-rounded p-button-text"
      ><span class="pi pi-home"></span
    ></RouterLink>
    <RouterLink to="/products" class="p-button p-button-rounded p-button-text"
      ><span class="pi pi-shop"></span
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
      title="Click to view your wishlist"
      icon="pi pi-heart"
      rounded
      variant="text"
      @click="wishListStore.showWishList = true"
    />
    <div class="relative">
      <Button
        title="Click to view your shopping cart"
        icon="pi pi-shopping-cart"
        rounded
        @click="shoppingCartStore.showShoppingCart = true"
      />
      <span
        v-if="shoppingCartStore.items.length > 0"
        class="absolute right-0 top-0 w-3 h-3 block animate-pulse rounded-full bg-violet-100"
      ></span>
    </div>

    <img src="/logo.svg" />
  </div>
</template>

<style lang="css" scoped></style>
