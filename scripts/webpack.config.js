'use strict';

const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const AssetsPlugin = require('assets-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const path = require('path');
const fs = require('fs');
const globImporter = require('node-sass-glob-importer');

// Make sure any symlinks in the project folder are resolved:
// https://github.com/facebookincubator/create-react-app/issues/637
const appDirectory = fs.realpathSync(process.cwd());

function resolveApp(relativePath) {
  return path.resolve(appDirectory, relativePath);
}

const paths = {
  appSrc: resolveApp('src'),
  appBuild: resolveApp('build'),
  appIndexJs: resolveApp('src/index.js'),
  appNodeModules: resolveApp('node_modules'),
};

const DEV = process.env.NODE_ENV === 'development';

module.exports = {
  bail: !DEV,
  mode: DEV ? 'development' : 'production',
  // We generate sourcemaps in production. This is slow but gives good results.
  // You can exclude the *.map files from the build during deployment.
  target: 'web',
  devtool: DEV ? 'cheap-module-source-map' : 'source-map',
  entry: {
    frontend: [paths.appIndexJs],
    backend: ['./src/login.scss', './src/editor.scss'],
  },
  output: {
    path: paths.appBuild,
    filename: DEV ? '[name].js' : '[name].[contenthash:8].js',
    publicPath: '',
  },
  module: {
    rules: [
      // Disable require.ensure as it's not a standard language feature.
      { parser: { requireEnsure: false } },
      // Transform ES6 with Babel
      {
        test: /\.js?$/,
        loader: 'babel-loader',
        include: paths.appSrc,
      },
      {
        test: /.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              sourceMap: true,
            },
          },
          {
            loader: "postcss-loader",
            options: {
              sourceMap: true,
              postcssOptions: {
                plugins: [
                  autoprefixer({
                    grid: "no-autoplace"
                  })
                ]
              }
            }
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: true,
              sassOptions: {
                importer: globImporter()
              }
            }
          }
        ],
      },
      {
        test: /\.(woff(2)?|ttf|otf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]',
            outputPath: 'fonts',
            esModule: false
          }
        }]
      },
      {
        test: /\.(jpg|png)$/,
        use: {
          loader: "file-loader",
          options: {
            name: '[name].[ext]',
            outputPath: 'assets/images',
            esModule: false
          }
        }
      }
    ],
  },
  optimization: {
    minimize: !DEV,
    minimizer: [
      new CssMinimizerPlugin({
        minimizerOptions: {
          preset: [
            'default',
            {
              discardComments: { removeAll: true },
            },
          ],
        },
      }),
      new TerserPlugin({
        terserOptions: {
          compress: {
            warnings: false
          },
          output: {
            comments: false
          }
        }
      })
    ]
  },
  plugins: [
    !DEV && new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: DEV ? '[name].css' : '[name].[contenthash:8].css'
    }),
    new webpack.EnvironmentPlugin({
      NODE_ENV: 'development', // use 'development' unless process.env.NODE_ENV is defined
      DEBUG: false,
    }),
    new AssetsPlugin({
      path: paths.appBuild,
      filename: 'assets.json',
    }),
    DEV &&
    new BrowserSyncPlugin({
      notify: false,
      host: 'localhost',
      port: 4000,
      logLevel: 'silent',
      files: ['**/**/*.php', '**/**/*.html'],
      proxy: 'http://localhost:9009/',
    }),
  ].filter(Boolean),
};
