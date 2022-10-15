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
	'border border-gray-lighten rounded-lg bg-gray-light card-list-item',
	'low' === $speed ? '' : 'grid',
	isset( $args['extra_classes'] ) ? $args['extra_classes'] : '',
	[
		'md:grid-cols-2'                                                           => $is_primary,
		'custom-grid mt-10 md:mt-0 md:grid-cols-none md:gap-x-2.5 md:p-6 lg:p-7.5' => $is_flat,
	]
);

$body_classes = Helpers::classnames(
	'flex',
	[
		'justify-between w-full p-0'      => $is_flat,
		'flex-col flex-1 row-span-3 px-5' => $is_primary,
	]
);

$footer_classes = Helpers::classnames(
	'items-end justify-between w-full',
	[
		'p-4 pt-12 md:pl-0 md:pb-6 md:pr-6 lg:pb-7.5 lg:pr-7.5 md:row-start-5'                                                                       => $is_primary,
		'md:px-0 md:pt-4'                                                                                                                            => $is_flat || $is_primary,
		'col-span-2 col-start-2 md:col-span-4 md:col-start-1 row-start-4 px-2.5 pb-2.5 md:pb-0 md:col-start-auto md:col-span-auto md:row-start-auto' => $is_flat,
	]
);
?>
<article class="<?php echo esc_attr( $classes ); ?>">

	<div class="flex space-x-5">

		<?php
		if ( $is_flat ) {
			get_template_part( 'template-parts/cards/card-thumbnail' );
		}
		?>

		<div class="<?php echo esc_attr( $body_classes ); ?>">

			<div>

				<?php get_template_part( 'template-parts/cards/card-header', 'grid' ); ?>

				<?php get_template_part( 'template-parts/cards/card-title', 'list' ); ?>

				<?php get_template_part( 'template-parts/cards/card-author', 'list' ); ?>

				<?php get_template_part( 'template-parts/cards/card-description' ); ?>

			</div>

			<div>

				<div class="hidden md:flex <?php echo esc_attr( $footer_classes ); ?>">

					<?php get_template_part( 'template-parts/cards/card-button-read' ); ?>

					<?php get_template_part( 'template-parts/cards/card-button-play' ); ?>

					<?php get_template_part( 'template-parts/cards/card-button-view' ); ?>

				</div>

			</div>

		</div>

	</div>

	<?php
	if ( $is_primary ) {
		get_template_part( 'template-parts/cards/card-thumbnail' );
	}
	?>

	<div class="flex md:hidden <?php echo esc_attr( $footer_classes ); ?>">

		<?php get_template_part( 'template-parts/cards/card-button-read' ); ?>

		<?php get_template_part( 'template-parts/cards/card-button-play' ); ?>

		<?php get_template_part( 'template-parts/cards/card-button-view' ); ?>

	</div>

</article>
