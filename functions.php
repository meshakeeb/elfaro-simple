<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elfaro
 */

use Elfaro\Acf;
use Elfaro\Assets;
use Elfaro\Post_Types;
use Elfaro\Theme_Setup;

require_once get_template_directory() . '/vendor/autoload.php';

( new Theme_Setup() )->hooks();
( new Post_Types() )->hooks();
( new Assets() )->hooks();
( new Acf() )->hooks();
