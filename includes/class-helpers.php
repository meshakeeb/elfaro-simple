<?php
/**
 * Theme helpers.
 *
 * @package elfaro
 */

namespace Elfaro;

defined( 'ABSPATH' ) || exit;

/**
 * Class Helpers
 */
class Helpers {

	/**
	 * Get bandwith speed type
	 *
	 * @return string
	 */
	public static function get_bandwidth_speed() {
		$speed = 'high';
		if ( isset( $_COOKIE['bandwidthSpeed'] ) && 'low' === $_COOKIE['bandwidthSpeed'] ) {
			$speed = 'low';
		}

		return $speed;
	}

	/**
	 * Hide banner
	 *
	 * @return bool
	 */
	public static function hide_banner() {
		return isset( $_COOKIE['hideBandwidthBanner'] ) && '1' === $_COOKIE['hideBandwidthBanner'];
	}

	public static function icon( $icon, $attrs = [] ) {
		$attrs = wp_parse_args(
			$attrs,
			[
				'xmlns'  => 'http://www.w3.org/2000/svg',
				'class'  => '',
				'fill'   => 'none',
				'stroke' => 'currentColor',
			]
		);

		if ( isset( $attrs['class'] ) ) {
			$attrs['class'] .= ' flex-shrink-0';
		}

		$attributes = '';
		foreach ( $attrs  as $key => $value ) {
			$attributes .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( $value ) );
		}

		$located = locate_template( 'template-parts/icons/' . $icon . '.php' );
		if ( $located ) {
			require $located;
		}
	}

	public static function button_classes( $classes, $disabled = false ) {
		if ( ! Str::contains( 'px-', $classes ) ) {
			$classes .= ' px-4';
		}

		if ( ! Str::contains( 'h-', $classes ) ) {
			$classes .= ' h-10';
		}

		$classes .= 'flex items-center gap-2 rounded-lg text-sm font-sans uppercase tracking-widest transition ease-in-out border border-current hover:text-white';
		$classes .= $disabled ? 'opacity-75 cursor-not-allowed' : 'cursor-pointer';

		$classes = explode( ' ', $classes );
		$classes = array_unique( $classes );

		return join( ' ', $classes );
	}
}
