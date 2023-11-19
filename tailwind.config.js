/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.{html,js}',
    './resources/views/index.html',
    
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")]
}

