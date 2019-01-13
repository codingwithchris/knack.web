/**
 * Webpack V4
 *
 * @description A totally custom, totally awesome implementation of Webpack
 * for a modern Wordpress build process.
 *
 * @author  CreativeFuse
 * @since   1.0.0
 *
 * WP JS Coding Standards Reference:
 * @see https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/javascript/
 *
 * Awesome Webpack References
 * @see https://hackernoon.com/a-tale-of-webpack-4-and-how-to-finally-configure-it-in-the-right-way-4e94c8e7e5c1
 * @see https://medium.freecodecamp.org/how-to-develop-react-js-apps-fast-using-webpack-4-3d772db957e4
 */

/**
 * Pull in all of our Webpack Plugin Dependencies
 */
const BrowserSyncPlugin = require( 'browser-sync-webpack-plugin' );
const CleanObsoleteChunks = require( 'webpack-clean-obsolete-chunks' );
const CleanWebpackPlugin = require( 'clean-webpack-plugin' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );
const Sass = require( 'sass' );
const ExtractCssChunks = require( 'extract-css-chunks-webpack-plugin' );
const Fiber = require( 'fibers' );
const FriendlyErrorsWebpackPlugin = require( 'friendly-errors-webpack-plugin' );
const SpriteLoaderPlugin = require( 'svg-sprite-loader/plugin' );
const StyleLintPlugin = require( 'stylelint-webpack-plugin' );
const WebpackAssetsManifest = require( 'webpack-assets-manifest' );
const WebpackMd5Hash = require( 'webpack-md5-hash' );

// Used to get user home directory in Browsersync for custom SSL cert
const userHome = require( 'user-home' );

/**
 * Define relative path for resolving outputs
 */
const path = require( 'path' );

/**
 * Define devMode based on the command run at
 * the start of the build process. This allows
 * us to easily handle dev and production builds differently.
 */
const devMode = process.env.NODE_ENV !== 'production';

/**
 * Quick settings for the current project
 */
const projectSettings = {

    // Replace with the local dev URL for your site
    proxy: 'https://knack.build',

    jsEntryFiles: {
        app: './resources/assets/js/app.js',
        critical: './resources/assets/js/critical.js',
        project: './resources/assets/js/project.js',
    },
};

/**
 * Webpack Configuration
 */
