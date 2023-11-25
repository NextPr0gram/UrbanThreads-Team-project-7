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
            'navy-blue': '#1B2836',

        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            borderWidth: {
                '3': '3px',
              },
        },
    },

    plugins: [forms],
};
