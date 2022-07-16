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
          altumFont: '#505050',
          altumTitle: '#323232',
          altumContent: '#1B1B1B',
          altumBlue: '#22BAC9',

      },
      },
    },
    plugins: [],
}