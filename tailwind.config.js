/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    extend: {},
  },
  safelist: ['animate-[slide-right_1s_ease-in-out]'],
  plugins: [require("tw-elements/dist/plugin.cjs")],
  darkMode: "class"
}

