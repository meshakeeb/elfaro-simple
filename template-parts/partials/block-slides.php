<?php
/**
 * Block: Image
 */

use Elfaro\Helpers;

$slides = get_field( 'slides' );

wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );
?>
<div class="relative">
	<div class="swiper swiper-container manual w-full">
		<div class="swiper-wrapper">
			<?php foreach ( $slides as $slide ) : ?>
			<div class="swiper-slide flex items-center justify-center">
				<img class="block w-full rounded-lg object-cover" src="<?php echo $slide; ?>" alt="">
			</div>
			<?php endforeach; ?>
		</div>

		<button class="swiper-btn-prev absolute top-1/2 left-4 z-10">
			<span class="flex itetms-centter justify-center h-9 w-9 -mt-4 text-navy-light bg-gray-light border rounded-full hover:text-white hover:bg-navy-light transition" aria-hidden="true">
				<?php Helpers::icon( 'arrow', [ 'class' => 'w-4 transform rotate-180' ] ); ?>
			</span>
			<span class="sr-only">Skip to previous slide</span>
		</button>

		<button class="swiper-btn-next absolute top-1/2 right-4 z-10">
			<span class="flex itetms-centter justify-center h-9 w-9 -mt-4 text-navy-light bg-gray-light border rounded-full hover:text-white hover:bg-navy-light transition" aria-hidden="true">
				<?php Helpers::icon( 'arrow', [ 'class' => 'w-4' ] ); ?>
			</span>
			<span class="sr-only">Skip to next slide</span>
		</button>

		<div class="swiper-custom-pagination flex mx-auto mt-3 gap-2 justify-center"></div>

	</div>
</div>
