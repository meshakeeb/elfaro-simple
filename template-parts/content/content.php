<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elfaro
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			[
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'elfaro' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'elfaro' ),
			]
		);

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
