<template>
  <PageLayout>
    <div class="w-full h-full flex flex-col">
      <div
        class="w-full h-[40vh] min-h-[300px] flex flex-col md:flex-row items-center justify-center gap-3"
      >
        <Avatar icon="pi pi-user" class="mr-2" size="xlarge" shape="circle" />
        <h1 class="text-2xl md:text-3xl">{{ userDetails.username }}</h1>
      </div>

      <div class="p-2 md:p-3">
        <Tabs value="0" class="rounded-3xl" scrollable :show-navigators="false">
          <TabList>
            <Tab value="0" class="text-sm flex items-center"
              ><span class="pi pi-info-circle mr-3"></span>Your Details</Tab
            >
            <Tab value="1" class="text-sm flex items-center"
              ><span class="pi pi-heart mr-3"></span>Your Wishlist</Tab
            >

            <Tab value="2" class="text-sm flex items-center"
              ><span class="pi pi-history mr-3"></span>Your Previous Orders</Tab
            >
            <Tab value="3" class="text-sm flex items-center"
              ><span class="pi pi-cog mr-3"></span>Settings</Tab
            >
            <Tab value="4" class="text-sm flex items-center"
              ><span class="pi pi-comment mr-3"></span>Contact</Tab
            >
          </TabList>

          <TabPanels class="!p-0 rounded-b-3xl">
            <TabPanel value="0" class="min-h-[200px]">
              <div
                class="w-full h-full p-3 md:p-4 flex flex-col gap-y-5 md:gap-y-7"
              >
                <p>
                  <span class="text-lg md:text-xl">Name:</span>
                  {{ userDetails.username }}
                </p>
                <p>
                  <span class="text-lg md:text-xl">Email:</span>
                  {{ userDetails.email }}
                </p>
                <p>
                  <span class="text-lg md:text-xl">Password:</span>
                  {{ userDetails.password }}
                </p>
              </div>
            </TabPanel>

            <TabPanel value="1" class="min-h-[200px]">
              <div
                class="w-full h-full p-3 md:p-4 flex flex-col justify-center items-center gap-y-5 md:gap-y-7"
              >
                <p>
                  You have currently {{ wishListStore.items.length }} item(s) in
                  your wishlist
                </p>

                <div
                  class="w-full grid grid-cols-2 mdl:grid-cols-3 xl:grid-cols-4 3xl:grid-cols-5 gap-2 md:gap-3"
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
                    <template #title
                      ><span v-tooltip="item.productDescription">{{
                        item.productTitle
                      }}</span></template
                    >
                    <template #subtitle>{{ item.productCategory }}</template>
                    <template #content>
                      <h3 class="font-semibold">
                        Price:
                        <span class="text-lg">${{ item.productPrice }}</span>
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
                          :disabled="
                            router.currentRoute.value.fullPath.includes(
                              '/payment'
                            )
                          "
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
              </div>
            </TabPanel>

            <TabPanel value="2" class="min-h-[200px]">
              <div
                class="w-full h-full p-3 md:p-4 flex justify-center items-center"
              >
                <p class="text-lg md:text-xl italic">Coming Soon</p>
              </div>
            </TabPanel>

            <TabPanel value="3" class="min-h-[200px]">
              <div
                class="w-full h-full p-3 md:p-4 flex justify-center items-center"
              >
                <p class="text-lg md:text-xl italic">Coming Soon</p>
              </div>
            </TabPanel>

            <TabPanel value="4" class="min-h-[200px]">
              <div class="w-full h-full p-3 md:p-4 flex flex-col gap-3">
                <p class="text-lg md:text-xl">Have something to say?</p>
                <Button
                  icon="pi pi-comment"
                  label="Fill this form"
                  rounded
                  class="m-auto"
                  @click="showToast('info', 'Info', 'Under progress')"
                />
              </div>
            </TabPanel>
          </TabPanels>
        </Tabs>
      </div>
    </div>
  </PageLayout>
</template>

<script setup lang="ts">
import toastHandler from "@/composables/toastHandeler";
import PageLayout from "@/layout/PageLayout.vue";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";
import { useWishListStore } from "@/stores/wishlistStore";
import {
  Avatar,
  Button,
  Card,
  Tab,
  TabList,
  TabPanel,
  TabPanels,
  Tabs,
} from "primevue";
import { ref } from "vue";
import { useRouter } from "vue-router";

const wishListStore = useWishListStore();

const shoppingCartStore = useShoppingCartStore();

const router = useRouter();

const { showToast } = toastHandler();

function getCookie(name: string) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) {
    return parts.pop()?.split(";").shift();
  }
  return null;
}

const userDetails = ref({
  username: "Guest",
  email: "N/A",
  password: "",
});

const userCookie = getCookie("OrchidStoreLoginAccount");

if (userCookie) {
  try {
    userDetails.value = JSON.parse(decodeURIComponent(userCookie));
  } catch (error) {
    console.error("Failed to parse user details cookie:", error);
  }
}
</script>

<style>
.p-tablist-tab-list {
  border-top-left-radius: 1.5rem;
  border-top-right-radius: 1.5rem;
}
.p-tabpanel {
  border-bottom-left-radius: 1.5rem;
  border-bottom-right-radius: 1.5rem;
}
</style>
