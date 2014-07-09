<?php

add_action('init','places_post_type');
function places_post_type(){

    $places_labels = array(
        'name'              => 'Places',
        'singular_name'     => 'Place',
        'menu_name'         => 'Places',
        'name_admin_bar'    => 'Place',
        'add_new'           => 'Add new place',
        'add_new_item'      => 'Add new place',
        'edit_item'         => 'Edit place',
        'new_item'          => 'New place',
        'view_item'         => 'View place',
        'all_items'         => 'All Places',
        'search_items'      => 'Search for places',
        'not_found'         => 'No places found',
        'not_found_in_trash'=> 'No places found in trash',
        'parent_item_colon' => '',
        'menu_name'         => 'Places'

    );

    $args = array(
        'labels'            => $places_labels,
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-admin-site',
        'rewrite'           => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'taxonomies'        => array( 'category', 'post_tag' ),
        'menu_position'     => 5,
        'supports'          => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
        'has_archive'       => true
    );

    register_post_type('places', $args);
}


// Custom Taxonomies
function my_custom_taxonomies() {

    // Type of Places taxonomy
    $labels = array(
        'name'              => 'Locations',
        'singular_name'     => 'Location',
        'search_items'      => 'Search locations',
        'all_items'         => 'All locations',
        'parent_item'       => 'Parent location',
        'parent_item_colon' => 'Parent location:',
        'edit_item'         => 'Edit Location',
        'update_item'       => 'Update Location',
        'add_new_item'      => 'Add Location',
        'new_item_name'     => 'New Location Name',
        'menu_name'         => 'Location',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'locations' ),
    );

    register_taxonomy( 'locations', array( 'places','products' ), $args );

    // Mood taxonomy (non-hierarchical)
    $labels = array(
        'name'                       => 'Types of place',
        'singular_name'              => 'Type',
        'search_items'               => 'Types of place',
        'popular_items'              => 'Popular type of places',
        'all_items'                  => 'All types of places',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit Type of place',
        'update_item'                => 'Update Type of place',
        'add_new_item'               => 'Add New Type of place',
        'new_item_name'              => 'New Type of Place Name',
        'separate_items_with_commas' => 'Separate type of place with commas',
        'add_or_remove_items'        => 'Add or remove types of place',
        'choose_from_most_used'      => 'Choose from the most used moods',
        'not_found'                  => 'No types of place found.',
        'menu_name'                  => 'Types of places',
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'place-types' ),
    );

    register_taxonomy( 'place-types', array( 'places', 'post' ), $args );
}

add_action( 'init', 'my_custom_taxonomies' );

?>