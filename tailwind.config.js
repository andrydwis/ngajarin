const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        content: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/views/**/**/*.blade.php'],
        options: {
            safelist: ['bg-red-500', 'px-4'],
            blocklist: [/^debug-/],
            keyframes: true,
            fontFace: true,
        },
    },

    theme: {
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
                }
            }
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
    ],
};
