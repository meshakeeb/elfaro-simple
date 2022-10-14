<?php
/**
 * Block: Section Carousel
 *
 * @package Elfaro
 */

use Elfaro\Helpers;
use Elfaro\Post_Types;

$block_post_type = get_field( 'post_type' );
$query     = new WP_Query(
	[
		'post_type'      => $block_post_type,
		'posts_per_page' => 10,
	]
);

if ( ! $query->have_posts() ) {
	return;
}

$button_label = get_field( 'button_text' )
	? get_field( 'button_text' )
	: __( 'More', 'elfaro' );

$heading = get_field( 'heading' )
	? get_field( 'heading' )
	: __( 'Listen latest from El Faro', 'elfaro' );

$button_link = Post_Types::EPISODE === $block_post_type
	? home_url( 'programs' )
	: get_post_type_archive_link( $block_post_type );

wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );
?>

<section class="mt-10 md:mt-15 lg:mt-20 overflow-hidden">
	<div class="container">
		<div class="flex flex-row flex-wrap md:justify-between mb-10">
			<h2 class="font-serif text-navy text-3xl lg:text-4xl mb-5 md:mb-0 w-full md:w-auto"><?php echo esc_html( $heading ); ?></h2>

			<a href="<?php echo esc_url( $button_link ); ?>" class="<?php echo esc_attr( Helpers::button_classes( 'border border-current h-9 px-2 text-gray hover:bg-gray' ) ); ?>">
				<?php echo esc_html( $button_label ); ?>
				<?php Helpers::icon( 'arrow', [ 'class' => 'w-3.25' ] ); ?>
			</a>
		</div>

		<div class="relative">
			<div class="swiper-container">
				<div class="swiper-wrapper flex">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						$args = [
							'type'          => 'flat',
							'extra_classes' => '',
						];
						?>
						<div class="swiper-slide flex-shrink-0">
							<div class="md:hidden">
								<?php get_template_part( 'template-parts/cards/card', null, array_merge( $args, [ 'image_position' => 'top' ] ) ); ?>
							</div>
							<div class="hidden md:block">
								<?php get_template_part( 'template-parts/cards/card', null, $args ); ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>
