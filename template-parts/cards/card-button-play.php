<?php
/**
 * Button: Play
 */

use Elfaro\Helpers;

$audio = get_field( 'audio', get_post() );

if ( ! isset( $is_card_button_play ) || ! $is_card_button_play || empty( $audio ) ) {
	return;
}
?>
<button data-audio="<?php echo esc_url( $audio ); ?>" class="<?php echo esc_attr( Helpers::button_classes( 'border border-current text-gray hover:bg-gray h-9 px-0 w-24 justify-center js-play-audio' ) ); ?>">
	<span class="w-3 flex items-center justify-center toggle-play">
		<?php Helpers::icon( 'play', [ 'class' => 'w-full', 'fill' => 'currentColor', 'stroke-width' => '1.5' ] ); // phpcs:ignore ?>
	</span>
	<span class="w-3 flex items-center justify-center toggle-play hidden">
		<?php Helpers::icon( 'pause', [ 'class' => 'w-full', 'fill' => 'currentColor', 'stroke-width' => '1.5' ] ); // phpcs:ignore ?>
	</span>
	<span class="toggle-play"><?php esc_html_e( 'Play', 'elfaro' ); ?></span>
	<span class="toggle-play hidden"><?php esc_html_e( 'Pause', 'elfaro' ); ?></span>
</button>
