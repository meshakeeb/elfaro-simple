<?php
/**
 * Search template
 */

use Elfaro\Helpers;

$in_sidebar = isset( $args['in_sidebar'] ) ? $args['in_sidebar'] : false;
$is_hidden = isset( $args['hidden'] ) ? ' hidden' : '';
?>
<span class="text-sm block pb-3 search-label">
	<?php echo esc_html_x( 'SEARCH', 'label', 'elfaro' ); ?>
</span>
<form role="search" method="get" class="flex flex-col md:flex-row items-center<?php echo $is_hidden; ?>" action="<?php echo esc_url( home_url() ); ?>">
	<label class="flex flex-1">
		<input
			type="search"
			class="px-4 py-2 border rounded outline-none text-black flex-1 <?php echo $in_sidebar ? 'border-gray' : 'border-aqua-darken'; ?>"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'elfaro' ); ?>"
			value="<?php echo get_search_query(); ?>"
			name="s"
		>
	</label>

	<button
		type="submit"
		class="<?php echo Helpers::button_classes( 'mt-4 md:ml-4 md:mt-0 border ' . ( $in_sidebar ? 'text-gray hover:bg-gray' : 'border-aqua-darken bg-aqua-darken' ) ); ?>"
	>
		<i class="h-4 w-4"><?php Helpers::icon( 'search' ); ?></i>
		<?php echo esc_attr_x( 'Search', 'submit button', 'elfaro' ); ?>
	</button>
</form>
