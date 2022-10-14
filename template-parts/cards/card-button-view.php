<?php
/**
 * Button: View
 */

use Elfaro\Helpers;

if ( ! isset( $is_card_button_view ) || ! $is_card_button_view ) {
	return;
}
?>
<a href="<?php the_permalink(); // phpcs:ignore ?>" class="<?php echo esc_attr( Helpers::button_classes( 'h-9 px-0 text-gray hover:text-gray-black pl-4' ) ); ?>">
	<span>
		<span class="hidden md:inline-block"><?php esc_html_e( 'View', 'elfaro' ); ?></span> <?php esc_html_e( 'Series', 'elfaro' ); ?>
	</span>
	<?php Helpers::icon( 'arrow', [ 'class' => 'w-3.25' ] ); ?>
</a>
