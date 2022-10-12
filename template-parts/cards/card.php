<?php
/**
 * Card episode
 */
global $post;

$bc = [ get_post_time( 'F j, Y', false, $post ) ];

$object = [
	'title'       => $post->post_title,
	'description' => wp_trim_words( $post->post_content, 140 ),
	'breadcrumbs' => implode( ' • ' , $bc ),
	'permalink'   => get_the_permalink( $post ),
	'image'       => get_the_post_thumbnail( $post, 'medium', [ 'class' => 'w-full rounded-lg h-full md:h-auto' ] ),
	'buttons'     => (object) [ 'read', 'play' ],
];

// if ( ! static::query()->get('paged') && $post->ID == static::query()->posts[0]->ID) {
// 	array_unshift($bc, __('Latest post', 'elfaro'));
// }
