<?php
/**
 * Theme helpers.
 *
 * @package elfaro
 */

namespace Elfaro;

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
}
