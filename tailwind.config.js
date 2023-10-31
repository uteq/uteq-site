const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        './app/**/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Satoshi', ...defaultTheme.fontFamily.sans],
                sregs: ['SregsSerifDisplay-SemiBold', 'sans-serif'],
                'sregs-bold': ['Sregs Serif Free', 'sans-serif'],

            },
            colors: {
                'primary': '#01DC82',
                'secondary': '#272838',
                'uteq-black':  '#262626',
                'floral-white': '#FEFAF2',
                'uteq-yellow': '#FFD501',
                'uteq-blue': '#3559FE',
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
