import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    ],
    safelist: [
        {
            pattern: /^(bg|text)-(purple|blue|green|yellow|pink|indigo|red|teal|orange|cyan)-(100|700|800)$/,
        },
    ],
    theme: {
        extend: {},
    },
    plugins: [
        daisyui,
    ],
}
