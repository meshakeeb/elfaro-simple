<?php
/**
 * Block: Imagery
 */

use Elfaro\Helpers;

$speed = Helpers::get_bandwidth_speed();
$text = get_field( 'text' );
$link = get_field( 'link' );
$position = get_field( 'slides_position' );
?>
<section class="py-10">

	<div class="container flex flex-col lg:grid lg:grid-cols-2 lg:gap-15 items-center">

		<?php
		if ( 'high' === $speed ) {
			$slides = get_field( 'slides' );

			if ( ! empty( $slides ) ) {
				$count = count( $slides );
				get_template_part( 'template-parts/partials/block-' . ( 1 === $count ? 'image' : 'slides' ) );
			}
		}
		?>

		<div class="flex flex-col<?php echo 'right' === $position ? ' lg:order-first' : ''; ?>">
			<?php if ( $text ) : ?>
			<div class="py-5 lg:py-0 text-navy-light font-serif text-xl md:text-2xl prose">
				<?php echo $text; ?>
			</div>
			<?php endif; ?>

			<?php if ( $link ) : ?>
			<div class="flex mt-10">
				<a href="<?php echo esc_url( $link['url'] ); ?>" class="self-start bg-aqua hover:bg-aqua-lighten flex items-center px-4 py-2 rounded-lg text-white uppercase text-sm tracking-widest" <?php echo $link['target'] ? 'target="_blank"' : ''; ?>>
					<?php echo $link['title']; ?>
					<?php Helpers::icon( 'arrow', [ 'class' => 'h-3 ml-1.5' ] ); ?>
				</a>
			</div>
			<?php endif; ?>
		</div>

	</div>

</section>
