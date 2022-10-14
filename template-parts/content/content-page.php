<article <?php echo post_class( 'container my-10 md:my-15 lg:my-20 space-y-10 md:space-y-15 lg:space-y-20' ); ?>>

	<section class="entry-content prose-2xl text-navy">
		<?php the_title( '<h2>', '</h2>' ); ?>
		<?php the_content(); ?>
	</section>

</article>
