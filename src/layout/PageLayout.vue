<template>
  <div class="w-full h-full flex flex-col md:flex-row">
    <Toast />
    <div class="w-full md:w-[70px] h-[60px] md:h-full"><NavBar /></div>
    <div
      class="w-full md:w-[calc(100%-70px)] h-[calc(100%-60px)] md:h-full overflow-auto"
    >
      <slot />
    </div>
  </div>

  <ShoppingCart />
  <WishList />

  <Dialog
    v-model:visible="productsListStore.showFilters"
    v-on:hide="productsListStore.showFilters = false"
    dismissable-mask
    position="bottom"
    header="Apply search filters"
    class="w-full h-full"
  >
    <div class="w-full mb-4 flex flex-col gap-y-3">
      <h3 class="text-base xs:text-lg">Choose Category</h3>
      <Select
        v-model="productsListStore.selectedCategory"
        :options="productsListStore.categories"
        placeholder="Category"
        option-label="name"
        class="w-[200px] !rounded-full"
      >
      </Select>
    </div>

    <div class="w-full mb-4 flex flex-col gap-y-3">
      <h3 class="text-base xs:text-lg">Sort according to price/ratings</h3>
      <Select
        v-model="productsListStore.sortBy"
        :options="productsListStore.sortByOptions"
        option-label="name"
        placeholder="Sort by"
        class="w-[200px] !rounded-full"
      >
      </Select>
    </div>
  </Dialog>
</template>

<script lang="ts" setup>
import NavBar from "@/components/NavBar/NavBar.vue";
// import { useRouter } from "vue-router";
import { useProductsListStore } from "@/stores/productsListStore";
import {
  Dialog,
  Select,
  Toast,
  // ScrollTop,
} from "primevue";
import WishList from "@/components/WishlistAndCart/WishList.vue";
import ShoppingCart from "@/components/WishlistAndCart/ShoppingCart.vue";
// import { computed } from 'vue'

const productsListStore = useProductsListStore();

// const router = useRouter();

// const isDrawerVisible = computed(() => {
//   return shoppingCartStore.showShoppingCart || wishListStore.showWishList
// })
</script>

<style lang="css">
.p-dialog-mask,
.p-drawer-mask {
  backdrop-filter: blur(8px);
}

.p-drawer {
  width: 768px !important;
  border-top-left-radius: 1.5rem;
  border-bottom-left-radius: 1.5rem;
}

@media screen and (max-width: 768px) {
  .p-drawer {
    width: 100% !important;
    border-top-left-radius: 0rem;
    border-bottom-left-radius: 0rem;
  }
}
</style>
