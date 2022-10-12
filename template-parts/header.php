<?php
/**
 * Header template
 */
use Elfaro\Helpers;

$give = Helpers::get_give_page();
?>
<header role="banner" class="bg-aqua text-white font-sans uppercase">

	<?php get_template_part( 'template-parts/banner' ); ?>

	<div class="h-16">

		<div class="h-full flex items-center justify-between px-6">

			<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="flex h-8">
				<?php
				Helpers::icon(
					'site-logo',
					[
						'fill'   => 'currentColor',
						'stroke' => 'none',
						'class'  => 'w-[133px]',
					]
				);
				?>
			</a>

			<div class="flex-row items-center lg:flex lg:w-1/3 toggle-search" style="display: none">
				<button class="uppercase flex items-center mr-4 js-toggle" data-target=".toggle-search">
					<?php Helpers::icon( 'close', [ 'class' => 'h-3 mr-2 mb-0.5' ] ); ?>
					<?php esc_html_e( 'Close', 'elfaro' ); ?>
				</button>
				<?php get_template_part( 'template-parts/forms/search' ); ?>
			</div>

			<nav role="navigation">
				<ul class="flex items-center space-x-4 lg:space-x-6 tracking-widest">
					<li class="hidden lg:block text-sm xl:text-lg toggle-search">
						<button class="js-toggle uppercase tracking-widest" data-target=".toggle-search"><?php esc_html_e( 'Search', 'elfaro' ); ?></button>
					</li>

					<li class="block lg:hidden">
						<button class="uppercase tracking-widest js-toggle toggle-menu" data-target=".toggle-menu"><?php esc_html_e( 'Menu', 'elfaro' ); ?></button>
						<button class="uppercase flex js-toggle items-center tracking-widest toggle-menu" data-target=".toggle-menu" style="display: none;">
							<?php Helpers::icon( 'close', [ 'class' => 'h-3 mr-2 mb-0.5' ] ); ?>
							<?php esc_html_e( 'Close', 'elfaro' ); ?>
						</button>
					</li>

					<?php
					wp_nav_menu(
						[
							'location'   => 'primary_navigation',
							'container'  => false,
							'items_wrap' => '<div class="ml-6 space-x-4 lg:space-x-6 hidden lg:flex text-sm xl:text-lg toggle-search">%3$s</div>',
						]
					);
					?>

					<?php if ( $give ) : ?>
					<li>
						<a class="btn bg-navy hover:bg-navy-dark rounded-lg" href="<?php echo get_permalink( $give ); ?>" itemprop="url"><?php echo $give->post_title; ?></a>
					</li>
					<?php endif; ?>
				</ul>
			</nav>

		</div>

		<nav role="navigation" class="bg-aqua relative flex flex-col items-center py-16 space-y-5 z-20 min-h-screen md:min-h-full toggle-menu" style="display: none;">

			<?php get_template_part( 'template-parts/forms/search' ); ?>

			<?php
			wp_nav_menu(
				[
					'location'   => 'primary_navigation',
					'container'  => false,
					'menu_class' => 'text-center pt-8 space-y-5 tracking-widest',
				]
			);
			?>
		</nav>
	</div>
</header>
