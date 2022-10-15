<?php
/**
 * The main template file
 *
 * Template Name: Page Content Center
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

	<div class="flex flex-col flex-1">
		<div class="flex flex-col xl:flex-row flex-1 justify-center">
			<main id="main" role="main" class="space-y-5 md:space-y-10 lg:space-y-15 flex-1">
				<?php
				if ( have_posts() ) {
					// Load posts loop.
					while ( have_posts() ) {
						the_post();

						?>
						<article <?php echo post_class( 'container lg:max-w-3xl my-10 md:my-15 lg:my-20 space-y-10 md:space-y-15 lg:space-y-20 post-19 page type-page status-publish hentry' ); ?>>

							<section class="entry-content prose-2xl text-navy">
								<?php the_title( '<h2>', '</h2>' ); ?>
								<?php the_content(); ?>
							</section>

						</article>

						<?php
					}
				} else {
					// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/content/content-none' );
				}
				?>
			</main>

		</div>

		<?php get_template_part( 'template-parts/footer' ); ?>

	</div>

<?php
get_footer();
