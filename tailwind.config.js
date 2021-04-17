const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: {
        content: [
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
            './resources/views/**/**/*.blade.php'],
        options: {
            safelist: ['py-2', 'pl-2', 'text-sm', 'font-medium', 'capitalize', 'transition', 'duration-200', 'ease-in-out', 'rounded-full'],
            blocklist: [/^debug-/],
            keyframes: true,
            fontFace: true,
        },
    },

    theme: {
        screens: {
            'xs': '375px',
            ...defaultTheme.screens,
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    lighter: '#6366F1',
                    DEFAULT: '#4F46E5',
                    darker: '#4338CA'
                },
                success: {
                    lighter: '#34D399',
                    DEFAULT: '#10B981',
                    darker: '#059669'
                },
                danger: {
                    lighter: '#EF4444',
                    DEFAULT: '#DC2626',
                    darker: '#B91C1C'
                },
                warning: {
                    lighter: '#FDE047',
                    DEFAULT: '#FACC15',
                    darker: '#F59E0B'
                },
                gray: colors.blueGray,
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
    ],
};
