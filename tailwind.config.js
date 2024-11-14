/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      screens: {
        xs: '480px',
        mdl: '896px',
        '3xl': '1700px',
      },
    },
  },
  plugins: [],
}
