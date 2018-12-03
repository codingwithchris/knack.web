/**
 * Post CSS Config
 * Parts Reference
 * @ref https://www.postcss.parts/
 * @github https://github.com/postcss/postcss
 */

const devMode = process.env.NODE_ENV !== 'production';

module.exports = {
    sourceMap: true,
    plugins: {
    	'postcss-minify-font-values': {},
    	'postcss-merge-longhand': {},
        'autoprefixer': {},
        'postcss-clean': { format: devMode ? 'beautify' : '' },
        'css-mqpacker': { sort: true },
    },
}
