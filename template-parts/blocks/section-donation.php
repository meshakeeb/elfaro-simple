<?php
/**
 * Block: Donation
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

$speed = Helpers::get_bandwidth_speed();
$text = get_field( 'text' );
$image = get_field( 'image' );
?>
<section class="bg-gray-light py-7 md:py-15">

	<div class="container flex flex-col lg:grid lg:grid-cols-10 lg:gap-24 items-center">

		<div class="flex flex-col md:h-5/6 lg:col-span-4">

			<div class="text-sm text-navy tracking-widest uppercase js-tabs">

				<nav class="border border-navy-lighten cursor-pointer rounded grid grid-cols-2 gap-1.25 p-1.25 relative">
					<span class="p-1.25 text-center z-10 transition text-white" data-target="#onetime-form">
						One-Time
					</span>
					<span class="p-1.25 text-center z-10 transition" data-target="#monthly-form">
						Monthly
					</span>

					<div class="absolute w-full h-full flex gap-1.25 p-1.25 pr-2.5">
						<span class="bg-navy-light rounded w-1/2 p-1.25 transition" :class="{'transform translate-x-full': toggle}"></span>
					</div>
				</nav>

				<section class="flex overflow-x-hidden js-content">
					<div id="onetime-form" class="w-full flex-shrink-0 transition transform">
						<?php get_template_part( 'template-parts/forms/donation-onetime' ); ?>
					</div>
					<div id="monthly-form" class="w-full flex-shrink-0 transition transform">
						<?php get_template_part( 'template-parts/forms/donation-monthly' ); ?>
					</div>
				</section>
			</div>

		</div>

		<div class="flex flex-col lg:col-span-6">

			<?php if ( $text ) : ?>
			<div class="flex-1 font-serif text-navy normal-case prose-2xl">
				<?php echo $text; ?>
			</div>
			<?php endif; ?>

			<?php if ( 'high' === $speed && $image ) : ?>
			<picture class="flex-shrink-0 mt-0">
				<img class="w-full rounded-xl object-cover" src="<?php echo $image; ?>">
			</picture>
			<?php endif; ?>
		</div>

	</div>
</section>
