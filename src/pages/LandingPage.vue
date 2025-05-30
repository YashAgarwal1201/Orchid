<template>
  <Transition appear>
    <div class="w-full h-full flex flex-col justify-center items-center">
      <img
        src="/logoLight.svg"
        alt="store"
        class="w-[150px] aspect-square select-none"
      />
      <h1 class="text-3xl md:text-4xl text-center">
        Welcome to The Orchid Store
      </h1>

      <div class="w-full flex flex-col items-center gap-y-5 mt-10 md:mt-20">
        <h2 class="text-2xl md:text-3xl">Create an Account</h2>
        <Card
          class="w-full md:w-[768px] rounded-3xl py-7 px-3 md:px-5 !p-card shadow-md"
        >
          <template #content>
            <form @submit.prevent="onSubmit" class="flex flex-col gap-5 w-full">
              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Username </label>
                  <small v-if="errors.userName" class="text-red-500">{{
                    errors.userName
                  }}</small>
                </div>

                <Field name="userName" v-slot="{ field, errorMessage }">
                  <InputText
                    id="userName"
                    v-bind="field"
                    :class="{ '!rounded-2xl': true, 'p-invalid': errorMessage }"
                  />
                </Field>
              </div>

              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Email </label>

                  <small v-if="errors.email" class="text-red-500">{{
                    errors.email
                  }}</small>
                </div>
                <Field name="email" v-slot="{ field, errorMessage }">
                  <InputText
                    id="email"
                    type="email"
                    v-bind="field"
                    :class="{ '!rounded-2xl': true, 'p-invalid': errorMessage }"
                  />
                </Field>
              </div>

              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Password </label>

                  <small v-if="errors.password" class="text-red-500">{{
                    errors.password
                  }}</small>
                </div>
                <Field name="password" v-slot="{ field, errorMessage }">
                  <Password
                    id="password"
                    v-model="field.value"
                    :feedback="false"
                    toggle-mask
                    :class="{
                      'w-full !rounded-2xl': true,
                      'p-invalid': errorMessage,
                    }"
                    @update:modelValue="
                      (value) => {
                        setFieldValue('password', value);
                        validateField('password');
                      }
                    "
                    @blur="
                      () => {
                        validateField('password');
                      }
                    "
                  />
                </Field>
              </div>

              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Confirm Password </label>
                  <small v-if="errors.cpassword" class="text-red-500">{{
                    errors.cpassword
                  }}</small>
                </div>
                <Field name="cpassword" v-slot="{ field, errorMessage }">
                  <Password
                    id="cpassword"
                    v-model="field.value"
                    :feedback="false"
                    toggle-mask
                    :class="{
                      'w-full !rounded-2xl': true,
                      'p-invalid': errorMessage,
                    }"
                    @update:modelValue="
                      (value) => {
                        setFieldValue('cpassword', value);
                        validateField('cpassword');
                      }
                    "
                    @blur="
                      () => {
                        validateField('cpassword');
                      }
                    "
                  />
                </Field>
              </div>

              <div class="flex justify-between">
                <Button
                  type="button"
                  outlined
                  rounded
                  icon="pi pi-trash"
                  label="Clear details"
                  @click="() => resetForm()"
                />
                <Button
                  type="submit"
                  rounded
                  icon="pi pi-send"
                  label="Submit details"
                  :disabled="isSubmitting || !meta.valid"
                />
              </div>
            </form>
          </template>
        </Card>
      </div></div
  ></Transition>
</template>

<script setup lang="ts">
// import PageLayout from "@/layout/PageLayout.vue";
// import { ref } from "vue";
import { Button, Card, InputText, Password } from "primevue";
// import type { RegisterFormData } from "@/types/types";
import { useRouter } from "vue-router";
import toastHandler from "@/composables/toastHandeler";

import { useForm, Field } from "vee-validate";
import * as yup from "yup";

const router = useRouter();
const { showToast } = toastHandler();

// Define validation schema
const schema = yup.object({
  userName: yup.string().required("Name is required"),
  email: yup
    .string()
    .required("Email is required")
    .email("Please enter a valid email"),
  password: yup
    .string()
    .required("Password is required")
    .min(8, "Password must be at least 8 characters"),
  cpassword: yup
    .string()
    .required("Confirm password is required")
    .oneOf([yup.ref("password")], "Passwords must match"),
});

// const initialValues = ref<RegisterFormData>({
//   username: "",
//   email: "",
//   password: "",
//   cpassword: "",
// });

// Initialize the form with vee-validate
const {
  handleSubmit,
  resetForm,
  meta,
  isSubmitting,
  errors,
  setFieldValue,
  validateField,
} = useForm({
  validationSchema: schema,
  initialValues: {
    userName: "",
    email: "",
    password: "",
    cpassword: "",
  },
});

// Form submission handler
const onSubmit = handleSubmit((values) => {
  console.log("Form submitted:", values);
  // Here you would typically send the form data to your API
  // After successful submission, you might want to reset the form

  const existingLocalStorageData = localStorage.getItem(
    "OrchidStoreRegisteredAccount"
  );
  const existingCookieData = document.cookie
    .split("; ")
    .find((row) => row.startsWith("OrchidStoreLoginAccount="));

  if (existingLocalStorageData && existingCookieData) {
    console.log("Account data already exists. Skipping storage.");
    resetForm();

    router.push("/payment");
    return;
  }

  if (meta.value.valid) {
    showToast(
      "success",
      "Success",
      "Login Successful, navigating to products page"
    );

    console.log(values);

    // Parse existing localStorage data or initialize an empty array
    let storedAccounts = existingLocalStorageData
      ? JSON.parse(existingLocalStorageData)
      : [];

    // Ensure storedAccounts is an array
    if (!Array.isArray(storedAccounts)) {
      storedAccounts = [storedAccounts];
    }

    // Append new data
    storedAccounts.push(values);

    // Save updated data back to localStorage
    localStorage.setItem(
      "OrchidStoreRegisteredAccount",
      JSON.stringify(storedAccounts)
    );

    // Set a cookie with expiration
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 7);
    const expires = `expires=${expirationDate.toUTCString()}`;

    document.cookie = `OrchidStoreLoginAccount=${JSON.stringify(values)}; ${expires}; path=/`;

    resetForm();
    router.push("/products");
  }
});
</script>

<style lang="css" scoped>
.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateY(100%);
  opacity: 0;
}
</style>

<style lang="css">
.p-password-input {
  width: 100%;
  border-radius: 1rem !important;
}

.p-field {
  margin-bottom: 1rem;
}

.p-invalid {
  border-color: #f56c6c !important;
}

.p-error {
  color: #f56c6c;
}
</style>
