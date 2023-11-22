import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            'bluish-purple': '#323377',
            'snow-white': '#D6F2FF',
            'light-gray': '#A1A1A1',
            'dark-gray': '#1A1A1A',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
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

    plugins: [forms],
};
