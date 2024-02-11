/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**.blade.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  fontFamily :{
    'body' : [
      'Roboto'
    ],
    'sans' : [
      'Roboto'
    ]
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

