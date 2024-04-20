/* eslint-disable eol-last */
/* eslint-disable global-require */
/* eslint-disable import/no-extraneous-dependencies */
/* eslint-disable quotes */
const { addDynamicIconSelectors } = require("@iconify/tailwind");
const defaultTheme = require("tailwindcss/defaultTheme");
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            screens: {
                "3xl": "1920px",
            },
            fontFamily: {
                sans: ['"Poppins"', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            {
                lightdim: {
                    ...require("daisyui/src/theming/themes")["dark"],
                    "color-scheme": "light",
                    neutral: "#4C566A",
                    "neutral-content": "#D8DEE9",
                    "base-100": "#ECEFF4",
                    "base-200": "#E5E9F0",
                    "base-300": "#D8DEE9",
                    "base-content": "#2E3440",
                },
            },
            "dark",
            "light",
            "dark",
            "cupcake",
            "bumblebee",
            "emerald",
            "corporate",
            "synthwave",
            "retro",
            "cyberpunk",
            "valentine",
            "halloween",
            "garden",
            "forest",
            "aqua",
            "lofi",
            "pastel",
            "fantasy",
            "wireframe",
            "black",
            "luxury",
            "dracula",
            "cmyk",
            "autumn",
            "business",
            "acid",
            "lemonade",
            "night",
            "coffee",
            "winter",
            "dim",
            "nord",
            "sunset",
        ],
    },
    darkMode: ["selector", '[data-theme="dark"]'],
    plugins: [
        require("@tailwindcss/typography"),
        addDynamicIconSelectors(),
        require("daisyui"),
    ],
};
//* npx tailwindcss -i ./assets/tailwind.css -o ./assets/style.css --watch
