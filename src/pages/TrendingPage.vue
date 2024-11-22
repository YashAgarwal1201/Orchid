<template>
  <PageLayout>
    <div
      class="w-full h-full overflow-y-auto p-2 md-p-3 flex flex-col gap-y-7 md:gap-y-10"
    >
      <div class="w-full h-[30vh] md:h-[40vh]">
        <div class="swiper w-full h-full" ref="swiper-container">
          <div class="swiper-wrapper w-full h-full rounded-3xl">
            <Card class="swiper-slide"
              ><template #content>
                <div class="w-full h-full grid grid-cols-2 rounded-3xl">
                  <div class="h-full flex flex-col justify-center">
                    <h2>lorem ipsum</h2>
                  </div>
                  <div class="bg-slate-900 h-full"></div>
                </div> </template></Card
            ><Card class="swiper-slide"
              ><template #content>
                <div class="w-full h-full grid grid-cols-2 rounded-3xl">
                  <div class="h-full flex flex-col justify-center">
                    <h2>lorem ipsum</h2>
                  </div>
                  <div class="bg-slate-900 h-full"></div>
                </div> </template></Card
            ><Card class="swiper-slide"
              ><template #content>
                <div class="w-full h-full grid grid-cols-2 rounded-3xl">
                  <div class="h-full flex flex-col justify-center">
                    <h2>lorem ipsum</h2>
                  </div>
                  <div class="bg-slate-900 h-full"></div>
                </div> </template></Card
            ><Card class="swiper-slide"
              ><template #content>
                <div class="w-full h-full grid grid-cols-2 rounded-3xl">
                  <div class="h-full flex flex-col justify-center">
                    <h2>lorem ipsum</h2>
                  </div>
                  <div class="bg-slate-900 h-full"></div>
                </div> </template></Card
            ><Card class="swiper-slide"
              ><template #content>
                <div class="w-full h-full grid grid-cols-2 rounded-3xl">
                  <div class="h-full flex flex-col justify-center">
                    <h2>lorem ipsum</h2>
                  </div>
                  <div class="bg-slate-900 h-full"></div>
                </div> </template
            ></Card>
          </div>
          <div class="swiper-pagination"></div>
          <div
            class="absolute bottom-5 right-10 bg-white border-2 flex items-center gap-x-2"
          >
            <!-- <div class="swiper-button-prev static"></div>
            <div class="swiper-button-next static"></div> -->

            <Button
              icon="pi pi-arrow-left"
              class="swiper-button-prev !static"
              rounded
              variant="text"
            />
            <Button
              icon="pi pi-arrow-right"
              class="swiper-button-next !static"
              rounded
              variant="text"
            />
          </div>
        </div>
      </div>

      <div class="h-[calc(100%-40vh)] flex flex-col gap-y-7 md:gap-y-10">
        <TrendingProducts
          v-for="(value, index) in uniqueCategories"
          :category="value"
          :title="value"
          :key="index"
        />
        <TrendingProducts :category="''" :title="'All categories'" />

        <ScrollTop target="parent" :threshold="200" class="aspect-square" />
      </div>
    </div>
  </PageLayout>
</template>

<script setup lang="ts">
import TrendingProducts from "@/components/Trending/TrendingProducts.vue";
import PageLayout from "@/layout/PageLayout.vue";
import { useProductsListStore } from "@/stores/productsListStore";
import { Button, Card, ScrollTop } from "primevue";
// import { useShoppingCartStore } from "@/stores/shoppingCartStore";
// import { useWishListStore } from "@/stores/wishlistStore";
// import { Card, Rating } from "primevue";
import { computed, nextTick, onMounted, useTemplateRef } from "vue";
// import { useRouter } from "vue-router";

const productListStore = useProductsListStore();
// const wishListStore = useWishListStore();
// const shoppingCartStore = useShoppingCartStore();

// const router = useRouter();

import Swiper from "swiper";

// Import styles

import {
  Autoplay,
  EffectCoverflow,
  Navigation,
  Pagination,
} from "swiper/modules";
import "swiper/css/bundle";

const swiperContainerRef = useTemplateRef("swiper-container");
const uniqueCategories = computed(() => {
  const categories = productListStore.items.map(
    (product) => product.productCategory
  );
  return [...new Set(categories)];
});

onMounted(async () => {
  await productListStore.fetchProducts();
  await nextTick();

  if (swiperContainerRef.value)
    new Swiper(swiperContainerRef.value, {
      modules: [Navigation, Pagination, Autoplay, EffectCoverflow],
      loop: true,
      autoplay: {
        delay: 3000, // Autoplay delay
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
      },
      slidesPerView: 1,
      spaceBetween: 2,
      effect: "coverflow",
    });
});
</script>

<style scoped>
.swiper-button-next::after,
.swiper-button-prev::after {
  content: "";
}
</style>
