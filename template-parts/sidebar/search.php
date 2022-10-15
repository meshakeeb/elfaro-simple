<?php
/**
 * Elfaro Archive
 *
 * @package Elfaro
 */

use Elfaro\Post_Types;
?>
<div class="md:flex justify-between xl:block">

	<div>
		<h1 class="text-navy text-2xl font-serif md:text-3xl lg:text-4xl mb-5">
			<?php
			printf(
				'%s “%s”',
				esc_html__( 'Search results for', 'elfaro' ),
				get_search_query()
			);
			?>
		</h1>
		<p class="mb-6 text-lg">
			<?php esc_html_e( 'A search results description goes here. This searches everything on the entire site.', 'elfaro' ); ?>
		</p>
	</div>

	<div class="md:pl-5 lg:pl-0">
		<?php get_template_part( 'template-parts/forms/search', null, [ 'in_sidebar' => true ] ); ?>
	</div>

</div>
