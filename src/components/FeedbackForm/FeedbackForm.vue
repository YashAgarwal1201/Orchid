<template>
  <div>
    <form @submit.prevent="onSubmit" class="flex flex-col gap-5 w-full">
      <div class="w-full flex flex-col gap-1">
        <div class="px-3 flex justify-between items-center">
          <label for="name">Name</label>
          <small v-if="errors.name" class="text-red-500">{{
            errors.name
          }}</small>
        </div>
        <Field name="name" v-slot="{ field, errorMessage }">
          <InputText
            id="name"
            v-bind="field"
            :class="{ '!rounded-2xl': true, 'p-invalid': errorMessage }"
          />
        </Field>
      </div>

      <div class="w-full flex flex-col gap-1">
        <div class="px-3 flex justify-between items-center">
          <label for="email">Email</label>
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
          <label for="message">Message</label>
          <small v-if="errors.message" class="text-red-500">{{
            errors.message
          }}</small>
        </div>
        <Field name="message" v-slot="{ field, errorMessage }">
          <Textarea
            id="message"
            v-bind="field"
            rows="4"
            :class="{
              'h-[150px] !rounded-2xl resize-none': true,
              'p-invalid': errorMessage,
            }"
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
  </div>
</template>

<script setup lang="ts">
import { Button, InputText, Textarea } from "primevue";
import { useForm, Field } from "vee-validate";
import * as yup from "yup";

// Define validation schema
const schema = yup.object({
  name: yup.string().required("Name is required"),
  email: yup
    .string()
    .required("Email is required")
    .email("Please enter a valid email"),
  message: yup
    .string()
    .required("Message is required")
    .min(10, "Message must be at least 10 characters")
    .max(250, "Message can be at most 250 characters long"),
});

// Initialize the form with vee-validate
const { handleSubmit, resetForm, meta, isSubmitting, errors } = useForm({
  validationSchema: schema,
  initialValues: {
    name: "",
    email: "",
    message: "",
  },
});

// Form submission handler
const onSubmit = handleSubmit((values) => {
  console.log("Form submitted:", values);
  // Here you would typically send the form data to your API
  // After successful submission, you might want to reset the form
  resetForm();
});
</script>

<style scoped>
.p-field {
  margin-bottom: 1rem;
}

.p-invalid {
  border-color: #f56c6c !important;
}
</style>
