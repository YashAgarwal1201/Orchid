import type { Product } from '@/types/types'
import { defineStore } from 'pinia'
import { ref } from 'vue'

type CartItem = Product & { quantity: number }

export const useShoppingCartStore = defineStore('shoppingCart', () => {
  const items = ref<CartItem[]>([])
  const showShoppingCart = ref<boolean>(false)

  const addToCart = (item: Product, quantity: number = 1) => {
    const existingItem = items.value.find((cartItem) => cartItem.productTitle === item.productTitle)

    if (existingItem) {
      existingItem.quantity += quantity
    } else {
      items.value.push({ ...item, quantity })
    }
    console.log(`Added to cart: ${item.productTitle} (x${quantity})`)
  }

  const removeFromCart = (productTitle: string) => {
    const index = items.value.findIndex((item) => item.productTitle === productTitle)

    if (index !== -1) {
      const removedItem = items.value.splice(index, 1)[0]
      console.log(`Removed from cart: ${removedItem.productTitle}`)
    } else {
      console.log(`Item not found in cart: ${productTitle}`)
    }
  }

  const updateItemQuantity = (productTitle: string, quantity: number) => {
    const existingItem = items.value.find((item) => item.productTitle === productTitle)

    if (existingItem) {
      if (quantity > 0) {
        existingItem.quantity = quantity
        console.log(`Updated ${productTitle} quantity to ${quantity}`)
      } else {
        removeFromCart(productTitle)
      }
    } else {
      console.log(`Item not found in cart: ${productTitle}`)
    }
  }

  const getTotalPrice = (): number => {
    return items.value.reduce((total, item) => total + item.productPrice * item.quantity, 0)
  }

  const clearCart = () => {
    items.value = []
    console.log('Shopping cart cleared')
  }

  const isItemInCart = (productId: string): boolean => {
    return items.value.some((item) => item.productId === productId)
  }

  const toggleCartVisibility = () => {
    showShoppingCart.value = !showShoppingCart.value
  }

  return {
    items,
    showShoppingCart,

    addToCart,
    removeFromCart,
    updateItemQuantity,
    getTotalPrice,
    clearCart,
    isItemInCart,
    toggleCartVisibility,
  }
})
