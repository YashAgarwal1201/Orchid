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
            <Form
              v-slot="$form"
              :initialValues="initialValues"
              :resolver="resolver"
              @submit="onFormSubmit"
              class="flex flex-col gap-7 w-full"
              :validateOnValueUpdate="true"
            >
              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Username </label>
                  <Message
                    v-if="($form as any).username?.invalid"
                    severity="error"
                    size="small"
                    variant="simple"
                    >{{ ($form as any).username?.error.message }}</Message
                  >
                </div>

                <InputText
                  name="username"
                  type="text"
                  fluid
                  class="!rounded-2xl"
                />
              </div>

              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Email </label>

                  <Message
                    v-if="($form as any).email?.invalid"
                    severity="error"
                    size="small"
                    variant="simple"
                    >{{ ($form as any).email?.error.message }}</Message
                  >
                </div>
                <InputText
                  name="email"
                  type="email"
                  fluid
                  class="!rounded-2xl"
                />
              </div>

              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Password </label>

                  <Message
                    v-if="($form as any).password?.invalid"
                    severity="error"
                    size="small"
                    variant="simple"
                    >{{ ($form as any).password?.error.message }}</Message
                  >
                </div>
                <Password
                  name="password"
                  inputId="over_label"
                  class="w-full !rounded-2xl"
                  toggle-mask
                />
              </div>

              <div class="w-full flex flex-col gap-1">
                <div class="px-3 flex justify-between items-center">
                  <label>Confirm Password </label>
                  <Message
                    v-if="($form as any).cpassword?.invalid"
                    severity="error"
                    size="small"
                    variant="simple"
                    >{{ ($form as any).cpassword?.error.message }}</Message
                  >
                </div>
                <Password
                  name="cpassword"
                  inputId="over_label"
                  class="w-full !rounded-2xl"
                  toggle-mask
                />
              </div>

              <div class="flex justify-between">
                <Button
                  type="reset"
                  outlined
                  rounded
                  icon="pi pi-trash"
                  label="Clear details"
                  @click="$form.reset()"
                />
                <Button
                  type="submit"
                  rounded
                  :disabled="!$form.valid"
                  icon="pi pi-send"
                  label="Submit details"
                />
              </div>
            </Form>
          </template>
        </Card>
      </div></div
  ></Transition>
</template>

<script setup lang="ts">
// import PageLayout from "@/layout/PageLayout.vue";
import { Form, type FormSubmitEvent } from "@primevue/forms";
import { ref } from "vue";
import { Button, Card, InputText, Message, Password } from "primevue";
import { z } from "zod";
import { zodResolver } from "@primevue/forms/resolvers/zod";
import type { RegisterFormData } from "@/types/types";
import { useRouter } from "vue-router";
import toastHandler from "@/composables/toastHandeler";

const router = useRouter();
const { showToast } = toastHandler();

const initialValues = ref<RegisterFormData>({
  username: "",
  email: "",
  password: "",
  cpassword: "",
});

const schema = z
  .object({
    username: z
      .string()
      .min(3, { message: "Username must be at least 3 characters." }),
    email: z.string().email({ message: "Please enter a valid email address." }),
    password: z
      .string()
      .min(6, { message: "Password must be at least 6 characters." }),
    cpassword: z
      .string()
      .min(6, { message: "Confirm Password must be at least 6 characters." }),
  })
  .superRefine((values, ctx) => {
    if (values.password !== values.cpassword) {
      ctx.addIssue({
        code: "custom",
        path: ["cpassword"],
        message: "Passwords do not match.",
      });
    }
  });

const resolver = zodResolver(schema);

const onFormSubmit = (event: FormSubmitEvent) => {
  const existingLocalStorageData = localStorage.getItem(
    "OrchidStoreRegisteredAccount"
  );
  const existingCookieData = document.cookie
    .split("; ")
    .find((row) => row.startsWith("OrchidStoreLoginAccount="));

  if (existingLocalStorageData || existingCookieData) {
    console.log("Account data already exists. Skipping storage.");
    event.reset();

    router.push("/payment");
    return;
  }

  if (event.valid) {
    showToast(
      "success",
      "Success",
      "Login Successful, navigating to products page"
    );

    console.log(event.values);

    localStorage.setItem(
      "OrchidStoreRegisteredAccount",
      JSON.stringify(event.values)
    );
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 7);
    const expires = `expires=${expirationDate.toUTCString()}`;

    document.cookie = `OrchidStoreLoginAccount=${JSON.stringify(event.values)}; ${expires}; path=/`;

    event.reset();
    router.push("/payment");
  }
};
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
</style>
