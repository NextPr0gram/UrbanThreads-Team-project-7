import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: ["./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", "./storage/framework/views/*.php", "./resources/views/**/*.blade.php"],

    theme: {
        colors: {
            default: {
                black: "rgba(0, 0, 0, 1)",
                white: "rgba(255, 255, 255, 1)",
            },
            danger: {
                //red
                50: "rgba(252, 230, 230, 1)",
                75: "rgba(241, 150, 150, 1)",
                100: "rgba(236, 107, 107, 1)",
                200: "rgba(228, 43, 43, 1)",
                300: "rgba(222, 0, 0, 1)",
                400: "rgba(155, 0, 0, 1)",
                500: "rgba(135, 0, 0, 1)",
            },
            secondary: {
                //purple
                50: "rgba(243, 233, 250, 1)",
                75: "rgba(205, 164, 233, 1)",
                100: "rgba(185, 126, 224, 1)",
                200: "rgba(155, 70, 210, 1)",
                300: "rgba(134, 32, 201, 1)",
                400: "rgba(94, 22, 141, 1)",
                500: "rgba(82, 20, 123, 1)",
            },
            warning: {
                //orange
                50: "rgba(255, 248, 241, 1)",
                75: "rgba(255, 228, 196, 1)",
                100: "rgba(255, 217, 172, 1)",
                200: "rgba(255, 200, 136, 1)",
                300: "rgba(255, 189, 112, 1)",
                400: "rgba(179, 132, 78, 1)",
                500: "rgba(156, 115, 68, 1)",
            },
            success: {
                //green
                50: "rgba(230, 244, 234, 1)",
                75: "rgba(150, 211, 171, 1)",
                100: "rgba(107, 193, 136, 1)",
                200: "rgba(43, 166, 84, 1)",
                300: "rgba(0, 148, 49, 1)",
                400: "rgba(0, 104, 34, 1)",
                500: "rgba(0, 90, 30, 1)",
            },
            primary: {
                //blue
                50: "rgba(230, 235, 240, 1)",
                75: "rgba(150, 172, 192, 1)",
                100: "rgba(107, 138, 166, 1)",
                200: "rgba(43, 87, 128, 1)",
                300: "rgba(0, 53, 102, 1)",
                400: "rgba(0, 37, 71, 1)",
                500: "rgba(0, 32, 62, 1)",
            },
            neutral: {
                //very dark blue, use for text only
                0: "rgba(255, 255, 255, 1)",
                10: "rgba(250, 250, 250, 1)",
                20: "rgba(245, 245, 246, 1)",
                30: "rgba(235, 235, 236, 1)",
                40: "rgba(222, 223, 224, 1)",
                50: "rgba(191, 193, 196, 1)",
                60: "rgba(176, 178, 182, 1)",
                70: "rgba(163, 166, 170, 1)",
                80: "rgba(148, 151, 156, 1)",
                90: "rgba(133, 136, 142, 1)",
                100: "rgba(117, 121, 128, 1)",
                200: "rgba(102, 106, 114, 1)",
                300: "rgba(87, 91, 100, 1)",
                400: "rgba(74, 79, 88, 1)",
                500: "rgba(59, 64, 74, 1)",
                600: "rgba(46, 52, 62, 1)",
                700: "rgba(28, 34, 46, 1)",
                800: "rgba(13, 19, 32, 1)",
                900: "rgba(0, 7, 20, 1)",
            },
        },
        fontFamily: {
            lexend: ["Lexend Deca", "sans-serif"],
            "lexend-bold": ["Lexend Deca Bold", "sans-serif"],
            formula1: ["Formula1 Display Bold", "sans-serif"],
        },
        fontSize: {
            xs: "0.75rem", // Extra Small
            sm: "0.875rem", // Small
            base: "0.875rem", // Base
            lg: "1.25rem", // Large
            xl: "1.625rem", // Extra Large
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
        borderRadius: {
            sm: "4px",
            md: "6px",
            lg: "8px",
        },
        extend: {
            backgroundImage: {
                "background-image": "linear-gradient(to right top, #d6f2ff, #a8cee7, #80aad0, #5f86b8, #46629e, #39528c, #2d427a, #203369, #18315d, #162f50, #182c43, #1b2836)",
            },

            maxWidth: {
                "8xl": "112.5rem", // 1800px
            },
            borderWidth: {
                3: "3px",
            },
        },
    },

    plugins: [forms, require("tailwindcss-animated")],
};
