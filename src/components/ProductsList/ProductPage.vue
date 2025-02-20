<template>
  <div>
    <Drawer
      v-model:visible="productListStore.showProductPage"
      @hide="closeSidebar"
      dismissable
      :header="product?.productTitle"
      position="right"
    >
      <template #header>
        <div class="flex justify-between items-center w-full">
          <h3 class="text-lg sm:text-xl md:text-2xl">
            {{ product?.productTitle }}
          </h3>

          <Button
            v-if="product && shoppingCartStore.isItemInCart(product?.productId)"
            icon="pi pi-shopping-cart"
            class="ml-auto p-button-text"
            rounded
            @click="
              () => {
                shoppingCartStore.showShoppingCart = true;
                wishListStore.showWishList = false;
              }
            "
          />
          <Button
            icon="pi pi-share-alt"
            class="p-button-text"
            rounded
            @click="shareProduct"
          />
        </div>
      </template>
      <div v-if="product" class="flex flex-col gap-y-5">
        <Image
          :src="product?.productImage"
          :alt="product?.productTitle"
          preview
          class="w-full object-cover rounded-lg"
        />

        <div class="flex flex-wrap items-center gap-3">
          <strong class="w-full xs:w-auto text-xl md:text-2xl mr-0 xs:mr-auto"
            >Price:
            <span class="text-green-500"
              >${{ product?.productPrice }}</span
            ></strong
          >
          <Button
            v-if="
              product && !wishListStore.isItemInWishList(product?.productId)
            "
            icon="pi pi-heart"
            title="add to wishlist"
            rounded
            outlined
            @click="
              () => {
                if (product) {
                  wishListStore.addToWishList(product);
                  wishListStore.showWishList = true;

                  showToast(
                    'info',
                    'Item added to wishlist',
                    `${product?.productTitle} has been added to your wishlist`
                  );
                }
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
                if (product)
                  wishListStore.removeFromWishList(product?.productId);
                // wishListStore.showWishList = true
                showToast(
                  'warn',
                  'Item removed from wishlist',
                  `${product?.productTitle} has been removed from your wishlist`
                );
              }
            "
          />
          <Button
            v-if="product && !shoppingCartStore.isItemInCart(product.productId)"
            icon="pi pi-cart-plus"
            label="Add to Cart"
            rounded
            @click="
              () => {
                if (product) {
                  shoppingCartStore.addToCart(product);
                  showToast(
                    'success',
                    'Item added to cart',
                    `${product?.productTitle} has been added to your cart`
                  );
                }
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
                if (product) {
                  shoppingCartStore.removeFromCart(product.productTitle);
                  showToast(
                    'warn',
                    'Item removed from cart',
                    `${product?.productTitle} has been removed from your cart`
                  );
                }
              }
            "
          />
        </div>

        <p class="w-fit px-4 text-sm md:text-base rounded-full border">
          {{ product.productCategory }}
        </p>

        <Panel header="Description" collapsed toggleable class="!rounded-3xl">
          <p class="text-base md:text-lg">{{ product?.productDescription }}</p>
        </Panel>

        <Panel header="Ratings" collapsed toggleable class="!rounded-3xl">
          <div class="flex items-center gap-x-4">
            <Rating
              v-model="product.productRating"
              readonly
              class="cursor-default my-3"
            />
            <p>{{ product?.productRating }}/5</p>
          </div>
        </Panel>

        <Panel
          header="Estimated Delivery"
          collapsed
          toggleable
          class="!rounded-3xl"
        >
          <p>{{ product?.estimatedDelivery }}</p>
        </Panel>
      </div>
    </Drawer>
  </div>
</template>

<script lang="ts" setup>
import toastHandler from "@/composables/toastHandeler";
import { useProductsListStore } from "@/stores/productsListStore";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import type { Product } from "@/types/types";
import { Button, Drawer, Image, Panel, Rating } from "primevue";
import { ref, computed, watch } from "vue";
import { useRoute, useRouter } from "vue-router";

const router = useRouter();
const route = useRoute();

const { showToast } = toastHandler();
// const isVisible = ref(false);
const productId = computed(() => route.params.productId as string);

const product = ref<Product | null>(null);

const productListStore = useProductsListStore();
const wishListStore = useWishListStore();
const shoppingCartStore = useShoppingCartStore();

watch(productId, (newId) => {
  if (newId) {
    const result = fetchProductDetails(newId);
    if (result) {
      productListStore.showProductPage = true;
      product.value = result;
    }
  } else {
    productListStore.showProductPage = false;
  }
});

function closeSidebar() {
  router.push({ name: "products" });
}

function fetchProductDetails(id: string) {
  return productListStore.items?.find((value) => value.productId === id);
}

function shareProduct() {
  if (!product.value) return;

  if (navigator.share) {
    navigator
      .share({
        title: product.value.productTitle,
        text: product.value.productDescription,
        url: `${window.location.origin}/product/${product.value.productId}`,
      })
      .then(() => console.log("Product shared successfully!"))
      .catch((error) => console.error("Error sharing product:", error));
  } else {
    const shareUrl = `${window.location.origin}/product/${product.value.productId}`;
    navigator.clipboard
      .writeText(shareUrl)
      .then(() =>
        showToast(
          "info",
          "Copied link",
          "the link has been copied in clipboard"
        )
      )
      .catch(() =>
        showToast(
          "error",
          "Error while copying link",
          "there has been an error while copying the link for this product"
        )
      );
  }
}
</script>

<style scoped></style>
