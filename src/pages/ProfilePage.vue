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
        <Tabs
          value="0"
          class="rounded-3xl w-full max-w-7xl mx-auto"
          scrollable
          :show-navigators="false"
        >
          <TabList class="w-full">
            <Tab value="0" class="text-sm flex items-center gap-x-2"
              ><CircleUserRound :size="16" /><span>Your Details</span></Tab
            >
            <Tab value="1" class="text-sm flex items-center gap-x-2"
              ><Heart :size="16" /><span>Your Wishlist</span></Tab
            >
            <Tab value="2" class="text-sm flex items-center gap-x-2"
              ><History :size="16" /><span>Your Previous Orders</span></Tab
            >
            <Tab value="3" class="text-sm flex items-center gap-x-2"
              ><Settings :size="16" /><span>Settings</span></Tab
            >
            <Tab value="4" class="text-sm flex items-center gap-x-2"
              ><MessageSquarePlus :size="16" /><span>Contact</span></Tab
            >
          </TabList>

          <TabPanels class="!p-0 rounded-b-3xl">
            <TabPanel value="0" class="min-h-[200px]">
              <div
                class="w-full h-full p-3 md:p-4 xl:p-5 flex flex-col gap-y-3 md:gap-y-5"
              >
                <p class="text-lg md:text-xl">Your profile details</p>
                <div
                  class="flex flex-nowrap items-center gap-x-3 sm:gap-x-5 gap-y-2"
                >
                  <span class="w-full max-w-36 text-right text-base md:text-lg"
                    >Name</span
                  >
                  <div class="h-10 w-[1px] bg-current"></div>
                  <InputText
                    :value="userDetails.username"
                    class="!rounded-2xl text-sm md:text-base"
                    :readonly="true"
                  />
                </div>
                <div
                  class="flex flex-nowrap items-center gap-x-3 sm:gap-x-5 gap-y-2"
                >
                  <span class="w-full max-w-36 text-right text-base md:text-lg"
                    >Email</span
                  >
                  <div class="h-10 w-[1px] bg-current"></div>
                  <InputText
                    :value="userDetails.email"
                    class="!rounded-2xl text-sm md:text-base"
                    :readonly="true"
                  />
                </div>
                <div
                  class="flex flex-nowrap items-center gap-x-3 sm:gap-x-5 gap-y-2"
                >
                  <span class="w-full max-w-36 text-right text-base md:text-lg"
                    >Password</span
                  >
                  <div class="h-10 w-[1px] bg-current"></div>
                  <InputText
                    :value="userDetails.password"
                    class="!rounded-2xl text-sm md:text-base"
                    :readonly="true"
                  />
                </div>
              </div>
            </TabPanel>

            <TabPanel value="1" class="min-h-[200px]">
              <div
                class="w-full h-full p-3 md:p-4 xl:p-5 flex flex-col justify-center items-center gap-y-5 md:gap-y-7"
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
                class="w-full h-full p-3 md:p-4 xl:p-5 flex justify-center items-center"
              >
                <p class="text-lg md:text-xl italic">Coming Soon</p>
              </div>
            </TabPanel>

            <TabPanel value="3" class="min-h-[200px]">
              <div
                class="w-full h-full p-3 md:p-4 xl:p-5 flex justify-center items-center"
              >
                <p class="text-lg md:text-xl italic">Coming Soon</p>
              </div>
            </TabPanel>

            <TabPanel value="4" class="min-h-[200px]">
              <div class="w-full h-full p-3 md:p-4 xl:p-5 flex flex-col gap-5">
                <p class="text-lg md:text-xl">
                  Have something to say? Fill out this form
                </p>
                <div>
                  <FeedbackForm />
                </div>
              </div>
            </TabPanel>
          </TabPanels>
        </Tabs>
      </div>
    </div>
  </PageLayout>
</template>

<script setup lang="ts">
import FeedbackForm from "@/components/FeedbackForm/FeedbackForm.vue";
// import toastHandler from "@/composables/toastHandeler";
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
  InputText,
} from "primevue";
import {
  CircleUserRound,
  Heart,
  History,
  MessageSquarePlus,
  Settings,
} from "lucide-vue-next";
import { ref } from "vue";
import { useRouter } from "vue-router";

const wishListStore = useWishListStore();

const shoppingCartStore = useShoppingCartStore();

const router = useRouter();

// const { showToast } = toastHandler();

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
