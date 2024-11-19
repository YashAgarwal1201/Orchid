<template>
  <PageLayout>
    <div
      class="w-full h-full overflow-y-auto p-2 md-p-3 flex flex-col gap-y-7 md:gap-y-10"
    >
      <TrendingProducts
        v-for="(value, index) in uniqueCategories"
        :category="value"
        :title="value"
        :key="index"
      />
      <TrendingProducts :category="''" :title="'All categories'" />
      <!-- <TrendingInGaming :category="'electronics'" />
      <TrendingInGaming :category="'gaming'" />
      <TrendingInGaming :category="'gaming'" /> -->
    </div></PageLayout
  >
</template>

<script setup lang="ts">
import TrendingProducts from "@/components/Trending/TrendingProducts.vue";
import PageLayout from "@/layout/PageLayout.vue";
import { useProductsListStore } from "@/stores/productsListStore";
// import { useShoppingCartStore } from "@/stores/shoppingCartStore";
// import { useWishListStore } from "@/stores/wishlistStore";
// import { Card, Rating } from "primevue";
import { computed, onMounted } from "vue";
// import { useRouter } from "vue-router";

const productListStore = useProductsListStore();
// const wishListStore = useWishListStore();
// const shoppingCartStore = useShoppingCartStore();

// const router = useRouter();

const uniqueCategories = computed(() => {
  const categories = productListStore.items.map(
    (product) => product.productCategory
  );
  return [...new Set(categories)]; // Return only unique categories
});

// function viewProduct(productId: string) {
//   router.push({ name: "products", params: { productId } });
// }

onMounted(() => {
  productListStore.fetchProducts();
});
</script>

<style scoped></style>
