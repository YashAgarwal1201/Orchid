import type { ModeOfPayment } from "@/types/types";
import { defineStore } from "pinia";
import { ref } from "vue";

export const useWishListStore = defineStore("wishList", () => {
  const modeOfPayment = ref<ModeOfPayment>("upi");

  return {
    modeOfPayment,
  };
});
