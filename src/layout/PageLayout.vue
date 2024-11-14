<template>
  <div class="w-full h-full flex flex-col md:flex-row">
    <div class="w-full md:w-[70px] h-[60px] md:h-full"><NavBar /></div>
    <div
      class="w-full md:w-[calc(100%-70px)] h-[calc(100%-60px)] md:h-full overflow-auto"
    >
      <slot />
    </div>
  </div>

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
      <!-- <div
        class="w-full h-[calc(100%-100px)] grid grid-cols-1 xs:grid-cols-2 gap-3 overflow-y-auto"
      >
        <Card
          v-for="(item, index) in shoppingCartStore.items"
          :key="index"
          class="rounded-2xl aspect-auto"
          ><template #header>
            <img
              alt="user header"
              :src="item.productImage"
              class="w-full max-h-[150px] object-cover rounded-t-2xl"
            />
          </template>
          <template #title>{{ item.productTitle }}</template>
          <template #subtitle>{{ item.productCategory }}</template>
          <template #content>
            <p class="m-0">
              {{ item.productDescription }}
            </p>

            <h3 class="font-semibold">
              Price: <span class="text-lg">${{ item.productPrice }}</span>
            </h3>
            <p class="mt-3 font-semibold">
              Delivery: {{ item.estimatedDelivery }}
            </p>
          </template>
          <template #footer>
            <div class="flex gap-4 mt-1 product-card">
              <Button
                icon="pi pi-heart"
                title="Move to wishlist"
                severity="secondary"
                rounded
                outlined
                @click="
                  () => {
                    wishListStore.addToWishList(item);
                    shoppingCartStore.removeFromCart(item.productTitle);
                  }
                "
              />
              <Button
                icon="pi pi-cart-minus"
                label="Remove Cart"
                rounded
                outlined
                @click="shoppingCartStore.removeFromCart(item.productTitle)"
              />
            </div> </template
        ></Card>

        <ScrollTop target="parent" :threshold="200" />
      </div> -->

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
                  shoppingCartStore.removeFromCart(slotProps.data.productTitle)
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
                  }
                "
              />
            </template>
          </Column>
        </DataTable>
      </div>
      <div class="h-[100px] border-t flex justify-between items-center">
        <h2 class="text-xl sm:text-2xl md:text-3xl flex items-center gap-x-2">
          Your Total :
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
        </h2>

        <Button
          icon="pi pi-wallet"
          label="Continue to pay"
          rounded
          class="text-sm sm:text-base"
          @click="router.push('/payment')"
        />
      </div>
    </div>

    <div v-else class="w-full h-full flex justify-center items-center">
      <p>Your cart is empty</p>
    </div>
  </Drawer>

  <Drawer
    v-model:visible="wishListStore.showWishList"
    v-on:hide="wishListStore.showWishList = false"
    :dismissable="true"
    position="right"
    header="Your wishlist"
    class="w-full md:w-[768px] rounded-none md:!rounded-l-3xl"
  >
    <template #header>
      <div class="flex justify-between items-center w-full">
        <h3 class="text-lg sm:text-xl md:text-2xl">Your Wish List</h3>

        <Button
          icon="pi pi-cart-plus"
          class="p-button-text"
          rounded
          @click="
            () => {
              shoppingCartStore.showShoppingCart = true;
              wishListStore.showWishList = false;
            }
          "
        />
      </div>
    </template>
    <div
      v-if="wishListStore.items.length > 0"
      class="w-full h-full grid grid-cols-1 xs:grid-cols-2 gap-x-3"
    >
      <Card
        v-for="(item, index) in wishListStore.items"
        :key="index"
        class="rounded-2xl aspect-auto"
        ><template #header>
          <img
            alt="user header"
            :src="item.productImage"
            class="w-full max-h-[150px] object-cover rounded-t-2xl"
          />
        </template>
        <template #title>{{ item.productTitle }}</template>
        <template #subtitle>{{ item.productCategory }}</template>
        <template #content>
          <p class="m-0">
            {{ item.productDescription }}
          </p>

          <h3 class="font-semibold">
            Price: <span class="text-lg">${{ item.productPrice }}</span>
          </h3>
          <p class="mt-3 font-semibold">
            Delivery: {{ item.estimatedDelivery }}
          </p>
        </template>
        <template #footer>
          <div class="flex gap-4 mt-1 product-card">
            <Button
              title="remove from wishlist"
              icon="pi pi-heart-fill"
              rounded
              @click="
                () => {
                  wishListStore.removeFromWishList(item.productId);
                  // wishListStore.showWishList = true
                }
              "
            />
            <Button
              icon="pi pi-cart-plus"
              label="Move to Cart"
              rounded
              @click="
                () => {
                  shoppingCartStore.addToCart(item);
                  wishListStore.removeFromWishList(item.productId);
                }
              "
            />
          </div> </template
      ></Card>
    </div>

    <div v-else class="w-full h-full flex justify-center items-center">
      <p>No items in your wishlist</p>
    </div>
  </Drawer>

  <Dialog
    v-model:visible="productsListStore.showFilters"
    v-on:hide="productsListStore.showFilters = false"
    dismissable-mask
    position="bottom"
    header="Filters"
    class="w-full h-full"
    >filters</Dialog
  >
</template>

<script lang="ts" setup>
import NavBar from "@/components/NavBar/NavBar.vue";
import { useRouter } from "vue-router";
import { useProductsListStore } from "@/stores/productsListStore";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import {
  Button,
  Card,
  Column,
  DataTable,
  Dialog,
  Drawer,
  InputNumber,
  // ScrollTop,
} from "primevue";
// import { computed } from 'vue'

const shoppingCartStore = useShoppingCartStore();
const productsListStore = useProductsListStore();
const wishListStore = useWishListStore();

const router = useRouter();

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
