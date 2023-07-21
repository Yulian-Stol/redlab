<?php

//------------------додавання css + js ----------------------
function ewa_scripts() {
	//---------------css---------------------
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/app.min.css' );

	//---------------js---------------------
	wp_enqueue_script( 'main-sctipt', get_template_directory_uri() . '/assets/js/app.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ewa_scripts' );

function enqueue_custom_scripts() {

  $ajax_url = esc_url( admin_url('admin-ajax.php') );

  wp_enqueue_script( 'filter-posts', get_template_directory_uri() . '/assets/js/filter-posts.js', array( 'jquery' ), '1.0', true );

  wp_localize_script( 'filter-posts', 'ajax_object', array( 'ajax_url' => $ajax_url ) );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );


