/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      screens: {
        '3xs': '240px',
        '2xs': '360px',
        'xs': '420px'
      },
      colors: {
        'primary': '#0736ED',
        'green-sea': '#14C2AD',
        'violet': '#7013F2',
      }
    },
  },
  plugins: [],
}

