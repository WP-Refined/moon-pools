module.exports = {
  mode: 'jit',
  theme: {
    extend: {
      colors: {
        'moon-purple': '#7849f6',
        'moon-green': '#39af77',
      },
      fontFamily: {
        nunito: ['Nunito', 'sans-serif'],
      },
    },
  },
  plugins: [],
  content: [
    './resources/js/**/*.{vue,js}',
    //'./resources/views/**/*.blade.php',
  ],
  colors: {
    highlight: '#39af77',
  },
};
