<?php
/**
 * Theme custom post types and taxonomies.
 *
 * @package elfaro
 */

namespace Elfaro;

/**
 * Class Post Types
 */
class Post_Types {

	/**
	 * Blog Post Type slug
	 *
	 * @var string
	 */
	const BLOG = 'post';

	/**
	 * Episodes Post Type slug
	 *
	 * @var string
	 */
	const EPISODE = 'episode';

	/**
	 * People Post Type slug
	 *
	 * @var string
	 */
	const PEOPLE = 'people';

	/**
	 * Category Taxonomy slug
	 *
	 * @var string
	 */
	const CATEGORIES = 'category';

	/**
	 * Tag Taxonomy slug
	 *
	 * @var string
	 */
	const TAGS = 'post_tag';

	/**
	 * Speaker Taxonomy slug
	 *
	 * @var string
	 */
	const SPEAKERS = 'speaker';

	/**
	 * Series Taxonomy slug
	 *
	 * @var string
	 */
	const SERIES = 'serie';

	/**
	 * Scriptures Taxonomy slug
	 *
	 * @var string
	 */
	const SCRIPTURES = 'scripture';

	public function hooks() {
		add_action( 'init', [ $this, 'register_series_tax' ] );
		add_action( 'init', [ $this, 'register_scriptures_tax' ] );
		add_action( 'init', [ $this, 'register_episodes_cpt' ] );
		add_action( 'init', [ $this, 'register_people_cpt' ] );
	}

	public function register_episodes_cpt() {
		$labels = [
			'name'               => __( 'Episode', 'elfaro' ),
			'singular_name'      => __( 'Episode', 'elfaro' ),
			'menu_name'          => _x( 'Episodes', 'admin menu', 'elfaro' ),
			'name_admin_bar'     => _x( 'Episode', 'add new on admin bar', 'elfaro' ),
			'add_new'            => _x( 'Add New', 'Episode', 'elfaro' ),
			'add_new_item'       => __( 'Add New Episode', 'elfaro' ),
			'new_item'           => __( 'New Episode', 'elfaro' ),
			'edit_item'          => __( 'Edit Episode', 'elfaro' ),
			'view_item'          => __( 'View Episode', 'elfaro' ),
			'all_items'          => __( 'All Episodes', 'elfaro' ),
			'search_items'       => __( 'Search Episodes', 'elfaro' ),
			'parent_item_colon'  => __( 'Parent Episode:', 'elfaro' ),
			'not_found'          => __( 'No episodes found.', 'elfaro' ),
			'not_found_in_trash' => __( 'No episodes found in Trash.', 'elfaro' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'has_archive'        => true,
			'rewrite'            => [ 'slug' ],
			'hierarchical'       => false,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'show_in_menu'       => true,
			'capability_type'    => 'page',
			'supports'           => [ 'title', 'editor', 'thumbnail', 'author' ],
			'taxonomies'         => [ self::SERIES, self::SCRIPTURES ],
		];

		register_post_type( self::EPISODE, $args );
	}

	public function register_people_cpt() {
		$labels = [
			'name'               => __( 'People', 'elfaro' ),
			'singular_name'      => __( 'Person', 'elfaro' ),
			'menu_name'          => _x( 'People', 'admin menu', 'elfaro' ),
			'name_admin_bar'     => _x( 'People', 'add new on admin bar', 'elfaro' ),
			'add_new'            => _x( 'Add New', 'Person', 'elfaro' ),
			'add_new_item'       => __( 'Add New Person', 'elfaro' ),
			'new_item'           => __( 'New Person', 'elfaro' ),
			'edit_item'          => __( 'Edit Person', 'elfaro' ),
			'view_item'          => __( 'View Person', 'elfaro' ),
			'all_items'          => __( 'All People', 'elfaro' ),
			'search_items'       => __( 'Search People', 'elfaro' ),
			'parent_item_colon'  => __( 'Parent Person:', 'elfaro' ),
			'not_found'          => __( 'No people found.', 'elfaro' ),
			'not_found_in_trash' => __( 'No people found in Trash.', 'elfaro' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => false,
			'publicly_queryable' => false,
			'has_archive'        => false,
			'rewrite'            => false,
			'hierarchical'       => false,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'show_in_menu'       => true,
			'capability_type'    => 'page',
			'supports'           => [ 'title', 'editor', 'thumbnail', 'author' ],
			'taxonomies'         => [ self::SERIES, self::CATEGORIES, self::TAGS, self::SPEAKERS ],
		];

		register_post_type( self::PEOPLE, $args );
	}

	public function register_series_tax() {
		$labels = [
			'name'          => __( 'Series', 'elfaro' ),
			'singular_name' => __( 'Series', 'elfaro' ),
			'search_items'  => __( 'Search Series', 'elfaro' ),
			'all_items'     => __( 'All Series', 'elfaro' ),
			'view_item'     => __( 'View Series', 'elfaro' ),
			'edit_item'     => __( 'Edit Series', 'elfaro' ),
			'update_item'   => __( 'Update Series', 'elfaro' ),
			'add_new_item'  => __( 'Add New Series', 'elfaro' ),
			'new_item_name' => __( 'New Series Name', 'elfaro' ),
			'menu_name'     => __( 'Series', 'elfaro' ),
			'not_found'     => __( 'No series found.', 'elfaro' ),
		];

		$args = [
			'labels'       => $labels,
			'public'       => true,
			'show_ui'      => true,
			'show_in_rest' => true,
			'hierarchical' => false,
		];

		register_taxonomy( self::SERIES, [ self::EPISODE ], $args );
	}

	public function register_scriptures_tax() {
		$labels = [
			'name'          => __( 'Scriptures', 'elfaro' ),
			'singular_name' => __( 'Scriptures', 'elfaro' ),
			'search_items'  => __( 'Search Scriptures', 'elfaro' ),
			'all_items'     => __( 'All Scriptures', 'elfaro' ),
			'view_item'     => __( 'View Scriptures', 'elfaro' ),
			'edit_item'     => __( 'Edit Scriptures', 'elfaro' ),
			'update_item'   => __( 'Update Scriptures', 'elfaro' ),
			'add_new_item'  => __( 'Add New Scriptures', 'elfaro' ),
			'new_item_name' => __( 'New Scriptures Name', 'elfaro' ),
			'menu_name'     => __( 'Scriptures', 'elfaro' ),
			'not_found'     => __( 'No scriptures found.', 'elfaro' ),
		];

		$args = [
			'labels'       => $labels,
			'public'       => true,
			'show_ui'      => true,
			'show_in_rest' => true,
			'hierarchical' => false,
		];

		register_taxonomy( self::SCRIPTURES, [ self::BLOG, self::EPISODE ], $args );
	}
}
