import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        colors: {
            "bluish-purple": "#323377",
            "snow-white": "#D6F2FF",
            "light-gray": "#A1A1A1",
            "navy-blue": "#1B2836",
            "black": "#000000",
            "transparent": "transparent",
            "white": "#FFFFFF",
            "red": "#b91c1c",
            "green": "#32CD32",
        },
        fontFamily: {
            "lexend": ["Lexend Deca", "sans-serif"],
            "lexend-bold": ["Lexend Deca Bold", "sans-serif"],
            "formula1": ["Formula1 Display Bold", "sans-serif"],
        },
        extend: {
            backgroundImage: {
                "background-image": "linear-gradient(to right top, #d6f2ff, #a8cee7, #80aad0, #5f86b8, #46629e, #39528c, #2d427a, #203369, #18315d, #162f50, #182c43, #1b2836)",
            },
            fontSize: {
                "xs": "0.75rem", // Extra Small
                "sm": "0.875rem", // Small
                "base": "0.875rem", // Base
                "lg": "1.25rem", // Large
                "xl": "1.625rem", // Extra Large
                "2xl": "1.875rem", // 2 Extra Large
                "3xl": "1.875rem", // 3 Extra Large
                "4xl": "2.25rem", // 4 Extra Large
                "5xl": "3rem", // 5 Extra Large
                "6xl": "4rem", // 6 Extra Large
                "7xl": "4.5rem", // 7 Extra Large
                "8xl": "6rem", // 8 Extra Large
                "9xl": "8rem", // 9 Extra Large
                // Add more custom sizes as needed
            },
            maxWidth: {
                "8xl": "112.5rem", // 1800px
            },
            borderWidth: {
                "3": "3px",
            },
        },
    },

    plugins: [forms],
};
