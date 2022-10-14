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

    <!-- @hasSection('sidebar-left')
      @yield('sidebar-left')
    @endif -->

	<div class="flex flex-col flex-1">
		<div class="flex flex-col xl:flex-row flex-1 justify-center">
			<main id="main" role="main" class="space-y-5 md:space-y-10 lg:space-y-15 flex-1">
				<?php
				if ( have_posts() ) {
					// Load posts loop.
					while ( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
					}
				} else {
					// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/content/content-none' );
				}
				?>
			</main>

			<!-- @hasSection('sidebar-right')
				@yield('sidebar-right')
			@endif -->
		</div>

		<?php get_template_part( 'template-parts/footer' ); ?>

	</div>

<?php
get_footer();
