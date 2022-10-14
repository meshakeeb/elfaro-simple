<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elfaro
 */

?>
<section class="no-results not-found flex items-center justify-center">
	<div class="pt-8">
		<header class="page-header alignwide">
			<h1 class="page-title font-bold text-2xl py-8"><?php esc_html_e( 'Nothing here', 'elfaro' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content default-max-width">

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'elfaro' ); ?></p>

			<div class="border px-4 py-2 mt-4">
				<?php get_search_form(); ?>
			</div>

		</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->
