<?php
/**
 * Player template
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

?>
<div class="fixed bottom-0 w-screen bg-navy p-2.5 select-none js-player transform transition ease-in-out duration-500 sm:duration-700 translate-y-full">

	<audio class="item-audio"></audio>

	<div class="flex justify-between w-full">

		<div class="flex items-center space-x-5">

			<img class="item-image flex w-10 rounded-lg overflow-hidden" />

			<span class="text-white font-serif item-title"></span>

			<a href="#" class="<?php echo Helpers::button_classes( 'border border-current text-navy-light item-permalink' ); ?>">
				<?php esc_html_e( 'View Series', 'elfaro' ); ?>
				<?php Helpers::icon( 'arrow', [ 'class' => 'w-3.25' ] ); ?>
			</a>

		</div>

		<div class="flex items-center space-x-5">

			<span
				@click.prevent="togglePlaybackRate"
				class="w-7.5 h-7.5 flex items-center justify-center text-navy-light hover:text-white cursor-pointer"
			>
				<?php $rateIcon = [ 'class' => 'h-3.25', 'stroke' => 'currentColor' ]; ?>
				<span class="playbackRate playbackRate-1 hidden">
					<?php Helpers::icon( 'rate-1x', $rateIcon ); ?>
				</span>
				<span class="playbackRate playbackRate-1.5 hidden">
					<?php Helpers::icon( 'rate-1-5x', $rateIcon ); ?>
				</span>
				<span class="playbackRate playbackRate-2 hidden">
					<?php Helpers::icon( 'rate-2x', $rateIcon ); ?>
				</span>
			</span>

			<?php Helpers::icon( 'backward-15', [ 'class' => 'js-backward w-7.5 h-7.5 text-navy-light hover:text-white cursor-pointer' ] ); ?>
			<?php Helpers::icon( 'forward-15', [ 'class' => 'js-forward w-7.5 h-7.5 text-navy-light hover:text-white cursor-pointer' ] ); ?>

			<button type="button"
				@click.prevent="togglePlay"
				:disabled="loading"
				:class="loading ? 'cursor-wait' : 'cursor-pointer'"
				class="flex items-center justify-center w-7.5 h-7.5 bg-navy text-white rounded-full hover:bg-white hover:text-navy"
			>
				<span x-show="!play" class="flex items-center justify-center w-full h-full" x-transition.in>
					<x-icon.play class="w-1/3 relative left-px" fill="currentColor" />
				</span>
				<span x-show="play" class="flex items-center justify-center w-full h-full" x-transition.in>
					<x-icon.pause class="w-1/3" fill="currentColor" />
				</span>
			</button>

			<div class="w-96 flex items-center space-x-2.5 text-navy-light prose-sm">
				<span class="w-12" x-text="formatTime(currentTime)"></span>

				<input type="range"
				id="progressbar"
				x-model="currentTime"
				:max="duration"
				class="progressbar-range w-72 bg-navy-light relative appearance-none outline-none rounded-lg cursor-pointer"
				>
				<span class="w-12" x-text="formatTime(duration)"></span>
			</div>

		</div>

	</div>

</div>
