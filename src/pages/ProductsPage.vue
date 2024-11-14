<template>
  <PageLayout
    ><div class="w-full h-full">
      <div class="w-full h-[60px] flex items-center"><FiltersBar /></div>

      <div class="w-full h-[calc(100%-60px)]">
        <ProductsList />
        <!-- <ScrollTop target="parent" :threshold="100" icon="pi pi-arrow-up" /> -->
      </div>
    </div></PageLayout
  >
</template>

<script setup lang="ts">
import FiltersBar from '@/components/FiltersBar/FiltersBar.vue'
import ProductsList from '@/components/ProductsList/ProductsList.vue'
import PageLayout from '@/layout/PageLayout.vue'
</script>

<style scoped></style>
