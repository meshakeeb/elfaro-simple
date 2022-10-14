<?php
/**
 * Block: Top section
 */

use Elfaro\Helpers;
use Elfaro\Post_Types;

$query = new WP_Query(
	[
		'post_type'      => [ Post_Types::BLOG, Post_Types::EPISODE ],
		'posts_per_page' => 3,
	]
);

if ( ! $query->have_posts() ) {
	return;
}
?>

<section class="container grid lg:grid-cols-2 xl:grid-cols-14 gap-5 my-10 md:my-15 lg:my-20">
	<?php
	$counter = 0;
	while ( $query->have_posts() ) :
		$query->the_post();
		$classes = Helpers::classnames(
			[
				'md:row-span-2 md:col-span-2 xl:col-span-10' => 0 === $counter,
				'md:col-span-1 xl:col-span-4' => $counter > 0,
				'xl:order-first'              => 1 === $counter,
			]
		);
		$args = [
			'type'          => ! $counter ? 'primary' : 'flat',
			'extra_classes' => $classes,
		];
		get_template_part( 'template-parts/cards/card', null, $args );
		$counter++;
	endwhile;
	?>
</section>
