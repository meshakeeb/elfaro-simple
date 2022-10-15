<?php
/**
 * Header
 */

use Elfaro\Helpers;

global $post;

$classes = Helpers::classnames(
	'flex w-full items-center font-sans pt-3',
	[
		'md:pt-4'      => $is_flat,
		'md:pt-8 pb-5' => $is_primary,
	]
);
?>
<div class="<?php echo esc_attr( $classes ); ?>">
	<div class="w-8 h-8 rounded-full mr-3 overflow-hidden">
		<?php echo get_avatar( $post->post_author ); ?>
	</div>

	<div class="flex-1 px-2">
		by <?php echo get_the_author_meta( 'display_name', $post->post_author ); ?>
	</div>
</div>
