<?php

add_action('init','places_post_type');
function places_post_type(){

    $places_labels = array(
        'name'              => _x('Places', 'post type general name'),
        'singular_name'     => _x('Place', 'post type singular name'),
        'all_items'         => __('All Places'),
        'add_new'           => _x('Add new place', 'places'),
        'add_new_item'      => __('Add new place'),
        'edit_item'         => __('Edit place'),
        'new_item'          => __('New place'),
        'view_item'         => __('View place'),
        'search_items'      => __('Search in places'),
        'not_found'         => __('No places found'),
        'not_found_in_trash'=> __('No places found in trash'), 
        'parent_item_colon' => '',
        'menu_name'         => 'Places'

    );

    $args = array(
        'labels'            => $places_labels,
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-admin-site',
        'rewrite'           => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'menu_position'     => 5,
        'supports'          => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
        'has_archive'       => 'recipes'
    );

    register_post_type('places', $args);
}

?>