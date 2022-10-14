<?php
/**
 * Button: Read
 */

use Elfaro\Helpers;

if ( ! isset( $is_card_button_read ) || ! $is_card_button_read ) {
	return;
}
?>
<a href="<?php the_permalink(); // phpcs:ignore ?>" class="<?php echo esc_attr( Helpers::button_classes( 'border border-current h-9 px-2 text-gray hover:bg-gray' ) ); ?>">
	<?php Helpers::icon( 'read', [ 'class' => 'w-3.25' ] ); ?>
	<span>
		<?php esc_html_e( 'Read', 'elfaro' ); ?>
	</span>
</a>
