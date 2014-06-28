<?php 

function wp_adding_classie_js() {
    wp_register_script('classie_js', get_stylesheet_directory_uri() . '/js/classie.js', array('jquery'));
    wp_enqueue_script('classie_js');
}

add_action( 'wp_enqueue_scripts', 'wp_adding_classie_js' );

?>

