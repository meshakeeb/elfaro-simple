<?php
/**
 * Theme setup routine.
 *
 * @package elfaro
 */

namespace Elfaro;

defined( 'ABSPATH' ) || exit;

/**
 * Class Theme Setup
 */
class Theme_Setup {

	public function hooks() {
		add_action( 'after_setup_theme', [ $this, 'setup' ], 20 );

		if ( 'low' === Helpers::get_bandwidth_speed() ) {
			add_action( 'init', [ $this, 'disable_emojis' ] );
			add_filter( 'post_thumbnail_html', '__return_false' );
		}

		add_filter( 'pre_get_posts', [ $this, 'pre_get_posts' ] );
	}

	public function setup() {
		/**
		 * Disable full-site editing support.
		 *
		 * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
		 */
		remove_theme_support( 'block-templates' );

		/**
		 * Register the navigation menus.
		 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
		 */
		register_nav_menus(
			[
				'primary_navigation' => __( 'Primary Navigation', 'elfaro' ),
			]
		);

		/**
		 * Register the editor color palette.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
		 */
		add_theme_support( 'editor-color-palette', [] );

		/**
		 * Register the editor color gradient presets.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-gradient-presets
		 */
		add_theme_support( 'editor-gradient-presets', [] );

		/**
		 * Register the editor font sizes.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
		 */
		add_theme_support( 'editor-font-sizes', [] );

		/**
		 * Register relative length units in the editor.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#support-custom-units
		 */
		add_theme_support( 'custom-units' );

		/**
		 * Enable support for custom line heights in the editor.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#supporting-custom-line-heights
		 */
		add_theme_support( 'custom-line-height' );

		/**
		 * Enable support for custom block spacing control in the editor.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#spacing-control
		 */
		add_theme_support( 'custom-spacing' );

		/**
		 * Disable custom colors in the editor.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
		 */
		add_theme_support( 'disable-custom-colors' );

		/**
		 * Disable custom color gradients in the editor.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-gradients
		 */
		add_theme_support( 'disable-custom-gradients' );

		/**
		 * Disable custom font sizes in the editor.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
		 */
		add_theme_support( 'disable-custom-font-sizes' );

		/**
		 * Disable the default block patterns.
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
		 */
		remove_theme_support( 'core-block-patterns' );

		/**
		 * Enable plugins to manage the document title.
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable post thumbnail support.
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Enable wide alignment support.
		 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Enable responsive embed support.
		 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
		 */
		add_theme_support( 'responsive-embeds' );

		/**
		 * Enable automatic feed links support.
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable HTML5 markup support.
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
		 */
		add_theme_support(
			'html5',
			[
				'caption',
				'gallery',
				'search-form',
				'script',
				'style',
			]
		);

		/**
		 * Enable selective refresh for widgets in customizer.
		 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );
	}

	public function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	}

	public function pre_get_posts( $query ) {
		if ( is_tax( Post_Types::SERIES ) ) {
			$query->set( 'posts_per_page', -1 );
		}
	}
}
