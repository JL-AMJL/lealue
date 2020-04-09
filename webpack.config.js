const path = require("path");

module.exports = {
  entry: {
    "./js/gutenberg": "./build/gutenberg.js"
  },
  output: {
    path: path.resolve(__dirname),
    filename: "[name].min.js"
  },
  watch: true,
  devtool: "cheap-eval-source-map",
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"]
          }
        }
      }
    ]
  },
  plugins: []
};
