<script setup lang="ts">
import PageLayout from "@/layout/PageLayout.vue";
import {
  Button,
  FloatLabel,
  InputText,
  Select,
  Step,
  StepList,
  StepPanel,
  StepPanels,
  Stepper,
  Textarea,
} from "primevue";
</script>

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
            <Step value="2">Choose mode of Payemnt</Step>
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
                  >
                    <div>
                      <FloatLabel variant="on">
                        <InputText
                          id="username"
                          class="!rounded-2xl w-full"
                          required
                          maxlength="70"
                        />
                        <label for="username">Full Name</label>
                      </FloatLabel>
                    </div>

                    <div>
                      <FloatLabel variant="on">
                        <InputText
                          id="email"
                          type="email"
                          class="!rounded-2xl w-full"
                          required
                          maxlength="70"
                        />
                        <label for="username">E-mail Address</label>
                      </FloatLabel>
                    </div>

                    <div>
                      <FloatLabel variant="on">
                        <Textarea
                          id="username"
                          class="!rounded-2xl resize-none w-full"
                          required
                          maxlength="750"
                        />
                        <label for="username">Your Address</label>
                      </FloatLabel>
                    </div>

                    <div class="w-full flex justify-between">
                      <Button
                        type="reset"
                        outlined
                        rounded
                        size="small"
                        icon="pi pi-trash"
                        label="Clear Form"
                      />
                      <Button
                        type="button"
                        rounded
                        size="small"
                        icon="pi pi-check"
                        label="Save details"
                      />
                    </div>
                  </form>
                </div>
              </div>
              <div class="flex pt-6 justify-end">
                <Button
                  label="Next"
                  icon="pi pi-arrow-right"
                  iconPos="right"
                  @click="activateCallback('2')"
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
                      Choose you payment option
                    </h2>
                    <span class="text-sm sm:text-base"
                      >(from the list below)</span
                    >
                  </div>
                  <div>
                    <Select
                      class="w-full xs:w-[300px] !rounded-full"
                      placeholder="Select an option"
                    />
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
                  @click="activateCallback('3')"
                  rounded
                />
              </div>
            </StepPanel>

            <StepPanel
              v-slot="{ activateCallback }"
              value="3"
              class="p-2 md:p-3 rounded-3xl"
            >
              <div class="flex flex-col h-48">
                <div
                  class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded-3xl bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium"
                >
                  Content III
                </div>
              </div>
              <div class="pt-6">
                <Button
                  label="Back"
                  outlined
                  icon="pi pi-arrow-left"
                  @click="activateCallback('2')"
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
