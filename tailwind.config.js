const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
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
                'sregs-display': ['"Sregs Serif Display"', 'serif'],

            },
            colors: {
                'primary': '#3EE88C',
                'primary-dark': '#2ECC91',
                'secondary': '#272838',
                'surface': '#F7F6F4',
                'sand': '#F5F0EB',
                'uteq-black':  '#262626',
                'floral-white': '#FEFAF2',
                gray: {
                    50:  '#FAFAF8',
                    100: '#F5F5F0',
                    200: '#E8E8E3',
                    300: '#D4D4CE',
                    400: '#A1A19A',
                    500: '#72726C',
                    600: '#53534E',
                    700: '#3D3D38',
                    800: '#272724',
                    900: '#1A1A17',
                    950: '#0F0F0D',
                },
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
