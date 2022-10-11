<?php
/**
 * Banner template
 */

use Elfaro\Helpers;

if ( Helpers::hide_banner() ) {
	return;
}

$speed = Helpers::get_bandwidth_speed();
?>
<div id="bandwidth-bar" class="bg-aqua-dark text-xs tracking-widest h-8">
	<div class="px-6 flex items-center justify-between md:justify-center h-full">
		<button class="js-hide-speed p-2 -ml-2 uppercase tracking-widest flex items-center">
			<?php Helpers::icon( 'close', [ 'class' => 'h-2' ] ); ?>
			<span class="hidden md:inline md:ml-1"><?php esc_html_e( 'Hide', 'elfaro' ); ?></span>
		</button>
		<div class="js-toggle-speed flex-1 py-2 text-center cursor-pointer">
			<?php if ( 'high' === $speed ) : ?>
			<span class="hidden md:inline"><?php esc_html_e( 'Bad signal?', 'elfaro' ); ?></span>
			<span><?php esc_html_e( 'Switch to a 2G-friendly version of this site.', 'elfaro' ); ?></span>
			<?php endif; ?>

			<?php if ( 'low' === $speed ) : ?>
			<span class="hidden md:inline"><?php esc_html_e( 'Have Fast Internet?', 'elfaro' ); ?></span>
			<span><?php esc_html_e( 'Switch to full site experience.', 'elfaro' ); ?></span>
			<?php endif; ?>
	</div>
</div>
</div>
