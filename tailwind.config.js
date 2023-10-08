/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./**/*.view.php"
    ],
    theme: {
        extend: {
            gridTemplateAreas: {
                book_wide: [
                    'img info price',
                    'img info price'
                ],
                book_medium: [
                    'img info',
                    'img price'
                ],
                book_tablet: [
                    'img img',
                    'info price',
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

