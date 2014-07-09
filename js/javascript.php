<?php

function wp_adding_classie_js() {
    wp_register_script('classie_js', get_stylesheet_directory_uri() . '/js/classie.js', array('jquery'));
    wp_enqueue_script('classie_js');
}

add_action( 'wp_enqueue_scripts', 'wp_adding_classie_js' );

function my_google_maps_api_v3(){
    wp_register_script('google-maps','https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places');
    wp_enqueue_script('google-maps');
}
add_action( 'wp_enqueue_scripts', 'my_google_maps_api_v3' );

function my_google_maps_script(){
    wp_register_script('google-maps-script', get_stylesheet_directory_uri() . '/js/google-maps-api.js','',"1.0",true);
    wp_enqueue_script('google-maps-script');
}
add_action( 'wp_enqueue_scripts', 'my_google_maps_script' );
?>