const config = {
    entry: projectSettings.jsEntryFiles,

    devtool: devMode ? 'none' : 'none',

    output: {
        path: path.resolve( __dirname, '_dist' ),

        filename: devMode ? 'js/[name].js' : 'js/[name].[chunkhash].bundle.js',
        chunkFilename: devMode ? 'js/[name].js' : 'js/[name].[chunkhash].js',
        sourceMapFilename: '[file].map',
    },

    // Define libraries loaded outside our webpack environment
    externals: {

        jquery: 'jQuery',

    },

    module: {
        rules: [
            /**
			 * Babel Loader.
			 *
			 * A compiler that allows us to:
			 * 1. Use the latest JS standards without breaking stuff on non-compatible browsers.
			 * 2. Runs our JS through our linting setup
			 *
			 * @kind    loader
			 * @see     https://github.com/babel/babel-loader
			 * @since   1.0.0
			 */
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                use:
                ['babel-loader', 'eslint-loader'],
            },

            /**
			 * SCSS Loader w/ POSTCss
			 *
			 * @kind    loader
			 * @since   1.0.0
			 * @uses    ExtractCssChunks
			 */
            {
                test: /\.scss$/,
                use: [
                    'style-loader',
                    ExtractCssChunks.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true,
                        },
                    },
                    'postcss-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                            implementation: Sass,
                            fiber: Fiber,
                        },
                    },
                ],
            },

            /**
			 * Font Loader
			 */
            {
                test: /\.(woff|woff2)(\?v=\d+\.\d+\.\d+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts/',
                            publicPath:
								'../wp-content/themes/fuse/_dist/fonts/',
                        },
                    },
                ],
            },

            /**
			 * SVG Sprite Loader.
			 *
			 * A loader to handle managing our SVG sprites.
			 *
			 * @kind    loader
			 * @see https://github.com/kisenka/svg-sprite-loader
			 * @see https://github.com/rpominov/svgo-loader
			 * @see https://github.com/svg/svgo
			 * @since   1.0.0
			 */

            {
                test: /\.svg$/,
                include: [path.resolve( __dirname, 'resources/assets/icons' )],
                use: [
                    {
                        loader: 'svg-sprite-loader',
                        options: {
                            extract: true,
                            spriteFilename: devMode
                                ? 'sprite.svg'
                                : 'sprite.svg',
                        },
                    },

                    {
                        loader: 'svgo-loader',
                        options: {
                            plugins: [
                                { cleanupAttrs: true },
                                { removeTitle: true },
                                { removeUselessStrokeAndFill: true },
                                { convertColors: { shorthex: false } },
                                { convertShapeToPath: true },
                                { removeAttrs: { attrs: '(stroke|fill)' } },
                                { removeMetadata: true },
                            ],
                        },
                    },
                ],
            },
        ],
    },

    plugins: [
        /**
		 * ExtractCssChunks
		 *
		 * @description Create CSS files from our SCSS files and bundle them together. Note that we
		 * are using hashing on production only for cache busting.
		 * @see   https://github.com/faceyspacey/extract-css-chunks-webpack-plugin
		 * @since 1.0.0
		 *
		 */

        new ExtractCssChunks({
            filename: devMode
                ? 'css/[name].css'
                : 'css/[name].[contenthash].bundle.css',
            chunkFilename: devMode
                ? 'css/[id].css'
                : 'css/[id].[contenthash].bundle.css',
            hot: true, // optional is the plugin cannot automatically detect if you are using HOT, not for production use
            orderWarning: true, // Disable to remove warnings about conflicting order between imports
            reloadAll: true, // when desperation kicks in - this is a brute force HMR flag
        }),

        /**
		 * StyleLintPlugin.
		 *
		 * A Stylelint plugin for webpack.
		 *
		 * @see   https://github.com/webpack-contrib/stylelint-webpack-plugin
		 * @since 1.0.0
		 *
		 */
        new StyleLintPlugin({
            configFile: '.stylelintrc',
            failOnError: false,
            files: '**/*.scss',
            quiet: false,
        }),

        /**
		 * WebpackMd5Hash
		 *
		 * @description Plugin to replace a standard webpack chunkhash with md5. This
		 * hashing is used for our production files ONLY.
		 *
		 * @since  1.0.0
		 * @see https://github.com/erm0l0v/webpack-md5-hash
		 */
        new WebpackMd5Hash(),

        /**
		 * BrowserSyncPlugin
		 *
		 * @since  1.0.0
		 *
		 * @see https://github.com/Va1/browser-sync-webpack-plugin
		 * @description Implement BrowserSync to use live reloading auto style-injecting
		 * when assets are compiled. We are not using Webpack Dev Server because it
		 * is a pain in the ass to configure with WordPress. Unfortunately this means
		 * we can not use Hot Module Replacement though :(
		 *
		 * @todo Find a way to implement Hot Module Reloading
		 */
        new BrowserSyncPlugin({

            // The server to proxy to our localhost
            proxy: projectSettings.proxy,

            // browse to https://localhost:8000/ during development
            host: 'localhost',
            port: 8000,

            // Auto-inject css changes
            injectCss: true,

            /**
             * Developers please follow these articles to get your SSL installed locally and become your own CA:
             * https://deliciousbrains.com/ssl-certificate-authority-for-local-https-development/
             * https://blogjunkie.net/2017/04/enable-https-localhost-browsersync/
             *
             * Note 1 - Replace any domain reference with `localhost`
             *
             * Note 2 - When creating the localhost.ext file, use `localhost:3000` and `localhost:8000`
             * for DNS 2 and 3.
             *
             * Note 3 - Be sure to create a `.localhost-ssl` folder in your user root to hold your files.
             */
            https: {
                key: `${userHome}/.localhost-ssl/localhost.key`,
                cert: `${userHome}/.localhost-ssl/localhost.crt`,
            },

            // Which files trigger a page reload when modified?
            files: [
                '**/*.php',
                '_dist/*.js',
                '_dist/*.svg',
                '_dist/*.jpg',
                '_dist/*.png',
            ],

            open: false,
            reloadDelay: false,
        }),

        /**
		 * FriendlyErrorsWebpackPlugin
		 *
		 * @description recognizes certain classes of webpack errors and cleans, aggregates
		 * and prioritizes them to provide a better Developer Experience.
		 *
		 * @since  1.0.0
		 * @see https://github.com/geowarin/friendly-errors-webpack-plugin
		 */
        new FriendlyErrorsWebpackPlugin({}),

        /**
		 * CleanWebpackPlugin
		 *
		 * @description Delete files in specified folder when a new build is run. Note that the the specified folder is removed
		 * before our build process runs. If the build process throws a fatal error, the site will break. When this happens,
		 * the error must be fixed, and we must stop terminal and re-initialize the build process.
		 *
		 * @since  1.0.0
		 * @see https://github.com/johnagan/clean-webpack-plugin/
		 */
        new CleanWebpackPlugin( '_dist', {}),

        /**
		 * CleanObsoleteChunks
		 *
		 * @description Clean old hashed files when new ones are
		 * generated when using --watch. This was implemented because
		 * clean-webpack-plugin only works when the initial build is run
		 * and would leave all the old files behind when new ones are recompiled
		 * with new hashes.
		 *
		 * @since  1.0.0
		 * @see https://github.com/GProst/webpack-clean-obsolete-chunks
		 */
        new CleanObsoleteChunks({}),

        /**
		 * CopyWebpackPlugin
		 *
		 * @description Some files do not need to be processed
		 * when our build process is run and they simply need
		 * to be copied to our dist folder. This plugin
		 * handles those instances.
		 *
		 * @since 1.0.0
		 * @see https://github.com/webpack-contrib/copy-webpack-plugin
		 */
        new CopyWebpackPlugin([
            // Copy images to dist
            {
                from: './resources/assets/images/**/*',
                to: './images/',
                flatten: true,
            },

            // Copy fonts to dist
            {
                from: './resources/assets/fonts/**/*',
                to: './fonts/',
                flatten: true,
            },
        ]),

        /**
		 * WebpackAssetsManifest
		 *
		 * @description This Webpack plugin will generate a JSON file that matches
		 * the original filename with the new hashed name. This will help us
		 * when it comes time to load our assets on our production site. We
		 * can simply reference the key of the file name and get the hashed file.
		 * This allows us to implement a better cache busting system (no more query string cache issues).
		 *
		 * @since  1.0.0
		 * @see https://github.com/webdeveric/webpack-assets-manifest
		 */
        new WebpackAssetsManifest({}),

        /**
		 * SpriteLoaderPlugin
		 *
		 * Takes SVGs processed by `svg-sprite-loader` and extracts
		 * them into a sprite.
		 *
		 * @since 1.0.0
		 * @see https://github.com/kisenka/svg-sprite-loader
		 */
        new SpriteLoaderPlugin({ plainSprite: true }),
    ],

    /**
	 * Webpack Terminal Stats
	 *
	 * @description I like the way Roots/Sage looks when running a build,
	 * so I grabbed their stats settings.
	 *
	 * @since  1.0.0
	 * @see https://github.com/roots/sage/blob/master/resources/assets/build/webpack.config.js#L25
	 */
    stats: {
        hash: false,
        version: false,
        timings: false,
        children: false,
        errors: false,
        errorDetails: false,
        warnings: false,
        chunks: false,
        modules: false,
        reasons: false,
        source: false,
        publicPath: false,
    },
};

module.exports = config;
