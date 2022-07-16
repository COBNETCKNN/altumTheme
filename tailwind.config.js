module.exports = {
    content: require('fast-glob').sync([
        './**/*.php'
    ]),
    theme: {
      extend: {
        fontFamily: {
          'montserrat': ['Montserrat'],
        },
        colors: {
          altumBrown: '#323232',

      },
      },
    },
    plugins: [],
}