<?php
/**
 * Content: Archive
 *
 * @package Elfaro
 */
?>
<section class="container">

	<div id="post-list" class="sm:grid gap-5 md:gap-10 mb-10 md:mb-15 relative mt-15">

		<?php
		if ( have_posts() ) {
			// Load posts loop.
			$counter = isset( $_GET['ajax'] ) ? 1 : 0;
			while ( have_posts() ) {
				the_post();

				$args = [
					'type'          => ! $counter ? 'primary' : 'flat',
					'extra_classes' => '',
				];
				get_template_part( 'template-parts/cards/card', 'list', $args );
				$counter++;
			}
		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content-none' );
		}
		?>

	</div>

	<?php get_template_part( 'template-parts/ajax-load-more' ); ?>

</section>
