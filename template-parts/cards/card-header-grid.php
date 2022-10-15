<?php
/**
 * Header
 */

use Elfaro\Helpers;

$header_classes = Helpers::classnames(
	'w-full text-gray whitespace-nowrap uppercase tracking-widest',
	[
		'text-xs md:text-sm' => $is_flat,
		'text-sm pt-4 md:pl-0 md:pr-6 md:pt-6 lg:pr-7.5 lg:pt-7.5' => $is_primary,
	]
);

$bc = [ get_post_time( 'F j, Y', false, get_post() ) ];
?>
<p class="<?php echo esc_attr( $header_classes ); ?>">
	<?php echo implode( ' • ' , $bc ); // phpcs:ignore ?>
</p>
