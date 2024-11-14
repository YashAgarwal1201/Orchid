<template>
  <div
    class="w-full h-full overflow-y-auto p-2 md-p-3 grid gap-3 sm:gap-4 md:gap-5"
    :class="{
      'grid-cols-1': store.displayType !== 'card',
      'grid-cols-2 mdl:grid-cols-3 xl:grid-cols-4 3xl:grid-cols-5':
        store.displayType === 'card',
    }"
  >
    <Card
      v-for="(value, index) in store.filteredItems"
      :key="index"
      class="rounded-2xl"
      :class="{
        'aspect-auto': store.displayType !== 'card',
        'aspect-square': store.displayType === 'card',
      }"
      ><template #header>
        <img
          alt="user header"
          :src="value.productImage"
          class="w-full max-h-[150px] object-cover rounded-t-2xl"
        />
      </template>
      <template #title>{{ value.productTitle }}</template>
      <template #subtitle>{{ value.productCategory }}</template>
      <template #content>
        <p class="m-0">
          {{ value.productDescription }}
        </p>

        <h3 class="font-semibold">
          Price: <span class="text-lg">${{ value.productPrice }}</span>
        </h3>
        <p class="mt-3 font-semibold">
          Delivery: {{ value.estimatedDelivery }}
        </p>

        <Rating
          v-model="value.productRating"
          readonly
          class="cursor-default my-3"
        />
      </template>
      <template #footer>
        <div class="flex gap-4 mt-1 product-card">
          <Button
            v-if="!wishListStore.isItemInWishList(value.productId)"
            icon="pi pi-heart"
            title="add to wishlist"
            severity="secondary"
            rounded
            outlined
            @click="
              () => {
                wishListStore.addToWishList(value);
                wishListStore.showWishList = true;
              }
            "
          />
          <Button
            v-else
            icon="pi pi-heart-fill"
            title="remove from wishlist"
            rounded
            @click="
              () => {
                wishListStore.removeFromWishList(value.productId);
                // wishListStore.showWishList = true
              }
            "
          />
          <Button
            v-if="!shoppingCartStore.isItemInCart(value.productId)"
            icon="pi pi-cart-plus"
            label="Add to Cart"
            rounded
            @click="() => shoppingCartStore.addToCart(value)"
          />
          <Button
            v-else
            icon="pi pi-cart-minus"
            label="Remove from Cart"
            rounded
            outlined
            @click="() => shoppingCartStore.removeFromCart(value.productTitle)"
          />
        </div> </template
    ></Card>

    <ScrollTop
      target="parent"
      :threshold="100"
      icon="pi pi-arrow-up"
      class="w-5 h-5 left-0 m-auto"
    />
  </div>
</template>

<script setup lang="ts">
// import { DUMMY_ITEMS } from '@/constants/dummyItems'
import { useProductsListStore } from "@/stores/productsListStore";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import { Button, Card, Rating, ScrollTop } from "primevue";

const store = useProductsListStore();
const wishListStore = useWishListStore();
const shoppingCartStore = useShoppingCartStore();
</script>

<style lang="css">
@media screen and (max-width: 640px) {
  .product-card .p-button-label {
    display: none;
  }
}
</style>
