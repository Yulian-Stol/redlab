<?php 

//------------------Register Custom Post Sleep----------------------
function event_post_type() {
	$labels = array(
		'name'                  => _x( 'Event', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Event', 'text_domain' ),
		'all_items'             => __( 'Event', 'text_domain' ),
		'add_new_item'          => __( 'Добавити Event', 'text_domain' ),
		'add_new'               => __( 'Добавити Event', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'thumbnail','title', 'editor','excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);
	register_post_type( 'event', $args );

	// Register 'year' taxonomy
	register_taxonomy(
		'year',
		'event',
		array(
			'label' => __( 'Year', 'text_domain' ),
			'rewrite' => array( 'slug' => 'year' ),
			'hierarchical' => true,
			'show_in_rest' => true,
		)
	);

	// Register 'month' taxonomy
	register_taxonomy(
		'month',
		'event',
		array(
			'label' => __( 'Month', 'text_domain' ),
			'rewrite' => array( 'slug' => 'month' ),
			'hierarchical' => true,
			'show_in_rest' => true,
		)
	);

	// Register 'place' taxonomy
	register_taxonomy(
		'place',
		'event',
		array(
			'label' => __( 'Place', 'text_domain' ),
			'rewrite' => array( 'slug' => 'place' ),
			'hierarchical' => true,
			'show_in_rest' => true,
		)
	);
}

add_action( 'init', 'event_post_type', 0 );
