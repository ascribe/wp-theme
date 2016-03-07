<?php

function ascribe_register_cpt_team() {
    $labels = array(
        "name" => "Team Members",
        "singular_name" => "Team Member",
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
        "rewrite" => array( "slug" => "team", "with_front" => true ),
        "query_var" => true,
    );
    register_post_type( "team", $args );
}

add_action( 'init', 'ascribe_register_cpt_team' );

?>
