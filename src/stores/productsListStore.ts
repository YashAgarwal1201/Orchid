import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import { DUMMY_ITEMS } from '@/constants/dummyItems' // Assuming your dummy data is stored in a constants folder

export const useProductsListStore = defineStore('productsList', () => {
  const items = ref(DUMMY_ITEMS)
  const displayType = ref('card')
  const showShoppingCart = ref<boolean>(false)
  // Filters
  const showFilters = ref<boolean>(false)
  const searchQuery = ref('')
  const selectedCategory = ref('All')
  const sortBy = ref('default') // options: 'default', 'priceAsc', 'priceDesc', 'ratingDesc'

  const sortByOptions = ref([
    { name: 'All', code: 'ALL' },
    { name: 'Price: Low to High', code: 'LTH' },
    { name: 'Price: High to Low', code: 'HTL' },
    { name: 'Rating: High to Low', code: 'RH' },
  ])

  // Categories extracted from dummy data
  const categories = computed(() => [
    'All',
    ...new Set(DUMMY_ITEMS.map((item) => item.productCategory)),
  ])

  const toggleDisplaytype = () => {
    displayType.value = displayType.value === 'card' ? 'list' : 'card'
  }

  const filteredItems = computed(() => {
    let filtered = [...items.value]

    if (searchQuery.value) {
      filtered = filtered.filter((item) =>
        item.productTitle.toLowerCase().includes(searchQuery.value.toLowerCase()),
      )
    }

    if (selectedCategory.value !== 'All') {
      filtered = filtered.filter((item) => item.productCategory === selectedCategory.value)
    }

    if (sortBy.value === 'priceAsc') {
      filtered.sort((a, b) => a.productPrice - b.productPrice)
    } else if (sortBy.value === 'priceDesc') {
      filtered.sort((a, b) => b.productPrice - a.productPrice)
    } else if (sortBy.value === 'ratingDesc') {
      filtered.sort((a, b) => b.productRating - a.productRating)
    }

    return filtered
  })

  const setSearchQuery = (query: string) => {
    searchQuery.value = query
  }

  const setCategory = (category: string) => {
    selectedCategory.value = category
  }

  const setSortBy = (sortOption: string) => {
    sortBy.value = sortOption
  }

  return {
    items,
    displayType,
    showShoppingCart,
    searchQuery,
    selectedCategory,
    sortBy,
    sortByOptions,
    categories,
    showFilters,
    toggleDisplaytype,
    filteredItems,
    setSearchQuery,
    setCategory,
    setSortBy,
  }
})
