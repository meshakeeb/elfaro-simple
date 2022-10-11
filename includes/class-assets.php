<?php
/**
 * Assets routine.
 *
 * @package elfaro
 */

namespace Elfaro;

/**
 * Class Assets
 */
class Assets {

	public function hooks() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'block_editor' ] );
	}

	public function enqueue() {
		$speed = Helpers::get_bandwidth_speed();
		if ( 'high' === $speed ) {
			wp_enqueue_style(
				'fonts.css',
				'https://cloud.typography.com/6693076/6033232/css/fonts.css',
				null,
				'1.0.0'
			);
		}

		wp_enqueue_style(
			'theme',
			get_template_directory_uri() . '/assets/css/theme.css',
			null,
			'1.0.0'
		);

		if ( 'low' === $speed ) {
			wp_dequeue_style( 'wp-block-library' );
			wp_dequeue_style( 'wp-block-library-theme' );
			wp_dequeue_style( 'wc-blocks-style' );
		}

		wp_enqueue_script(
			'elfaro-app',
			get_template_directory_uri() . '/assets/js/theme.js',
			[ 'jquery' ],
			'1.0.0',
			true
		);

		if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	public function block_editor() {
		wp_enqueue_script(
			'elfaro-editor',
			get_template_directory_uri() . '/assets/js/editor.js',
			[ 'jquery' ],
			'1.0.0',
			true
		);

		wp_enqueue_style(
			'editor',
			get_template_directory_uri() . '/assets/css/editor.css',
			null,
			'1.0.0'
		);
	}
}
