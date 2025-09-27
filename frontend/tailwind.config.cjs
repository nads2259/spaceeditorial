const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: ['./index.html', './src/**/*.{ts,tsx}'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"DM Sans"', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        brand: {
          base: '#0f172a',
          accent: '#ff6b35',
          light: '#f8fafc',
        },
      },
    },
  },
  plugins: [],
};
