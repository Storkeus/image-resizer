// webpack v4
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: {main: './app/js/index.js'},
    mode: 'development',
    watch:true,
    watchOptions: {
        ignored: /node_modules/
      },
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: 'js/main.js'
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                  loader: 'babel-loader',
                  options: {
                    presets: ['@babel/preset-env']
                  }
                }
              },
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract(
                        {
                            fallback: 'style-loader',
                            use: [{loader: 'css-loader', options: {minimize: true}}, 'sass-loader']
                        })
            },
                        {
                test: /\.css$/,
                use: ExtractTextPlugin.extract(
                        {
                            fallback: 'style-loader',
                            use: [{loader: 'css-loader', options: {minimize: true}}, 'sass-loader']
                        })
            },
            {test: /\.(png|woff|woff2|eot|ttf|svg|jpg|gif)$/, loader: 'url-loader?limit=100000'}
        ]
    },
    plugins: [
        new ExtractTextPlugin({filename: 'css/style.css'})
    ]
};
;
