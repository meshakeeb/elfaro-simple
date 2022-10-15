<?php
/**
 * Ajax load more button
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

global $wp_query;

$paged = isset( $wp_query->query['paged'] ) ? $wp_query->query['paged'] : 1;
if ( $wp_query->max_num_pages > 0 && $paged < $wp_query->max_num_pages ) : ?>
<div class="h-12 lg:h-15 mb-10 md:mb-15 lg:mb-20 flex items-center justify-center js-load-more">
	<a href="<?php echo add_query_arg( 'ajax', '1', get_next_posts_page_link( $wp_query->max_num_pages ) ) ?>" class="<?php echo Helpers::button_classes( 'bg-navy hover:bg-navy-dark text-base text-white gap-4 md:h-14' ); ?>">
		<?php Helpers::icon( 'plus', [ 'class' => 'w-4' ] ); ?>
		<?php esc_html_e( 'Load more results', 'elfaro' ); ?>
	</a>
</div>
<?php endif; ?>
