import type { Product } from '@/types/types'
import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useWishListStore = defineStore('wishList', () => {
  const items = ref<Product[]>([])
  const showWishList = ref<boolean>(false)

  const addToWishList = (item: Product) => {
    const exists = items.value.some((wishlistItem) => wishlistItem.productId === item.productId)

    if (!exists) {
      items.value.push(item)
      console.log(`Added to wishlist: ${item.productTitle}`)
    } else {
      console.log(`Item already in wishlist: ${item.productTitle}`)
    }
  }

  const removeFromWishList = (productId: string) => {
    const index = items.value.findIndex((item) => item.productId === productId)

    if (index !== -1) {
      const removedItem = items.value.splice(index, 1)[0]
      console.log(`Removed from wishlist: ${removedItem.productTitle}`)
    } else {
      console.log(`Item not found in wishlist: ${productId}`)
    }
  }

  const isItemInWishList = (productId: string): boolean => {
    return items.value.some((item) => item.productId === productId)
  }

  const toggleWishListVisibility = () => {
    showWishList.value = !showWishList.value
  }

  return {
    items,
    showWishList,
    addToWishList,
    removeFromWishList,
    isItemInWishList,
    toggleWishListVisibility,
  }
})
