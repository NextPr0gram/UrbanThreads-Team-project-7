/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.{html,js}',
    './resources/views/index.html',
    
  ],
  theme: {
    extend: {
      fontSize: {
        'xs': '0.75rem',    // Extra Small
        'sm': '0.875rem',   // Small
        'base': '0.875rem', // Base
        'lg': '1.25rem',    // Large
        'xl': '1.625rem',   // Extra Large
        '2xl': '1.875rem',  // 2 Extra Large
        '3xl': '1.875rem',  // 3 Extra Large
        '4xl': '2.25rem',   // 4 Extra Large
        '5xl': '3rem',      // 5 Extra Large
        '6xl': '4rem',      // 6 Extra Large
        // Add more custom sizes as needed
      },
    },
  },
  plugins: [require("daisyui")]
}

