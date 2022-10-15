<?php
/**
 * Title
 */

use Elfaro\Helpers;

$title_classes = Helpers::classnames(
	'font-serif text-navy mb-0',
	[
		'text-xl md:text-2xl mt-1'                               => $is_flat,
		'text-2xl md:text-4xl mt-3 md:text-3xl lg:text-4xl mb-3' => $is_primary,
	]
);

if ( $is_primary || $is_flat ) :
	?>
	<h2 class="<?php echo esc_attr( $title_classes ); ?>"><?php the_title(); ?></h2>
<?php endif; ?>
