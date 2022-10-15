<?php
/**
 * Content: Archive Series
 *
 * @package Elfaro
 */

use Elfaro\Post_Types;

?>
<section class="container">

	<div id="post-list" class="sm:grid gap-5 md:gap-10 mb-10 md:mb-15 relative md:grid-cols-2 lg:grid-cols-3 mt-16">

		<?php
		$items = ( new WP_Term_Query(
			[
				'taxonomy'  => Post_Types::SERIES,
				'post_type' => Post_Types::EPISODE,
				'number'    => 0,
			]
		) )->get_terms();

		if ( $items ) {
			// Load posts loop.
			foreach ( $items as $item ) {
				set_query_var( 'item', $item );
				get_template_part( 'template-parts/cards/card-term' );
			}
		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content-none' );
		}
		?>

	</div>

</section>
