<?php
/**
 * Header
 */

use Elfaro\Helpers;

$header_classes = Helpers::classnames(
	'w-full text-gray whitespace-nowrap uppercase tracking-widest text-sm',
	[
		'md:text-sm' => $is_flat,
		'col-span-2 col-start-2 md:col-span-4 md:col-start-1 px-2.5 pt-2.5 md:px-0 md:pt-0 md:pb-2.5' => $is_flat,
		'pt-4 px-4 md:pl-0 md:pr-6 md:pt-6 lg:pr-7.5 lg:pt-7.5' => $is_primary,
	]
);

$bc = [ get_post_time( 'F j, Y', false, get_post() ) ];
?>
<p class="<?php echo esc_attr( $header_classes ); ?>">
	<?php echo implode( ' • ' , $bc ); // phpcs:ignore ?>
</p>
