const defaultTheme = require('tailwindcss/defaultTheme');
import preset from './vendor/filament/support/tailwind.config.preset';

module.exports = {
    preset: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './vendor/wire-elements/modal/src/ModalComponent.php',
        './vendor/filament/**/*.blade.php',
        './storage/framework/views/*.php',
        './app/**/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.{html,json,js,jsx,ts,tsx,vue,php}',
    ],
    safelist: [
        'sm:max-w-2xl'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Satoshi', ...defaultTheme.fontFamily.sans],
                display: ['Calistoga', 'Georgia', 'serif'],
                sregs: ['Calistoga', 'Georgia', 'serif'],
                'sregs-bold': ['Calistoga', 'Georgia', 'serif'],
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
