/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}", "./components/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Montserrat", "Arial", "sans-serif"],
        grotesk: ["HKGrotesk", "sans"],
      },
    },

    container: {
      screens: {
        "3xl": "1750px",
      },
    },
  },
  plugins: [],
};
