import "./assets/main.css";

import { createApp } from "vue";
import { createPinia } from "pinia";
import Aura from "@primevue/themes/aura";
import App from "./App.vue";
import router from "./router";
import PrimeVue from "primevue/config";
import { definePreset } from "@primevue/themes";
import Tooltip from "primevue/tooltip";

// import { Theme } from '@primevue/themes'

const app = createApp(App);

app.use(createPinia());
app.use(PrimeVue, {
  theme: {
    preset: definePreset(Aura, {
      semantic: {
        primary: {
          50: "{violet.50}",
          100: "{violet.100}",
          200: "{violet.200}",
          300: "{violet.300}",
          400: "{violet.400}",
          500: "{violet.500}",
          600: "{violet.600}",
          700: "{violet.700}",
          800: "{violet.800}",
          900: "{violet.900}",
          950: "{violet.950}",
        },
      },
    }),
  },
});
app.directive("tooltip", Tooltip);

router.afterEach((to) => {
  const defaultTitle = "My Vite App";
  document.title = (to.meta?.title as string) || defaultTitle;
});

app.use(router);

app.mount("#app");
