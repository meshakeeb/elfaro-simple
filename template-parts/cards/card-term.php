<?php
/**
 * Card episode
 */

use Elfaro\Helpers;
?>
<article class="border border-gray-lighten rounded-lg bg-gray-light grid mt-10 sm:mt-0 md:grid-cols-none md:gap-x-2.5">

	<div class="flex flex-col py-4 px-5">

		<p class="w-full text-gray whitespace-nowrap uppercase tracking-widest text-xs md:text-sm">
			<?php
			printf(
				_n( '%d episode', '%d episodes', $item->count, 'elfaro' ),
				$item->count
			);
			?>
		</p>

		<h2 class="font-serif text-navy text-2xl mt-1 mb-0">
			<?php echo $item->name; ?>
		</h2>

		<div class="font-serif text-gray-black text-md md:text-lg lg:text-xl leading-snug md:leading-snug">
			<?php echo $item->description; ?>
		</div>

		<div class="flex items-end justify-between w-full pt-4">

			<a class="flex items-center gap-2 rounded-lg text-sm font-sans uppercase tracking-widest h-9 text-gray cursor-pointer" href="<?php echo esc_url( get_term_link( $item->term_id ) ); ?>">
				<span><?php esc_html_e( 'View Series', 'elfaro' ); ?></span>
				<?php Helpers::icon( 'arrow', [ 'class' => 'w-3.25' ] ); ?>
			</a>

		</div>

	</div>

</article>
