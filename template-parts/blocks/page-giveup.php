<?php

$svgTag = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"';
?>
<section class="bg-gray-light py-10 md:py-15 lg:py-20">

  <div class="container flex flex-col items-center text-navy">
    <h2 class="text-2xl md:text-3xl lg:text-4xl"><?php the_field( 'heading' ); ?></h2>

    <?php if( have_rows('columns') ) : ?>
    <div class="flex flex-col lg:flex-row justify-between space-y-12 md:space-y-16 lg:space-y-0 mt-10 md:mt-15 text-xl">
      <?php while( have_rows('columns') ) : the_row(); ?>
      <div class="flex flex-col items-center text-center">
        <?php
        $file = get_sub_field( 'icon' );
        $content = file_get_contents( locate_template( 'resources/views/components/icon/' . $file . '.blade.php' ));
        $content = str_replace( '{{ $attributes }}', 'class="flex-shrink-0 h-10"', $content );
        $content = str_replace( '</x-icon.svg>', '</svg>', $content );
        $content = str_replace( '<x-icon.svg', $svgTag, $content );
        echo $content;
        // echo $file;
        ?>
        <p class="mt-5 px-15"><?php the_sub_field( 'text' ); ?></p>
      </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>

</section>
