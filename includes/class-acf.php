<?php
/**
 * ACF routine.
 *
 * @package elfaro
 */

namespace Elfaro;

/**
 * Class ACF
 */
class Acf {

	public function hooks() {
		add_action( 'acf/init', [ $this, 'add_option_page' ] );
		add_action( 'acf/init', [ $this, 'add_blocks' ] );
	}

	public function add_option_page() {
		if ( ! function_exists( 'acf_add_options_page' ) ) {
			return;
		}

		acf_add_options_page(
			[
				'page_title' => __( 'Theme Options', 'elfaro' ),
				'menu_title' => __( 'Theme Options', 'elfaro' ),
				'menu_slug'  => 'theme-options',
			]
		);
	}

	public function add_blocks() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}

		$blocks = [
			[
				'name'            => 'page-giveup',
				'title'           => __( 'Give Up', 'elfaro' ),
				'description'     => __( 'A custom block for give up page.', 'elfaro' ),
				'render_template' => 'template-parts/blocks/page-giveup.php',
			],
		];

		foreach ( $blocks as $block ) {
			acf_register_block_type( $block );
		}
	}
}
