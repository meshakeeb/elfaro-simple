<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elfaro
 */

get_header(); ?>

	<aside class="xl:flex xl:flex-col p-5 md:p-15 xl:py-15 w-full xl:w-1/4 bg-gray-light border-r border-gray-lighten">
		<?php get_template_part( 'template-parts/sidebar/search' ); ?>
	</aside>

	<div class="flex flex-col flex-1">
		<div class="flex flex-col xl:flex-row flex-1 justify-center">

			<main id="main" role="main" class="space-y-5 md:space-y-10 lg:space-y-15 flex-1">
				<?php get_template_part( 'template-parts/content/content-search' ); ?>
			</main>

		</div>

		<?php get_template_part( 'template-parts/footer' ); ?>

	</div>

<?php
get_footer();
