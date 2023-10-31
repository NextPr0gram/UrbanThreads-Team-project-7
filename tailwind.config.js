/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './html/**/*.{html,js}',
    './javascript/**/*.{html,js}',
    './index.html'
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")]
}

