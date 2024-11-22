<template>
  <div>
    <div class="flex justify-between items-center">
      <h3
        v-if="props.title?.toLowerCase().includes('all')"
        class="text-lg sm:text-xl md:text-2xl"
      >
        Trending Top 10 Products
      </h3>
      <h3 v-else class="text-lg sm:text-xl md:text-2xl">
        Trending in <span class="capitalize">{{ props.title }}</span>
      </h3>

      <div class="flex gap-2">
        <Button
          icon="pi pi-chevron-left"
          title="Scroll Left"
          outlined
          rounded
          size="small"
          @click="scrollLeft"
        />
        <Button
          icon="pi pi-chevron-right"
          title="Scroll Right"
          outlined
          rounded
          size="small"
          @click="scrollRight"
        />
      </div>
    </div>

    <div
      class="flex flex-row gap-x-3 p-3 overflow-x-auto"
      ref="scroll-container"
    >
      <Card
        v-for="(value, index) in temp.filter((value: Product) =>
          value.productCategory
            .toLowerCase()
            .includes(props.category?.toLowerCase())
        )"
        :key="index"
        class="!w-[250px] md:!w-[300px] rounded-2xl"
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
            class="hidden md:block m-0 truncate-description"
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
              @click="
                () => shoppingCartStore.removeFromCart(value.productTitle)
              "
            />
          </div> </template
      ></Card>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import { useRouter } from "vue-router";
import { Button, Card, Rating } from "primevue";
import { useProductsListStore } from "@/stores/productsListStore";
import { computed, useTemplateRef } from "vue";
import type { Product } from "@/types/types";

const productListStore = useProductsListStore();
const wishListStore = useWishListStore();
const shoppingCartStore = useShoppingCartStore();

const router = useRouter();

const props = defineProps<{ category: string; title: string }>();

// console.log(props.category);
const temp = computed(() => {
  if (props.title?.toLowerCase().includes("all")) {
    return [...productListStore.items.slice(0, 10)];
  } else {
    return productListStore.items;
  }
});
const scrollContainer = useTemplateRef("scroll-container");

function scrollLeft() {
  if (scrollContainer.value) {
    scrollContainer.value.scrollBy({
      left: -window.innerWidth,
      behavior: "smooth",
    });
  }
}

function scrollRight() {
  if (scrollContainer.value) {
    scrollContainer.value.scrollBy({
      left: window.innerWidth,
      behavior: "smooth",
    });
  }
}

function viewProduct(productId: string) {
  router.push({ name: "products", params: { productId } });
}
</script>

<style scoped></style>
