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
      <template #title
        ><span
          @click="viewProduct(value.productId)"
          class="cursor-pointer truncate-description"
          v-tooltip="value.productTitle"
          >{{ value.productTitle }}</span
        ></template
      >
      <template #subtitle>{{ value.productCategory }}</template>
      <template #content>
        <p
          class="m-0 truncate-description"
          v-tooltip="value.productDescription"
        >
          {{ value.productDescription }}
        </p>

        <h3 class="font-semibold">
          Price: <span class="text-lg">${{ value.productPrice }}</span>
        </h3>
        <p class="mt-3 font-semibold">
          Delivery: {{ value.estimatedDelivery }}
        </p>

        <div class="flex items-center gap-x-3">
          <Rating
            v-model="value.productRating"
            readonly
            class="cursor-default my-3"
          />
          <span>{{ value.productRating }}/5</span>
        </div>
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
                showToast(
                  'info',
                  'Added to wishlist',
                  'Item is added to your wishlist'
                );
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
                showToast('warn', 'Warning', 'Item removed from wishlist');
              }
            "
          />
          <Button
            v-if="!shoppingCartStore.isItemInCart(value.productId)"
            icon="pi pi-cart-plus"
            label="Add to Cart"
            rounded
            @click="
              () => {
                shoppingCartStore.addToCart(value);
                showToast(
                  'success',
                  'Added to cart',
                  'Item is added to your cart'
                );
              }
            "
          />
          <Button
            v-else
            icon="pi pi-cart-minus"
            label="Remove from Cart"
            rounded
            outlined
            @click="
              () => {
                shoppingCartStore.removeFromCart(value.productTitle);
                showToast(
                  'warn',
                  'Removed from cart',
                  'Item is removed from your cart'
                );
              }
            "
          />
        </div> </template
    ></Card>

    <ScrollTop
      target="parent"
      :threshold="100"
      icon="pi pi-arrow-up"
      class="w-5 h-5 left-0 m-auto"
    />

    <ProductPage />
  </div>
</template>

<script setup lang="ts">
// import { DUMMY_ITEMS } from '@/constants/dummyItems'
import { useProductsListStore } from "@/stores/productsListStore";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import { Button, Card, Rating, ScrollTop } from "primevue";
import { onMounted } from "vue";
import { useRouter } from "vue-router";
import ProductPage from "./ProductPage.vue";
import toastHandler from "@/composables/toastHandeler";

const router = useRouter();
const { showToast } = toastHandler();

const store = useProductsListStore();
const wishListStore = useWishListStore();
const shoppingCartStore = useShoppingCartStore();

onMounted(() => {
  store.fetchProducts();
});

function viewProduct(productId: string) {
  router.push({ name: "products", params: { productId } });
}
</script>

<style lang="css">
.truncate-description {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 100%;
}

@media screen and (max-width: 640px) {
  .product-card .p-button-label {
    display: none;
  }
}
</style>
