<?php
/**
 * Card episode
 */

use Elfaro\Helpers;
use Elfaro\Post_Types;

$speed = Helpers::get_bandwidth_speed();
$is_flat = 'flat' === $args['type'];
$is_primary = 'primary' === $args['type'];
set_query_var( 'is_flat', $is_flat );
set_query_var( 'is_primary', $is_primary );

$is_episode = Post_Types::EPISODE === get_post_type();

set_query_var( 'is_card_button_play', $is_episode );
set_query_var( 'is_card_button_view', $is_episode );
set_query_var( 'is_card_button_read', ! $is_episode );

$classes = Helpers::classnames(
	'border border-gray-lighten rounded-lg bg-gray-light card-grid-item hidden',
	'low' === $speed ? '' : 'grid',
	isset( $args['extra_classes'] ) ? $args['extra_classes'] : '',
	[
		'flex flex-col col-span-3 md:grid-cols-2'      => $is_primary,
		'mt-10 sm:mt-0 md:grid-cols-none md:gap-x-2.5' => $is_flat,
	]
);

$body_classes = Helpers::classnames(
	'flex flex-col px-5',
	[
		'py-4'              => $is_flat,
		'flex-1 row-span-3' => $is_primary,
	]
);

$footer_classes = Helpers::classnames(
	'flex items-end justify-between w-full',
	[
		'py-4 md:pl-0 md:pb-6 md:pr-6 lg:pb-7.5 lg:pr-7.5 md:row-start-5' => $is_primary,
		'md:px-0 md:pt-4'                                                 => $is_flat || $is_primary,
		'pt-4'                                                            => $is_flat,
	]
);
?>
<article class="<?php echo esc_attr( $classes ); ?>">

	<?php
	if ( $is_flat ) {
		get_template_part( 'template-parts/cards/card-thumbnail', 'grid' );
	}
	?>

	<div class="<?php echo esc_attr( $body_classes ); ?>">

		<?php get_template_part( 'template-parts/cards/card-header', 'grid' ); ?>

		<?php get_template_part( 'template-parts/cards/card-title', 'grid' ); ?>

		<?php get_template_part( 'template-parts/cards/card-author', 'grid' ); ?>

		<?php get_template_part( 'template-parts/cards/card-description' ); ?>

		<div class="<?php echo esc_attr( $footer_classes ); ?>">

			<?php get_template_part( 'template-parts/cards/card-button-read' ); ?>

			<?php get_template_part( 'template-parts/cards/card-button-play' ); ?>

			<?php get_template_part( 'template-parts/cards/card-button-view' ); ?>

		</div>

	</div>

	<?php
	if ( $is_primary ) {
		get_template_part( 'template-parts/cards/card-thumbnail', 'grid' );
	}
	?>

</article>
