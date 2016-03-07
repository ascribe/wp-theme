<?php

function ascribe_register_cpt_event() {
	$labels = array(
		"name" => "Events",
		"singular_name" => "Event",
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
		"rewrite" => array( "slug" => "event", "with_front" => true ),
		"query_var" => true,

		"supports" => array( "title" ),
	);
	register_post_type( "event", $args );
}

add_action( 'init', 'ascribe_register_cpt_event' );

?>
