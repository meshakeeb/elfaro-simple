<?php
/**
 * Series
 */

if ( ! $is_primary ) {
	return;
}

$series = wp_get_post_terms( get_the_ID(), 'serie' );
$series = $series ? $series[0]->name : false;
if ( empty( $series ) ) {
	return;
}

?>
<p class="md:hidden lg:flex font-serif text-gray-black lg:text-xl italic mb-2">
	<span>Serie: </span>
	<span><?php echo $series; // phpcs:ignore ?></span>
</p>
