<template>
  <PageLayout>
    <div class="w-full h-full flex flex-col gap-y-10">
      <div
        class="w-full h-[100px] sm:h-[200px] flex justify-center items-center"
      >
        <h1 class="text-xl sm:text-2xl md:text-3xl xl:text-4xl">
          Confirm your payment
        </h1>
      </div>
      <div class="w-full flex justify-center">
        <Stepper value="1" linear class="w-full md:w-[768px]">
          <StepList>
            <Step value="1">Enter your address</Step>
            <Step value="2">Choose mode of Payment</Step>
            <Step value="3">Make payment</Step>
          </StepList>

          <StepPanels>
            <StepPanel
              v-slot="{ activateCallback }"
              value="1"
              class="p-2 md:p-3 rounded-3xl"
            >
              <div class="flex flex-col">
                <div
                  class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded-3xl bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium"
                >
                  <form
                    class="w-full py-10 px-3 md:px-4 flex flex-col gap-y-10"
                    @submit.prevent
                  >
                    <div class="w-full flex flex-col gap-1">
                      <div class="px-3 flex justify-between items-center">
                        <label for="fullName">Full Name</label>
                        <small
                          v-if="fullNameError"
                          class="p-error block mt-1"
                          >{{ fullNameError }}</small
                        >
                      </div>
                      <InputText
                        id="fullName"
                        v-model="fullName"
                        class="!rounded-2xl w-full"
                        :class="{ 'p-invalid': fullNameError }"
                        required
                        maxlength="70"
                      />
                    </div>

                    <div class="w-full flex flex-col gap-1">
                      <div class="px-3 flex justify-between items-center">
                        <label for="email">E-mail Address</label>
                        <small v-if="emailError" class="p-error block mt-1">{{
                          emailError
                        }}</small>
                      </div>

                      <InputText
                        id="email"
                        v-model="email"
                        type="email"
                        class="!rounded-2xl w-full"
                        :class="{ 'p-invalid': emailError }"
                        required
                        maxlength="70"
                      />
                    </div>

                    <div class="w-full flex flex-col gap-1">
                      <div class="px-3 flex justify-between items-center">
                        <label for="address">Your Address</label>
                        <small v-if="addressError" class="p-error block mt-1">{{
                          addressError
                        }}</small>
                      </div>
                      <Textarea
                        id="address"
                        v-model="address"
                        class="!rounded-2xl resize-none w-full"
                        :class="{ 'p-invalid': addressError }"
                        required
                        maxlength="750"
                      />
                    </div>
                  </form>
                </div>
              </div>
              <div class="flex pt-6 justify-between">
                <Button
                  type="button"
                  outlined
                  rounded
                  size="small"
                  icon="pi pi-trash"
                  label="Clear details"
                  @click="clearForm"
                />
                <Button
                  label="Next"
                  icon="pi pi-arrow-right"
                  iconPos="right"
                  @click="nextToPaymentMethod(activateCallback)"
                  rounded
                />
              </div>
            </StepPanel>

            <StepPanel
              v-slot="{ activateCallback }"
              value="2"
              class="p-2 md:p-3 rounded-3xl"
            >
              <div class="flex flex-col h-80">
                <div
                  class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded-3xl bg-surface-50 dark:bg-surface-950 flex-auto flex flex-col justify-center items-center gap-y-5 md:gap-y-7 font-medium"
                >
                  <div class="text-center">
                    <h2 class="text-lg sm:text-xl md:text-2xl">
                      Choose your payment option
                    </h2>
                    <span class="text-sm sm:text-base"
                      >(from the list below)</span
                    >
                  </div>
                  <div>
                    <Select
                      v-model="paymentMethod"
                      :options="paymentOptions"
                      optionLabel="name"
                      optionValue="code"
                      class="w-full xs:w-[300px] !rounded-full"
                      :class="{ 'p-invalid': paymentMethodError }"
                      placeholder="Select a payment method"
                    />
                    <small
                      v-if="paymentMethodError"
                      class="p-error block mt-1"
                      >{{ paymentMethodError }}</small
                    >
                  </div>
                </div>
              </div>
              <div class="flex pt-6 justify-between">
                <Button
                  label="Back"
                  outlined
                  icon="pi pi-arrow-left"
                  @click="activateCallback('1')"
                  rounded
                />
                <Button
                  label="Next"
                  icon="pi pi-arrow-right"
                  iconPos="right"
                  @click="nextToFinalStep(activateCallback)"
                  rounded
                />
              </div>
            </StepPanel>

            <StepPanel
              v-slot="{ activateCallback }"
              value="3"
              class="p-2 md:p-3 rounded-3xl"
            >
              <div class="flex flex-col">
                <div
                  class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded-3xl bg-surface-50 dark:bg-surface-950 p-6 flex-auto flex flex-col gap-y-6"
                >
                  <h2 class="text-lg sm:text-xl md:text-2xl text-center">
                    Order Summary
                  </h2>

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div
                      class="border border-surface-200 dark:border-surface-700 rounded-xl p-4"
                    >
                      <h3 class="text-base font-medium mb-2 underline">
                        Delivery Details
                      </h3>
                      <div class="flex flex-col gap-y-2">
                        <p>
                          <span class="font-medium">Name:</span>
                          {{ formValues.fullName }}
                        </p>
                        <p>
                          <span class="font-medium">Email:</span>
                          {{ formValues.email }}
                        </p>
                        <p>
                          <span class="font-medium">Address:</span>
                          {{ formValues.address }}
                        </p>
                      </div>
                    </div>

                    <div
                      class="border border-surface-200 dark:border-surface-700 rounded-xl p-4"
                    >
                      <h3 class="text-base font-medium mb-2 underline">
                        Payment Details
                      </h3>
                      <div class="flex flex-col gap-y-2">
                        <p>
                          <span class="font-medium">Payment Method:</span>
                          {{
                            paymentOptions.find(
                              (option) =>
                                option.code === formValues.paymentMethod
                            )?.name || "Not selected"
                          }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pt-6 flex items-center justify-between">
                <Button
                  label="Back"
                  outlined
                  icon="pi pi-arrow-left"
                  @click="activateCallback('2')"
                  rounded
                />
                <Button
                  label="Complete Payment"
                  icon="pi pi-check"
                  severity="success"
                  @click="processPayment"
                  rounded
                />
              </div>
            </StepPanel>
          </StepPanels>
        </Stepper>
      </div>
    </div>
  </PageLayout>
</template>

<script setup lang="ts">
import PageLayout from "@/layout/PageLayout.vue";
import {
  Button,
  InputText,
  Select,
  Step,
  StepList,
  StepPanel,
  StepPanels,
  Stepper,
  Textarea,
} from "primevue";
import { useField, useForm } from "vee-validate";
import * as yup from "yup";
import { ref } from "vue";
import toastHandler from "@/composables/toastHandeler";
import { useRouter } from "vue-router";
import { useShoppingCartStore } from "@/stores/shoppingCartStore";

const router = useRouter();
const { showToast } = toastHandler();

const shoppingCartStore = useShoppingCartStore();

// Define validation schemas for each step
const addressSchema = yup.object({
  fullName: yup
    .string()
    .required("Full name is required")
    .max(70, "Name is too long"),
  email: yup
    .string()
    .email("Enter a valid email address")
    .required("Email is required")
    .max(70, "Email is too long"),
  address: yup
    .string()
    .required("Address is required")
    .max(250, "Address is too long"),
});

const paymentMethodSchema = yup.object({
  paymentMethod: yup.string().required("Please select a payment method"),
});

// Payment form state
const formValues = ref({
  fullName: "",
  email: "",
  address: "",
  paymentMethod: "",
});

// Set up form validation with initial values
const { handleSubmit, resetForm } = useForm({
  validationSchema: addressSchema,
  initialValues: {
    fullName: formValues.value.fullName,
    email: formValues.value.email,
    address: formValues.value.address,
  },
});

// Set up individual fields
const { value: fullName, errorMessage: fullNameError } =
  useField<string>("fullName");
const { value: email, errorMessage: emailError } = useField<string>("email");
const { value: address, errorMessage: addressError } =
  useField<string>("address");

// Separate form setup for step 2
const paymentForm = useForm({
  validationSchema: paymentMethodSchema,
  initialValues: {
    paymentMethod: formValues.value.paymentMethod,
  },
});

const { value: paymentMethod, errorMessage: paymentMethodError } =
  useField<string>("paymentMethod");

// Available payment methods
const paymentOptions = ref([
  { name: "Credit Card", code: "CC" },
  { name: "PayPal", code: "PP" },
  { name: "Bank Transfer", code: "BT" },
  { name: "Cash on Delivery", code: "COD" },
]);

// Step navigation with validation
const validateAndProceed = handleSubmit(
  (values) => {
    formValues.value.fullName = values.fullName;
    formValues.value.email = values.email;
    formValues.value.address = values.address;
    showToast("success", "Success", "Address details saved");
    return true;
  },
  () => {
    showToast("error", "Error", "Please fix the errors before proceeding");
    return false;
  }
);

const validatePaymentMethod = paymentForm.handleSubmit(
  (values) => {
    formValues.value.paymentMethod = values.paymentMethod;
    showToast("success", "Success", "Payment method selected");
    return true;
  },
  () => {
    showToast("error", "Error", "Please select a payment method");
    return false;
  }
);

// Clear form fields
const clearForm = () => {
  resetForm();
  showToast("info", "Info", "Form has been reset");
};

// Process the final payment
const processPayment = () => {
  showToast("success", "Payment Successful", "Your order has been placed!");
  // Here you would typically handle the actual payment processing

  setTimeout(() => {
    shoppingCartStore.clearCart();
    router.push("/");
  }, 1000);
};

// Handle step navigation with validation
const nextToPaymentMethod = async (activate: (value: string) => void) => {
  const isValid = await validateAndProceed();
  if (isValid) {
    activate("2");
  }
};

const nextToFinalStep = async (activate: (value: string) => void) => {
  const isValid = await validatePaymentMethod();
  if (isValid) {
    activate("3");
  }
};
</script>
