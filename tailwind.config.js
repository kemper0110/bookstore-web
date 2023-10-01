/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./**/*.view.php"
  ],
  theme: {
    extend: {
      gridTemplateColumns: {
          book_wide: "minmax(min(500px,100%),1fr) 1fr 1fr",
          book_medium: "auto 1fr",
          book_mobile: "1fr"
      },
      gridTemplateAreas: {
        book_wide: [
            'img info price',
            'img info price'
        ],
        book_medium: [
            'img info',
            'img price'
        ],
        book_mobile: [
            'img',
            'info',
            'price'
        ]
      }
    },
  },
  plugins: [
    require('@savvywombat/tailwindcss-grid-areas')
  ],
}

