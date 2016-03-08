<?php

add_action( 'init', 'ascribe_register_cpt_testimonial' );

function ascribe_register_cpt_testimonial() {
	$labels = array(
		"name" => "Testimonials",
		"singular_name" => "Testimonial",
		"menu_name" => "Testimonials",
		"all_items" => "All Testimonials",
		"add_new" => "Add New",
		"add_new_item" => "Add New Testimonial",
		"edit" => "Edit",
		"edit_item" => "Edit Testimonial",
		"new_item" => "New Testimonial",
		"view" => "View",
		"view_item" => "View Testimonial",
		"search_items" => "Search Testimonial",
		"not_found" => "No Testimonials found",
		"not_found_in_trash" => "No Testimonials found in Trash",
		"parent" => "Parent Testimonial",
	);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => false,
		"query_var" => true,
        "menu_icon" => 'dashicons-format-quote'

	);
	register_post_type( "testimonial", $args );
}

?>
