<?php
/**
 * Footer template
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

$company_address = nl2br( get_field( 'company_address', 'option' ) );
$company_email = nl2br( get_field( 'company_email', 'option' ) );
$company_phone = nl2br( get_field( 'company_phone', 'option' ) );
$copyright = nl2br( get_field( 'copyright', 'option' ) );
$social = [
	'instagram' => get_field( 'instagram_account', 'option' ),
	'facebook'  => get_field( 'facebook_account', 'option' ),
	'twitter'   => get_field( 'twitter_account', 'option' ),
];
$give = Helpers::get_give_page();
?>
<footer class="bg-navy text-white p-5 md:p-10 lg:p-15" role="contentinfo">

	<div class="flex justify-between">

		<div class="flex flex-col flex-wrap space-y-6 md:space-y-8 font-serif">

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

			<?php if ( $company_address ) : ?>
			<p class="font-serif"><?php echo wp_kses_post( $company_address ); ?></p>
			<?php endif; ?>

			<div class="flex flex-row md:flex-col space-x-3 md:space-y-2 md:space-x-0">
				<?php foreach ( $social as $network => $account ) : ?>
					<p class="flex items-center space-x-3">
						<?php
						Helpers::icon(
							$network,
							[
								'stroke' => 'none',
								'class'  => 'fill-current w-6 h-6',
							],
							[
								'account' => $account,
							]
						);
						?>
					</p>
				<?php endforeach; ?>
			</div>

			<?php if ( $copyright ) : ?>
			<p class="text-navy-light pt-4 md:pt-0"><?php echo wp_kses_post( $copyright ); ?></p>
			<?php endif; ?>

		</div>

		<nav role="navigation">
			<ul class="flex flex-col uppercase tracking-widest">

				<li class="block md:hidden">
					<button class="uppercase js-toggle toggle-menu-footer" data-target=".toggle-menu-footer"><?php esc_html_e( 'Menu', 'elfaro' ); ?></button>
					<button class="uppercase flex items-center js-toggle toggle-menu-footer" data-target=".toggle-menu-footer" style="display: none;">
						<?php Helpers::icon( 'close', [ 'class' => 'h-3 mr-2 mb-0.5' ] ); ?>
						<?php esc_html_e( 'Close', 'elfaro' ); ?>
					</button>
				</li>

				<?php
				wp_nav_menu(
					[
						'location'   => 'primary_navigation',
						'container'  => false,
						'items_wrap' => '<div class="space-y-3 md:space-y-5 uppercase hidden md:block toggle-menu-footer">%3$s</div>',
					]
				);
				?>

				<?php if ( $give ) : ?>
				<li class="mt-6 md:mt-8">
					<a class="btn bg-white hover:bg-gray-dark rounded-lg text-navy tracking-widest" href="<?php echo get_permalink( $give ); ?>" itemprop="url"><?php echo $give->post_title; ?></a>
				</li>
				<?php endif; ?>

			</ul>
		</nav>

	</div>

</footer>
