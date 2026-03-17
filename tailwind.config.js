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
                sregs: ['SregsSerifDisplay-SemiBold', 'sans-serif'],
                'sregs-bold': ['Sregs Serif Free', 'sans-serif'],

            },
            colors: {
                'primary': '#01DC82',
                'primary-dark': '#00B86B',
                'secondary': '#272838',
                'surface': '#F7F6F4',
                'sand': '#F5F0EB',
                'uteq-black':  '#262626',
                'floral-white': '#FEFAF2',
                'uteq-yellow': '#FFD501',
                'uteq-blue': '#3559FE',
            },
            transitionTimingFunction: {
                'out-expo': 'cubic-bezier(0.16, 1, 0.3, 1)',
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
