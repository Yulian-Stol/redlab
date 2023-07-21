<?php

function filter_posts_callback() {
	$selected_years = isset($_POST['years']) ? $_POST['years'] : array();
	$selected_months = isset($_POST['months']) ? $_POST['months'] : array();
	$selected_places = isset($_POST['places']) ? $_POST['places'] : array();

	$selected_years = array_map('urldecode', $selected_years);
	$selected_months = array_map('urldecode', $selected_months);
	$selected_places = array_map('urldecode', $selected_places);

	$args = array(
			'post_type' => 'event',
			'posts_per_page' => -1,
			'tax_query' => array(
					'relation' => 'AND',
			),
	);

	if (!empty($selected_years)) {
			$args['tax_query'][] = array(
					'taxonomy' => 'year',
					'field' => 'slug',
					'terms' => $selected_years,
					'include_children' => false,
			);
	}

	if (!empty($selected_months)) {
			$args['tax_query'][] = array(
					'taxonomy' => 'month',
					'field' => 'slug',
					'terms' => $selected_months,
					'include_children' => false,
			);
	}

	if (!empty($selected_places)) {
			$args['tax_query'][] = array(
					'taxonomy' => 'place',
					'field' => 'slug',
					'terms' => $selected_places,
					'include_children' => false,
			);
	}

	$custom_query = new WP_Query($args);

	if ($custom_query->have_posts()) {
			while ($custom_query->have_posts()) {
					$custom_query->the_post();
					$post_id = get_the_ID();
					$title = get_the_title();
					$year = wp_get_post_terms($post_id, 'year', array('fields' => 'names'));
					$month = wp_get_post_terms($post_id, 'month', array('fields' => 'names'));
					$place = wp_get_post_terms($post_id, 'place', array('fields' => 'names'));

					echo '<h2>' . $title . '</h2>';
					echo '<p>Year: ' . (empty($year) ? 'N/A' : implode(', ', $year)) . '</p>';
					echo '<p>Month: ' . (empty($month) ? 'N/A' : implode(', ', $month)) . '</p>';
					echo '<p>Place: ' . (empty($place) ? 'N/A' : implode(', ', $place)) . '</p>';
			}
			wp_reset_postdata();
	} else {
			echo '<p>No events found.</p>';
	}
	exit();
}

add_action('wp_ajax_filter_posts', 'filter_posts_callback');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_callback');
