<?php
/**
 * Elfaro Archive
 *
 * @package Elfaro
 */

use Elfaro\Post_Types;

$taxonomies = array_map(
	function( $tax ) {
		$taxonomy = get_taxonomy( $tax );
		if ( $taxonomy ) {
			return (object) [
				'slug'  => $tax,
				'label' => $taxonomy->label,
				'terms' => get_terms( $tax ),
			];
		}
	},
	[ Post_Types::CATEGORIES, Post_Types::SCRIPTURES ]
);

$title = get_queried_object()->name ? get_queried_object()->name : false;
if ( ! $title ) {
	$title = get_queried_object()->post_title;
}
?>
<div class="md:flex lg:block">
	<div class="md:w-1/2 lg:w-full">
		<h1 class="text-navy text-2xl font-serif md:text-3xl lg:text-4xl"><?php echo $title; ?></h1>
		<div class="text-gray-black font-serif lg:text-xl mt-3 prose"><?php the_field( 'blog_description', 'options' ); ?></div>
	</div>

	<div class="md:w-1/2 lg:w-full md:pl-5 lg:pl-0">
		<?php if ( $taxonomies ) : ?>
		<div class="mt-4 md:mt-0 lg:mt-7 text-sm text-navy tracking-widest uppercase">

			<h3 class="text-xs">Filter Episodes</h3>

			<div class="mt-3 js-tabs">

				<nav class="border border-navy-lighten cursor-pointer rounded grid grid-cols-2 gap-1.25 p-1.25 relative">
					<?php
					$first = true;
					foreach ( $taxonomies as $tax ) :
						$active = $first ? ' text-white' : '';
						$first = false;
						?>
					<span class="p-1.25 text-center z-10 transition<?php echo $active; ?>" data-target="#tax-<?php echo $tax->slug; ?>">
						<?php echo $tax->label; ?>
					</span>
					<?php endforeach; ?>

					<div class="absolute w-full h-full flex gap-1.25 p-1.25 pr-2.5">
						<span class="bg-navy-light rounded w-1/2 p-1.25 transition"></span>
					</div>
				</nav>

				<section class="flex overflow-x-hidden js-content">
					<?php foreach ( $taxonomies as $tax ) : ?>
					<div id="tax-<?php echo $tax->slug; ?>" class="w-full flex-shrink-0 transition transform">
						<ul class="flex flex-col space-y-2.5 my-5 font-serif text-base capitalize tracking-normal">
							<?php foreach ( $tax->terms as $term ) : ?>
							<li><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endforeach; ?>
				</section>
			</div>

		</div>
		<?php endif; ?>
	</div>
</div>
