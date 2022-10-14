<?php
/**
 * Thumbnail
 */

use Elfaro\Helpers;

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
