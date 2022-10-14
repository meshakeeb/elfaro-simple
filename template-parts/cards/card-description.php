<?php
/**
 * Description
 */

if ( ! $is_primary ) {
	return;
}

$description = wp_trim_words( get_post()->post_content, 140 );
if ( empty( $description ) ) {
	return;
}
?>
<div class="font-serif text-gray-black text-md md:text-lg lg:text-xl leading-snug md:leading-snug">
	<?php echo $description; // phpcs:ignore ?>
</div>
