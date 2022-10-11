<?php
/**
 * Button Template
 */

use Elfaro\Str;

$button_tag = 'link' === $args['type'] ? 'a' : 'button';
$button_classes = $args['class'];

if ( ! Str::contains( 'px-', $button_classes ) ) {
	$button_classes .= ' px-4';
}

if ( ! Str::contains( 'h-', $button_classes ) ) {
	$button_classes .= ' h-10';
}

$button_classes .= 'flex items-center gap-2 rounded-lg text-sm font-sans uppercase tracking-widest transition ease-in-out border border-current hover:text-white';

  :class="$el.disabled ? 'opacity-75 cursor-not-allowed' : 'cursor-pointer'"
?>

<<?php echo $button_tag; ?> >{{ $slot }}</<?php echo $button_tag; ?>>
