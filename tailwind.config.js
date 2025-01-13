/** @type {import('tailwindcss').Config} */
module.exports = {
    important: true,
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [require('flowbite/plugin','tailwindcss-plugins/pagination')
],
}
