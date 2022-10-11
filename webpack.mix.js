/**
 * External dependencies
 */
const mix = require( 'laravel-mix' )
const { join } = require('path')
require( 'laravel-mix-tailwind' )

/**
 * Webpack Config
 */
mix.webpackConfig(
	{
		externals: {
			jquery: 'jQuery',
			lodash: 'lodash',
			moment: 'moment'
		}
	}
)

mix.alias({
	'@root': join( __dirname, 'assets/src' )
})

/**
 * CSS
 */
mix
  .sass( 'assets/scss/theme.scss', 'assets/css/theme.css')
  .sass( 'assets/scss/editor.scss', 'assets/css/editor.css')
  .tailwind()

/**
 * JavaScript
 */
mix.js(
	'assets/src/theme.js',
	'assets/js/theme.js',
)

/**
 * Browsersync
 */
mix.browserSync( {
	proxy: 'http://elfaro.vm',
	ghostMode: false,
	notify: false,
	ui: false,
	open: true,
	online: false,
	files: [
		'assets/css/*.css',
		'assets/js/*.js',
		'**/*.php'
	],
} )
