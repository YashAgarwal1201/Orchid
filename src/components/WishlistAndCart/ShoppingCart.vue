<template>
  <div>
    <Drawer
      v-model:visible="shoppingCartStore.showShoppingCart"
      v-on:hide="shoppingCartStore.showShoppingCart = false"
      :dismissable="true"
      position="right"
      class="w-full md:w-[768px] rounded-none md:!rounded-l-3xl"
    >
      <template #header>
        <div class="flex justify-between items-center w-full">
          <h3 class="text-lg sm:text-xl md:text-2xl">Your Shopping Cart</h3>

          <Button
            icon="pi pi-heart"
            class="p-button-text"
            rounded
            @click="
              () => {
                shoppingCartStore.showShoppingCart = false;
                wishListStore.showWishList = true;
              }
            "
          />
        </div>
      </template>
      <div v-if="shoppingCartStore.items.length > 0" class="w-full h-full">
        <div class="w-full h-[calc(100%-100px)]">
          <DataTable
            :value="shoppingCartStore.items"
            paginator
            :rows="10"
            :rows-per-page-options="[5, 10, 15]"
            size="small"
            scrollable
            scroll-height="flex"
          >
            <Column field="productTitle" header="Name" sortable></Column>
            <Column field="productPrice" header="Price" sortable></Column>
            <Column field="quantity" header="Quantity" sortable>
              <template #body="slotProps">
                <InputNumber
                  v-model="slotProps.data.quantity"
                  inputId="horizontal-buttons"
                  showButtons
                  buttonLayout="horizontal"
                  :step="1"
                  class="!rounded-full w-fit"
                  prefix="x"
                  :max="10"
                  :min="1"
                >
                  <template #incrementicon>
                    <span class="pi pi-plus" />
                  </template>
                  <template #decrementicon>
                    <span class="pi pi-minus" />
                  </template>
                </InputNumber>
              </template>
            </Column>
            <Column header="Actions">
              <template #body="slotProps">
                <Button
                  title="Remove from cart"
                  type="button"
                  icon="pi pi-trash"
                  rounded
                  severity="danger"
                  outlined
                  class="mr-2"
                  @click="
                    shoppingCartStore.removeFromCart(
                      slotProps.data.productTitle
                    );
                    showToast(
                      'warn',
                      'Removed from cart',
                      'Item is removed from your cart'
                    );
                  "
                />
                <Button
                  title="move to wish list"
                  type="button"
                  icon="pi pi-heart"
                  rounded
                  outlined
                  @click="
                    () => {
                      wishListStore.addToWishList(slotProps.data);
                      shoppingCartStore.removeFromCart(
                        slotProps.data.productTitle
                      );
                      showToast(
                        'info',
                        'Moved to wishlist',
                        'Item moved to your wishlist'
                      );
                    }
                  "
                />
              </template>
            </Column>
          </DataTable>
        </div>
        <div class="h-[100px] border-t flex justify-between items-center">
          <div
            class="text-xl sm:text-2xl md:text-3xl flex flex-col sm:flex-row items-center gap-x-2"
          >
            <span>Your Total :</span>
            <div class="flex items-center gap-x-3">
              <span class="text-green-500"
                >${{ shoppingCartStore.getTotalPrice() }}</span
              >
              <span class="text-sm sm:text-base"
                >({{
                  shoppingCartStore.items.reduce(
                    (acc, item) => acc + item.quantity,
                    0
                  )
                }}
                items)</span
              >
            </div>
          </div>

          <Button
            icon="pi pi-wallet"
            label="Continue to pay"
            rounded
            class="text-sm sm:text-base"
            @click="
              () => {
                shoppingCartStore.showShoppingCart = false;
                showToast(
                  'info',
                  'Moving to payment page',
                  'You are being moved to payments page'
                );
                router.push('/payment');
              }
            "
          />
        </div>
      </div>

      <div v-else class="w-full h-full flex justify-center items-center">
        <p>Your cart is empty</p>
      </div>
    </Drawer>
  </div>
</template>

<script setup lang="ts">
import toastHandler from "@/composables/toastHandeler";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import { Button, Column, DataTable, Drawer, InputNumber } from "primevue";
import { useRouter } from "vue-router";

const router = useRouter();

const { showToast } = toastHandler();

const shoppingCartStore = useShoppingCartStore();
const wishListStore = useWishListStore();
</script>

<style scoped></style>
