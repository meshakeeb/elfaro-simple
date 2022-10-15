<?php
/**
 * Content: Archive
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

global $wp_query;
?>
<section class="container">

	<div class="h-12 lg:h-15 flex items-center justify-end">

		<div class="text-navy-light js-post-view">

			<nav class="border border-navy-lighten cursor-pointer rounded grid grid-cols-2 gap-1.25 p-1.25 relative">

				<span class="p-1.25 text-center z-10 transition text-white" data-target=".card-list-item">
					<?php Helpers::icon( 'toggle-list', [ 'class' => 'w-2.5' ] ); ?>
				</span>

				<span class="p-1.25 text-center z-10 transition" data-target=".card-grid-item">
					<?php Helpers::icon( 'toggle-grid', [ 'class' => 'w-2.5' ] ); ?>
				</span>

				<div class="absolute w-full h-full flex gap-1.25 p-1.25 pr-2.5">
					<span class="bg-navy-light rounded w-1/2 p-1.25 transition"></span>
				</div>
			</nav>

		</div>

	</div>

	<div id="post-list" class="sm:grid gap-5 md:gap-10 mb-10 md:mb-15 relative">

		<?php
		if ( have_posts() ) {
			// Load posts loop.
			$counter = 0;
			while ( have_posts() ) {
				the_post();

				$args = [
					'type'          => ! $counter ? 'primary' : 'flat',
					'extra_classes' => '',
				];
				get_template_part( 'template-parts/cards/card', 'grid', $args );
				get_template_part( 'template-parts/cards/card', 'list', $args );
				$counter++;
			}
		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content-none' );
		}
		?>

	</div>

	<?php if ( $wp_query->max_num_pages > 0 ) : ?>
	<div class="h-12 lg:h-15 mb-10 md:mb-15 lg:mb-20 flex items-center justify-center">
		<button class="<?php echo Helpers::button_classes( 'bg-navy hover:bg-navy-dark text-base text-white gap-4 md:h-14' ); ?>">
			<?php Helpers::icon( 'plus', [ 'class' => 'w-4' ] ); ?>
			<?php esc_html_e( 'Load more results', 'elfaro' ); ?>
		</button>
	</div>
	<?php endif; ?>

</section>
