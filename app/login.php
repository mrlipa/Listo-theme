<?php

/*Add style sheet for the login page*/
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/stylesheets/style-login.css' );
}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


/*Remove admin bar from the front end except the administrators*/
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {

        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

?>