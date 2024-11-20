<template>
  <div>
    <Drawer
      v-model:visible="wishListStore.showWishList"
      v-on:hide="wishListStore.showWishList = false"
      :dismissable="true"
      position="right"
      header="Your wishlist"
      class="w-full md:w-[768px] rounded-none md:!rounded-l-3xl"
    >
      <template #header>
        <div class="flex justify-between items-center w-full">
          <h3 class="text-lg sm:text-xl md:text-2xl">Your Wish List</h3>

          <Button
            v-if="!router.currentRoute.value.fullPath.includes('/payment')"
            icon="pi pi-shopping-cart"
            class="p-button-text"
            rounded
            @click="
              () => {
                shoppingCartStore.showShoppingCart = true;
                wishListStore.showWishList = false;
              }
            "
          />
        </div>
      </template>
      <div
        v-if="wishListStore.items.length > 0"
        class="w-full h-full grid grid-cols-1 xs:grid-cols-2 gap-x-3"
      >
        <Card
          v-for="(item, index) in wishListStore.items"
          :key="index"
          class="rounded-2xl aspect-auto"
          ><template #header>
            <img
              alt="user header"
              :src="item.productImage"
              class="w-full max-h-[150px] object-cover rounded-t-2xl"
            />
          </template>
          <template #title
            ><span v-tooltip="item.productDescription">{{
              item.productTitle
            }}</span></template
          >
          <template #subtitle>{{ item.productCategory }}</template>
          <template #content>
            <h3 class="font-semibold">
              Price: <span class="text-lg">${{ item.productPrice }}</span>
            </h3>
            <p class="mt-3 font-semibold">
              Delivery: {{ item.estimatedDelivery }}
            </p>
          </template>
          <template #footer>
            <div class="flex gap-4 mt-1 product-card">
              <Button
                title="remove from wishlist"
                icon="pi pi-heart-fill"
                rounded
                @click="
                  () => {
                    wishListStore.removeFromWishList(item.productId);
                    // wishListStore.showWishList = true
                    showToast(
                      'warn',
                      'Removed fom whishlist',
                      'Item removed from your wishlist'
                    );
                  }
                "
              />
              <Button
                :disabled="
                  router.currentRoute.value.fullPath.includes('/payment')
                "
                icon="pi pi-cart-plus"
                label="Move to Cart"
                rounded
                @click="
                  () => {
                    shoppingCartStore.addToCart(item);
                    wishListStore.removeFromWishList(item.productId);
                    showToast(
                      'info',
                      'Added to cart',
                      'Item is moved to your cart'
                    );
                  }
                "
              />
            </div> </template
        ></Card>
      </div>

      <div v-else class="w-full h-full flex justify-center items-center">
        <p>No items in your wishlist</p>
      </div>
    </Drawer>
  </div>
</template>

<script setup lang="ts">
import toastHandler from "@/composables/toastHandeler";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import { Button, Card, Drawer } from "primevue";
import { useRouter } from "vue-router";

const shoppingCartStore = useShoppingCartStore();
const wishListStore = useWishListStore();

const router = useRouter();

const { showToast } = toastHandler();
</script>

<style scoped></style>
