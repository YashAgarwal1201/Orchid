import { defineStore } from "pinia";
import { ref, computed } from "vue";
import { DUMMY_ITEMS } from "@/constants/dummyItems";
import type { Product, SelectFilterOption } from "@/types/types";
import axios from "axios";

export const useProductsListStore = defineStore("productsList", () => {
  const items = ref<Product[]>([]);
  const displayType = ref("card");
  const showProductPage = ref<boolean>(false);
  const showShoppingCart = ref(false);
  const showFilters = ref(false);
  const searchQuery = ref("");

  const selectedCategory = ref<SelectFilterOption>({
    name: "All",
    code: "ALL",
  });
  const sortBy = ref<SelectFilterOption>({ name: "Default", code: "default" });

  const sortByOptions = ref<SelectFilterOption[]>([
    { name: "Default", code: "default" },
    { name: "Price: Low to High", code: "priceAsc" },
    { name: "Price: High to Low", code: "priceDesc" },
    { name: "Rating: High to Low", code: "ratingDesc" },
  ]);

  const categories = computed<SelectFilterOption[]>(() => {
    const categoryList: SelectFilterOption[] = [
      { name: "All", code: "ALL" },
      ...Array.from(
        new Set(DUMMY_ITEMS.map((item) => item.productCategory))
      ).map((category) => ({
        name: category,
        code: category,
      })),
    ];
    return categoryList;
  });

  const toggleDisplaytype = () => {
    displayType.value = displayType.value === "card" ? "list" : "card";
  };

  const filteredItems = computed(() => {
    let filtered = [...items.value];

    if (searchQuery.value) {
      const searchQueryLower = searchQuery.value.toLowerCase();
      filtered = filtered.filter((item) => {
        const searchableString =
          `${item.productTitle} ${item.productCategory} ${item.productId}`.toLowerCase();
        return searchableString.includes(searchQueryLower);
      });
    }

    if (selectedCategory.value.code !== "ALL") {
      filtered = filtered.filter(
        (item) => item.productCategory === selectedCategory.value.code
      );
    }

    switch (sortBy.value.code) {
      case "priceAsc":
        filtered.sort((a, b) => a.productPrice - b.productPrice);
        break;
      case "priceDesc":
        filtered.sort((a, b) => b.productPrice - a.productPrice);
        break;
      case "ratingDesc":
        filtered.sort((a, b) => b.productRating - a.productRating);
        break;
    }

    return filtered;
  });

  const fetchProducts = async () => {
    try {
      const response = await axios.post(
        `${import.meta.env.VITE_API_BASE_URL}/api-services/orchid-store-dummy-data`,
        {},
        {
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      console.log("Response from API:", response);
      if (response.status === 200) {
        console.log(
          "Data fetched successfully:",
          response.data.products,
          typeof DUMMY_ITEMS
        );
        items.value = response.data.products;
      }

      // if (import.meta.env.MODE !== "development") {
      //   items.value = JSON.parse(response.data);
      // } else {
      //   items.value = response.data;
      // }
    } catch (error) {
      items.value = DUMMY_ITEMS;
      console.error("Error fetching products:", error);
    }
  };

  const setSearchQuery = (query: string) => {
    searchQuery.value = query;
  };

  const setCategory = (category: SelectFilterOption) => {
    selectedCategory.value = category;
  };

  const setSortBy = (sortOption: SelectFilterOption) => {
    sortBy.value = sortOption;
  };

  return {
    items,
    displayType,
    showProductPage,
    showShoppingCart,
    searchQuery,
    selectedCategory,
    sortBy,
    sortByOptions,
    categories,
    showFilters,
    toggleDisplaytype,
    filteredItems,
    fetchProducts,
    setSearchQuery,
    setCategory,
    setSortBy,
  };
});
