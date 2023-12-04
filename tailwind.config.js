/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily : {
        montserrat : ['Montserrat', 'sans-serif'],
        bebas : ['Bebas Neue', 'sans-serif'],
        caveat : ['Caveat', 'cursive']
      },
      colors : {
        'primary' : '#191D88',
        'secondary' : '#7C93C3',
        'teks' : '#9EB8D9',
        'background' : '#EEF5FF'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

