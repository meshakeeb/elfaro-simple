<article <?php echo post_class( 'container my-10 md:my-15 lg:my-20 space-y-10 md:space-y-15 lg:space-y-20' ); ?>>

	<section class="entry-content prose-xl">
		<?php the_content(); ?>
	</section>

	<?php get_template_part( 'template-parts/section-cta' ); ?>

</article>
