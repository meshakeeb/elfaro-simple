<?php
/**
 * Thumbnail
 */

use Elfaro\Helpers;

if ( has_post_thumbnail() ) {
	$image_classes = Helpers::classnames(
		'w-full rounded-lg md:h-auto',
		[
			''                                        => $is_flat,
			'md:row-span-5 order-first md:order-none' => $is_primary,
		]
	);
	the_post_thumbnail( 'medium', [ 'class' => $image_classes ] );
}
