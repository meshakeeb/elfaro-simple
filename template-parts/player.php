<?php
/**
 * Player template
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

?>
<div class="fixed bottom-0 w-screen bg-aqua p-2.5 select-none js-player transform transition ease-in-out duration-500 sm:duration-700 translate-y-full">

	<audio class="item-audio"></audio>

	<div class="flex justify-between w-full">

		<div class="flex items-center space-x-5">

			<img class="item-image flex w-10 rounded-lg overflow-hidden" />

			<span class="font-serif item-title"></span>

			<a href="#" class="<?php echo Helpers::button_classes( 'bg-white item-permalink' ); ?>">
				<?php esc_html_e( 'View Series', 'elfaro' ); ?>
				<?php Helpers::icon( 'arrow', [ 'class' => 'w-3.25' ] ); ?>
			</a>

		</div>

		<div class="flex items-center space-x-5">

			<span class="w-7.5 h-7.5 flex text-xl items-center justify-center cursor-pointer js-toggle-play-rate">
				1x
			</span>

			<?php Helpers::icon( 'backward-15', [ 'class' => 'js-backward w-7.5 h-7.5 cursor-pointer' ] ); ?>
			<?php Helpers::icon( 'forward-15', [ 'class' => 'js-forward w-7.5 h-7.5 cursor-pointer' ] ); ?>

			<button type="button"
				class="flex items-center justify-center w-7.5 h-7.5 bg-aqua rounded-full hover:bg-white hover:text-navy js-toggle-play"
			>
				<span class="flex items-center justify-center w-full h-full btn-play">
					<?php Helpers::icon( 'play', [ 'class' => 'w-1/2 h-full inline', 'fill' => 'currentColor' ] ); ?>
				</span>
				<span class="flex items-center justify-center w-full h-full btn-pause">
					<?php Helpers::icon( 'pause', [ 'class' => 'w-1/2 h-full inline', 'fill' => 'currentColor' ] ); ?>
				</span>
			</button>

			<div class="w-96 flex items-center space-x-2.5 prose-sm">
				<span class="w-12 js-current-time"></span>
				<input type="range" class="progressbar-range w-72 bg-white relative appearance-none outline-none rounded-lg cursor-pointer">
				<span class="w-12 js-duration"></span>
			</div>

		</div>

	</div>

</div>
