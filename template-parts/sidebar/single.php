<?php
/**
 * Elfaro Archive
 *
 * @package Elfaro
 */

use Elfaro\Helpers;
?>
<div>

	<div class="md:flex lg:block">

		<div class="md:pr-5 lg:pr-0">
			<p class="whitespace-nowrap uppercase text-gray text-sm tracking-widest">
				<?php echo get_the_date(); ?>
			</p>

			<h1 class="lg:mt-5 text-navy text-2xl md:text-3xl lg:text-4xl"><?php the_title(); ?></h1>

			<div class="flex w-full items-center font-sans pt-3 md:pt-8 pb-5">
				<div class="w-10 h-10 rounded-full mr-3 overflow-hidden">
					<?php echo get_avatar( get_post()->post_author ); ?>
				</div>

				<div class="flex-1 px-2">
					by <?php echo get_the_author_meta( 'display_name', get_post()->post_author ); ?>
				</div>
			</div>

		</div>

	<div>

		<div class="hidden md:block whitespace-nowrap">See more under <a href="#" class="underline decoration-2">The Gospel</a></div>

		<div class="hidden md:block share-article mt-15">

			<span class="text-sm pb-3 block">Share this series!</span>

			<div class="flex items-center">
				<a href="#" class="mr-2">
					<?php Helpers::icon( 'facebook', [ 'class' => 'w-6 h-6 text-gray fill-current' ] ); ?>
				</a>

				<a href="#" class="mr-2">
					<?php Helpers::icon( 'twitter', [ 'class' => 'w-6 h-6 text-gray' ] ); ?>
				</a>

				<a href="#" class="mr-2">
					<?php Helpers::icon( 'mail', [ 'class' => 'w-6 h-6 text-gray fill-current' ] ); ?>
				</a>

				<a href="#">
					<?php Helpers::icon( 'link', [ 'class' => 'w-6 h-6 text-gray fill-current' ] ); ?>
				</a>
			</div>
		</div>

	</div>

</div>

<div class="flex justify-between md:hidden">

	<div>See more under <br><a href="#" class="underline decoration-2">The Gospel</a></div>

	<div class="share-article">

		<span class="text-sm pb-3 block">Share this series!</span>

		<div class="flex items-center justify-end">

			<a href="#" class="mr-2">
				<?php Helpers::icon( 'facebook', [ 'class' => 'w-6 h-6 text-gray fill-current' ] ); ?>
			</a>

			<a href="#" class="mr-2">
				<?php Helpers::icon( 'twitter', [ 'class' => 'w-6 h-6 text-gray' ] ); ?>
			</a>

			<a href="#" class="mr-2">
				<?php Helpers::icon( 'mail', [ 'class' => 'w-6 h-6 text-gray fill-current' ] ); ?>
			</a>

			<a href="#">
				<?php Helpers::icon( 'link', [ 'class' => 'w-6 h-6 text-gray fill-current' ] ); ?>
			</a>

		</div>

	</div>

</div>
