/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './assets/js/**/*.js',
    './**/*.php',
  ],
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1440px',
    },
    extend: {
      container: {
        center: true,
        padding: {
          DEFAULT: '1.25rem',
          md: '2.5rem',
          lg: '3.75rem',
        },
      },
      colors: {
        aqua: {
          DEFAULT: 'var(--color-aqua)',
          light: 'var(--color-aqua-light)',
          lighten: 'var(--color-aqua-lighten)',
          dark: 'var(--color-aqua-dark)',
          darken: 'var(--color-aqua-darken)',
        },
        navy: {
          DEFAULT: 'var(--color-navy)',
          light: 'var(--color-navy-light)',
          lighten: 'var(--color-navy-lighten)',
          dark: 'var(--color-navy-dark)',
        },
        gray: {
          DEFAULT: 'var(--color-gray)',
          light: 'var(--color-gray-light)',
          lighten: 'var(--color-gray-lighten)',
          dark: 'var(--color-gray-dark)',
          darken: 'var(--color-gray-darken)',
          black: '#333',
        },
      },
      spacing: {
        '1.25': '.3125rem',
        '3.25': '.8125rem',
        '7.5': '1.875rem',
        '15': '3.75rem',
        '100': '25rem',
      },
      gridTemplateColumns: {
        '14': 'repeat(14, minmax(0, 1fr))',
      },
      maxWidth: {
       '1/4': '25%',
       '1/2': '50%',
       '3/4': '75%',
       '2/5': '40%',
       '3/5': '60%',
      },
      borderRadius: {
        DEFAULT: '3px',
        lg: '6px',
      },
      fontSize: {
        xs: '.625rem',
        sm: '.8125rem',
        '4xl': '2.5rem',
      },
      fontFamily: {
        sans: ['"Gotham SSm A"', '"Gotham SSm B"', 'sans-serif'],
        serif: ['"Chronicle Text G1 A"', '"Chronicle Text G1 B"', 'serif'],
      },
    },
  },
  variants: {
    extend: {
      borderWidth: ['hover'],
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
