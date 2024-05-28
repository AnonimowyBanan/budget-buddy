/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.{php, js}',
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('daisyui'),
  ],
}

