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

	public static function icon( $icon, $attrs = [], $extras = [] ) {
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
		$classes = 'flex items-center gap-2 rounded-lg text-sm font-sans uppercase tracking-widest transition ease-in-out hover:text-white ' . $classes;

		if ( ! Str::contains( 'px-', $classes ) ) {
			$classes .= ' px-4';
		}

		if ( ! Str::contains( 'h-', $classes ) ) {
			$classes .= ' h-10';
		}

		$classes .= $disabled ? ' opacity-75 cursor-not-allowed' : ' cursor-pointer';

		$classes = explode( ' ', $classes );
		$classes = array_unique( $classes );

		return join( ' ', $classes );
	}

	/**
	 * Returns Give page.
	 *
	 * @return WP_Post
	 */
	public static function get_give_page() {
		return get_field( 'give_page', 'options' );
	}

	/**
	 * Classnames
	 *
	 * @return string
	 */
	public static function classnames() {
		$args = func_get_args();

		$data = array_reduce(
			$args,
			function( $carry, $arg ) {
				if ( is_array( $arg ) ) {
					return array_merge( $carry, $arg );
				}

				$carry[] = $arg;
				return $carry;
			},
			[]
		);

		$classes = array_map(
			function( $key, $value ) {
				$condition = $value;
				$return = $key;

				if ( is_int( $key ) ) {
					$condition = null;
					$return = $value;
				}

				$is_array = is_array( $return );
				$is_object = is_object( $return );
				$is_stringable_type = ! $is_array && ! $is_object;
				$is_stringable_object = $is_object && method_exists( $return, '__toString' );

				if ( ! $is_stringable_type && ! $is_stringable_object ) {
					return null;
				}

				if ( null === $condition ) {
					return $return;
				}

				return $condition ? $return : null;
			},
			array_keys( $data ),
			array_values( $data )
		);

		$classes = array_filter( $classes );

		return implode( ' ', $classes );
	}
}
