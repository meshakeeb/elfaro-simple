<?php

use Elfaro\Helpers;

$speed = Helpers::get_bandwidth_speed();
?>
<h2 class="text-navy text-2xl">Related Resources</h2>

<div class="flex flex-col space-y-8 mt-7">
	<?php foreach ( get_posts() as $post ): ?>
	<a href="<?php echo get_permalink( $post ); ?>" class="flex">
		<?php if ( 'high' === $speed ) : ?>
		<picture class="flex-shrink-0 mr-5">
			<img class="rounded-lg w-16 h-16 object-cover" src="/wp-content/uploads/2021/10/img2.png">
		</picture>
		<?php endif; ?>
		<p><?php echo get_the_title( $post ); ?></p>
	</a>
	<?php endforeach; ?>
</div>
