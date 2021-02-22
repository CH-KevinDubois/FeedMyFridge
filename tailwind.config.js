const plugin = require('tailwindcss/plugin');

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    textColor: ({ after }) => after(['invalid']),
    extend: {
      transform: ['hover'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    plugin(function({ addVariant, e }) {
      addVariant('invalid', ({ modifySelectors, separator }) => {
        modifySelectors(({ className }) => {
          return `.${e(`invalid${separator}${className}`)}:invalid`
        })
      })
    })
  ],
}
