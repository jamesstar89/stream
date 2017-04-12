var webpack = require('webpack');
var path = require('path');

var config = {
  entry: path.resolve(__dirname, './src/js/app.js'),
  output: {
    path: path.resolve(__dirname, './static'),
    publicPath: '/static',
    filename: 'app.min.js'
  },
  module: {
    loaders: [
      {
        test: /\.scss$/,
        loaders: ['style', 'css', 'sass']
      },
      {
        test: /\.(js|jsx)?$/,
        exclude: /node_modules/,
        loader: 'babel',
        query: {
          presets: ['es2015', 'react', 'stage-0']
        }
      },
      { 
        test: /\.svg$/,
        loader: 'svg-inline'
      }
    ]
  }
}

module.exports = config;
