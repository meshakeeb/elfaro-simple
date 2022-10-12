<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'high' === Helpers::get_bandwidth_speed() ? 'high-speed' : 'low-speed' ); ?>>
<?php wp_body_open(); ?>
<div id="app" class="flex flex-col min-h-screen">

	<a class="skip-link screen-reader-text sr-only focus:not-sr-only" href="#main">
		<?php esc_html_e( 'Skip to content', 'elfaro' ); ?>
	</a>

	<?php get_template_part( 'template-parts/header' ); ?>

	<div id="wrap" class="flex flex-col xl:flex-row flex-1">
