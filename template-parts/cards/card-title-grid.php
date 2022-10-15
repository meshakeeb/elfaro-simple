<?php
/**
 * Title
 */

use Elfaro\Helpers;

$title_classes = Helpers::classnames(
	'font-serif text-navy text-2xl mb-0',
	[
		'mt-1'                                          => $is_flat,
		'lg:text-4xl mt-3 md:text-3xl lg:text-4xl mb-3' => $is_primary,
	]
);

if ( $is_primary || $is_flat ) :
	?>
	<h2 class="<?php echo esc_attr( $title_classes ); ?>"><?php the_title(); ?></h2>
<?php endif; ?>
