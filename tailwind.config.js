/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        "./**/*.view.{php,html}"
    ],
    theme: {
        extend: {
            colors: {
                "primaryLight": "#334155",
                "primaryDark": "rgb(226 232 240)",
                "bgDark": "#0F172A",
                "bgLight": "#ffffff",
                "divideDark": "rgb(226 232 240)",
                "divideLight": "#000000"
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

