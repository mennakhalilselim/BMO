import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', 'Cascadia Code', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'bmo': '#00bfa5',
                'dark-900': '#0e1217',
                'dark-800': '#1c1f26',
                'dark-700': '#2d323c',
                'dark-600': '#42464f',
                'dark-400': '#a8b3cf',
            },
        },

       
    },

    plugins: [forms],
};

