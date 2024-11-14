<template>
  <div class="w-full h-full flex justify-end items-center gap-x-3 px-3 md:px-4">
    <InputText
      type="text"
      v-model="store.searchQuery"
      placeholder="Search products..."
      @input="store.setSearchQuery(store.searchQuery)"
      class="text-sm sm:text-base !rounded-full"
    />

    <div class="hidden mdl:flex items-center gap-x-3">
      <!-- <select v-model="store.selectedCategory" @change="store.setCategory(store.selectedCategory)">
        <option v-for="category in store.categories" :key="category">{{ category }}</option>
      </select> -->

      <Select
        v-model="store.selectedCategory"
        :options="store.categories"
        placeholder="Category"
        option-label="name"
        class="w-[200px] !rounded-full"
      >
      </Select>

      <!-- <MultiSelect
        v-model="store.selectedCategory"
        :options="store.categories"
        placeholder="Category"
        option-label="name"
        class="w-[200px] !rounded-full"
      >
      </MultiSelect> -->

      <Select
        v-model="store.sortBy"
        :options="store.sortByOptions"
        option-label="name"
        placeholder="Sort by"
        class="w-[200px] !rounded-full"
      >
      </Select>

      <Button
        rounded
        :icon="store.displayType === 'card' ? 'pi pi-th-large' : 'pi pi-list'"
        @click="store.toggleDisplaytype"
      />
    </div>

    <Button
      title="click to see filters"
      icon="pi pi-filter"
      rounded
      class="block mdl:!hidden"
      @click="store.showFilters = true"
    />
  </div>
</template>

<script setup lang="ts">
import { useProductsListStore } from "@/stores/productsListStore";
import { Button, InputText, Select } from "primevue";

const store = useProductsListStore();
</script>

<style scoped></style>
