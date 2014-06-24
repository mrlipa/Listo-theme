<?php

include_once(ABSPATH . 'wp-content/themes/Listo-theme/test.php');

include_once(ABSPATH . 'wp-content/themes/Listo-theme/php/custom-post-types/place.php');

include_once(ABSPATH . 'wp-content/themes/Listo-theme/php/login.php');

//include_once(ABSPATH . 'wp-content/themes/Listo-theme/php/buddypress.php');

//include_once(ABSPATH . 'wp-content/themes/Listo-theme/php/woocommerce_product_template.php');

//function my_login_stylesheet() {
//    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/stylesheets/style-login.css' );
//}
//add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

add_action( 'wp_enqueue_scripts', 'jk_load_dashicons' );
function jk_load_dashicons() {
    wp_enqueue_style( 'dashicons' );
}



