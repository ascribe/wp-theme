<?php

function ascribe_register_cpt_career() {
	$labels = array(
		"name" => "Careers",
		"singular_name" => "Career",
	);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "career", "with_front" => true ),
		"query_var" => true,
        "menu_icon" => 'dashicons-businessman'

	);
	register_post_type( "career", $args );
}

add_action( 'init', 'ascribe_register_cpt_career' );

?>
