<template>
  <PageLayout>
    <div
      class="w-full h-full overflow-y-auto p-2 md-p-3 flex flex-col gap-y-7 md:gap-y-10"
    >
      <!-- <div class="swiper w-full h-[300px] bg-white">
        <div class="swiper-wrapper w-full h-full">
          <div class="swiper-slide w-full h-full">Slide 1</div>
          <div class="swiper-slide">Slide 2</div>
          <div class="swiper-slide">Slide 3</div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div> -->

      <TrendingProducts
        v-for="(value, index) in uniqueCategories"
        :category="value"
        :title="value"
        :key="index"
      />
      <TrendingProducts :category="''" :title="'All categories'" />

      <ScrollTop target="parent" :threshold="200" class="aspect-square" />
    </div>
  </PageLayout>
</template>

<script setup lang="ts">
import TrendingProducts from "@/components/Trending/TrendingProducts.vue";
import PageLayout from "@/layout/PageLayout.vue";
import { useProductsListStore } from "@/stores/productsListStore";
import { ScrollTop } from "primevue";
// import { useShoppingCartStore } from "@/stores/shoppingCartStore";
// import { useWishListStore } from "@/stores/wishlistStore";
// import { Card, Rating } from "primevue";
import { computed, onMounted } from "vue";
// import { useRouter } from "vue-router";

const productListStore = useProductsListStore();
// const wishListStore = useWishListStore();
// const shoppingCartStore = useShoppingCartStore();

// const router = useRouter();

// import Swiper from "swiper";

// Import styles
// import "swiper/css/bundle";
// import { Autoplay, Navigation, Pagination } from "swiper/modules";

// Initialize Swiper
// const swiper = new Swiper(".swiper", {
//   modules: [Navigation, Pagination, Autoplay], // Add desired modules
//   loop: true, // Enable loop
//   autoplay: {
//     delay: 3000, // Autoplay delay
//   },
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true,
//   },
//   slidesPerView: 1, // Default number of slides visible
//   spaceBetween: 10, // Space between slides
// });

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
  // new Swiper(".swiper", {
  //   modules: [Navigation, Pagination, Autoplay], // Add desired modules
  //   loop: true,
  //   autoplay: {
  //     delay: 1000, // Autoplay delay
  //   },
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev",
  //   },
  //   pagination: {
  //     el: ".swiper-pagination",
  //     clickable: true,
  //   },
  //   slidesPerView: 1, // Default number of slides visible
  //   spaceBetween: 2, // Space between slides
  // });

  productListStore.fetchProducts();
});
</script>

<style scoped></style>
