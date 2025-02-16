<template>
  <div>
    <form @submit.prevent="submitForm" class="flex flex-col gap-5 w-full">
      <div class="w-full flex flex-col gap-1">
        <div class="px-3 flex justify-between items-center">
          <label for="name">Name</label>
        </div>
        <InputText id="name" v-model="name" required class="!rounded-2xl" />
      </div>
      <div class="w-full flex flex-col gap-1">
        <div class="px-3 flex justify-between items-center">
          <label for="email">Email</label>
        </div>
        <InputText
          id="email"
          v-model="email"
          type="email"
          required
          class="!rounded-2xl"
        />
      </div>
      <div class="w-full flex flex-col gap-1">
        <div class="px-3 flex justify-between items-center">
          <label for="message">Message</label>
        </div>
        <InputText
          id="message"
          v-model="message"
          rows="4"
          required
          class="h-[150px] !rounded-2xl resize-none"
        />
      </div>

      <div class="flex justify-between">
        <Button
          type="reset"
          outlined
          rounded
          icon="pi pi-trash"
          label="Clear details"
        />
        <Button
          type="submit"
          rounded
          icon="pi pi-send"
          label="Submit details"
        />
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { Button, InputText } from "primevue";

const name = ref("");
const email = ref("");
const message = ref("");

const submitForm = () => {
  console.log("Form submitted:", {
    name: name.value,
    email: email.value,
    message: message.value,
  });
};
</script>

<style scoped>
.p-field {
  margin-bottom: 1rem;
}
</style>
