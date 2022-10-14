<?php
/**
 * Block: Image
 */

$slides = get_field( 'slides' );
$slide = current( $slides );
?>
<picture class="flex-shrink-0">
	<img class="w-full rounded-lg object-cover" src="<?php echo $slide; ?>">
</picture>
