<?php
/**
 * Title
 */

use Elfaro\Helpers;

$title_classes = Helpers::classnames(
	'font-serif text-navy mb-5 mb-3',
	[
		'md:text-4xl text-2xl' => $is_primary,
		'md:text-3xl text-lg leading-4 lg:pt-0 md:leading-none pt-2 pb-3' => $is_flat,
	]
);

if ( $is_primary || $is_flat ) :
	?>
	<h2 class="<?php echo esc_attr( $title_classes ); ?>"><?php the_title(); ?></h2>
<?php endif; ?>
