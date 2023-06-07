const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const { VueLoaderPlugin } = require('vue-loader');

const devMode = process.env.NODE_ENV !== 'production';

module.exports = {
    entry: {app: './assets/js/app.js'},
    devtool: devMode ? 'source-map' : false,
    output: {
        filename: '[name].min.js',
        path: path.resolve(__dirname, 'dist'),
        clean: !devMode
    },
    watchOptions: {
        ignored: /node_modules/,
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    reactivityTransform: true
                }
            },
            {
                test: /\.(scss)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [
                                    'autoprefixer'
                                ]
                            }
                        }
                    },
                    'sass-loader'
                ]
            },
            {
                test: /\.(woff(2)?|eot|ttf|otf)$/,
                type: 'asset/resource'
            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                type: 'asset/resource',
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin(
            {
                filename: '[name].min.css'
            }
        ),
        new VueLoaderPlugin()
    ],
    optimization: {
        minimize: !devMode,
        minimizer: [
            new CssMinimizerPlugin(),
            new TerserPlugin({
                test: /\.js(\?.*)?$/i,
            })
        ],
        splitChunks: {
            cacheGroups: {
                vendorsJS: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendors',
                    chunks: 'all',
                },
                appCSS: {
                    name: 'app',
                    test: /app\.s?css$/,
                    chunks: 'all',
                    enforce: true,
                },
                vendorsCSS: {
                    name: 'vendors',
                    test: /vendors\.s?css$/,
                    chunks: 'all',
                    enforce: true,
                },
            },
        },
    },
    resolve: {
        alias: {
            vue: devMode ? 'vue/dist/vue.esm-browser.js' : 'vue/dist/vue.esm-browser.prod.js'
        }
    }
};