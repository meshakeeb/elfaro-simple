<?php
/**
 * Card episode
 */

use Elfaro\Helpers;

$bc = [ get_post_time( 'F j, Y', false, $post ) ];
$series = wp_get_post_terms( get_the_ID(), 'serie' );
$series = $series ? $series[0]->name : false;
$description = wp_trim_words( $post->post_content, 140 );
$audio = get_field( 'audio', get_post() );

$speed = Helpers::get_bandwidth_speed();
$is_flat = 'flat' === $args['type'];
$is_primary = 'primary' === $args['type'];

$classes = Helpers::classnames(
	'border border-gray-lighten rounded-lg bg-gray-light',
	'low' === $speed ? '' : 'grid',
	isset( $args['extra_classes'] ) ? $args['extra_classes'] : '',
	[
		'md:grid-cols-2 md:pl-6 lg:pl-7.5' => $is_primary,
		'grid-cols-3 md:grid-cols-none md:gap-x-2.5 md:p-6 lg:p-7.5' => $is_flat,
	]
);

$header_classes = Helpers::classnames(
	'w-full text-gray whitespace-nowrap uppercase tracking-widest',
	[
		'text-sm'            => $is_primary,
		'text-xs md:text-sm' => $is_flat,
		'col-span-2 col-start-2 md:col-span-4 md:col-start-1 px-2.5 pt-2.5 md:px-0 md:pt-0 md:pb-2.5' => $is_flat,
		'pt-4 px-4 md:pl-0 md:pr-6 md:pt-6 lg:pr-7.5 lg:pt-7.5' => $is_primary,
	]
);

$body_classes = Helpers::classnames(
	'flex flex-col flex-1',
	[
		'row-span-3 px-4 md:pl-0 md:pr-6 lg:pr-7.5' => $is_primary,
		'col-span-2 col-start-2 px-2.5 md:col-span-auto md:col-start-auto md:px-0' => $is_flat,
	]
);

$title_classes = Helpers::classnames(
	'font-serif text-navy mb-5',
	[
		'md:text-4xl lg:text-4xl mb-3 text-2xl' => $is_primary,
		'md:text-2xl lg:text-2xl mb-3 text-lg leading-4 lg:pt-0' => $is_flat,
	]
);
$footer_classes = Helpers::classnames(
	'flex items-end justify-between w-full',
	[
		'p-4 pt-12 md:pl-0 md:pb-6 md:pr-6 lg:pb-7.5 lg:pr-7.5 md:row-start-5' => $is_primary,
		'md:px-0 md:pt-4' => $is_flat || $is_primary,
		'col-span-2 col-start-2 md:col-span-4 md:col-start-1 row-start-4 px-2.5 pb-2.5 md:pb-0 md:col-start-auto md:col-span-auto md:row-start-auto' => $is_flat,
	]
);
?>
<article class="<?php echo esc_attr( $classes ); ?>">

	<p class="<?php echo esc_attr( $header_classes ); ?>"><?php echo implode( ' • ' , $bc ); // phpcs:ignore ?></p>

	<?php
	if ( has_post_thumbnail() ) {
		$image_classes = Helpers::classnames(
			'w-full rounded-lg h-full md:h-auto',
			[
				'row-start-1 row-span-4 md:row-start-auto md:row-span-auto md:w-15' => $is_flat,
				'md:row-span-5 order-first md:order-none' => $is_primary,
			]
		);
		the_post_thumbnail( 'medium', [ 'class' => $image_classes ] );
	}
	?>

	<div class="<?php echo esc_attr( $body_classes ); ?>">

		<?php if ( $is_primary && $series ) : ?>
		<p class="md:hidden lg:flex font-serif text-gray-black lg:text-xl italic mb-2"><span>Serie: </span><span><?php echo $series; // phpcs:ignore ?></span></p>
		<?php endif; ?>

		<?php if ( $is_primary || $is_flat ) : ?>
			<h2 class="<?php echo esc_attr( $title_classes ); ?>"><?php the_title(); ?></h2>
		<?php endif; ?>

		<?php if ( $is_primary && $description ) : ?>
		<div class="font-serif text-gray-black text-md md:text-lg lg:text-xl leading-snug md:leading-snug"><?php echo $description; // phpcs:ignore ?></div>
		<?php endif; ?>

	</div>

	<div class="<?php echo esc_attr( $footer_classes ); ?>">

		<button data-audio="<?php echo esc_url( $audio ); ?>" class="<?php echo esc_attr( Helpers::button_classes( 'border border-current text-gray hover:bg-gray h-9 px-0 w-24 justify-center js-play-audio' ) ); ?>">
			<span class="w-3 flex items-center justify-center toggle-play">
				<?php Helpers::icon( 'play', [ 'class' => 'w-full', 'fill' => 'currentColor', 'stroke-width' => '1.5' ] ); // phpcs:ignore ?>
			</span>
			<span class="w-3 flex items-center justify-center toggle-play hidden">
				<?php Helpers::icon( 'pause', [ 'class' => 'w-full', 'fill' => 'currentColor', 'stroke-width' => '1.5' ] ); // phpcs:ignore ?>
			</span>
			<span class="toggle-play"><?php esc_html_e( 'Play', 'elfaro' ); ?></span>
			<span class="toggle-play hidden"><?php esc_html_e( 'Pause', 'elfaro' ); ?></span>
		</button>

		<a href="<?php the_permalink(); // phpcs:ignore ?>" class="<?php echo esc_attr( Helpers::button_classes( 'h-9 px-0 text-gray hover:text-gray-black pl-4' ) ); ?>">
			<span>
				<span class="hidden md:inline-block"><?php esc_html_e( 'View', 'elfaro' ); ?></span> <?php esc_html_e( 'Series', 'elfaro' ); ?>
			</span>
			<?php Helpers::icon( 'arrow', [ 'class' => 'w-3.25' ] ); ?>
		</a>
	</div>

</article>
