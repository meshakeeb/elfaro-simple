<?php
/**
 * Thumbnail
 */

use Elfaro\Helpers;

if ( ! has_post_thumbnail() ) {
	return;
}
$image_classes = Helpers::classnames(
	[
		'row-start-1 row-span-4 md:row-start-auto md:row-span-auto md:w-15' => $is_flat,
		'md:row-span-5 order-first md:order-none' => $is_primary,
	]
);
?>
<picture class="<?php echo $image_classes; ?>">
	<?php the_post_thumbnail( 'medium', [ 'class' => 'w-full rounded-lg wp-post-image' . ( $is_primary ? ' h-full' : '' ) ] ); ?>
</picture>
