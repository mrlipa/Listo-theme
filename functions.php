<?php



//Test
//include_once(ABSPATH . 'wp-content/themes/Listo-theme/test.php');

// Login and general
include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/login.php');

// Woocommerce
include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/woocommerce/woocommerce_product_template.php');

// Buddypress
include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/buddypress/bp_nav_icons.php');

// To be activated when challenges are ready
//include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/buddypress/bp_challenges.php');

include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/buddypress/bp_woo_adresse.php');

//To be activated when favorites is ready
//include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/buddypress/bp_favorites.php');

include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/buddypress/bp_places.php');

include_once(ABSPATH . 'wp-content/themes/Listo-theme/js/javascript.php');


// Custom Post Types & Taxonomy (Models & Controlers)
include_once(ABSPATH . 'wp-content/themes/Listo-theme/app/custom-post-types/place.php');



//function my_login_stylesheet() {
//    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/stylesheets/style-login.css' );
//}
//add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

//add_action()



