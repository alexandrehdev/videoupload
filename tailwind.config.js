/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**.blade.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily :{
        roboto: ['"Roboto Condensed"', "sans-serif"],
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/forms'),
  ],
}

