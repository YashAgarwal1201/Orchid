/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      screens: {
        xs: "480px",
        mdl: "896px",
        "3xl": "1700px",
      },
    },
  },
  plugins: [
    function ({ addUtilities }) {
      addUtilities({
        ".scrollbar-hide": {
          "scrollbar-width": "none" /* Firefox */,
          "-ms-overflow-style": "none" /* IE and Edge */,
          "&::-webkit-scrollbar": {
            display: "none" /* Chrome, Safari, and Opera */,
          },
        },
        ".scrollbar-show": {
          "scrollbar-width": "auto",
          "-ms-overflow-style": "auto",
          "&::-webkit-scrollbar": {
            display: "block",
          },
        },
      });
    },
  ],
};
