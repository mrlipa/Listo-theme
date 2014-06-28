<?php
add_action( 'bp_setup_nav', 'my_places_nav' );
function my_places_nav(){
    global $bp;
    //$profile_link = trailingslashit( $bp->loggedin_user->domain . $bp->profile->slug );
    bp_core_new_nav_item(
        array(
            'name' => __("<i class='fa fa-globe'></i> Places", 'buddypress'),
            'slug' => "places",
            'position' => 50,
            //'parent_url' => $profile_link,
            'show_for_displayed_user' => false,
            'screen_function' => 'bp_listo_places_screen',
            'default_subnav_slug' => 'visited-places',
            'item_css_id' => "places"
        )
    );
}

/*function bp_listo_places_screen() {
    add_action( 'bp_template_title', 'bp_listo_places_screen_title' );
    add_action( 'bp_template_content', 'bp_listo_places_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function bp_listo_places_screen_title() {
    echo 'Lieux';
}

function bp_listo_places_screen_content() {
    include (ABSPATH.'wp-content/themes/Listo-theme/buddypress/members/single/places.php');
}*/

add_action( 'bp_setup_nav', 'my_visited_places_nav' );
function my_visited_places_nav(){
    global $bp;
    $places_link = trailingslashit( $bp->loggedin_user->domain . $bp->places->slug );
    bp_core_new_subnav_item(
        array(
            'name' => __("Lieux visités", 'buddypress'),
            'slug' => "visited-places",
            'position' => 50,
            'parent_url' => $places_link.'places',
            'parent_slug' => 'places',
            'show_for_displayed_user' => false,
            'screen_function' => 'bp_listo_visited_places_screen',
            'default_subnav_slug' => 'visited-places',
            'item_css_id' => "places"
        )
    );
}

function bp_listo_visited_places_screen() {
    add_action( 'bp_template_title', 'bp_listo_visited_places_screen_title' );
    add_action( 'bp_template_content', 'bp_listo_visited_places_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function bp_listo_visited_places_screen_title() {
    echo 'Mes Lieux visités';
}

function bp_listo_visited_places_screen_content() {
    include (ABSPATH.'wp-content/themes/Listo-theme/buddypress/members/single/visited-places.php');
}


add_action( 'bp_setup_nav', 'my_places_to_discover_nav' );
function my_places_to_discover_nav(){
    global $bp;
    $places_link = trailingslashit( $bp->loggedin_user->domain . $bp->places->slug );
    bp_core_new_subnav_item(
        array(
            'name' => __("Lieux à découvrir", 'buddypress'),
            'slug' => "places-to-discover",
            'position' => 50,
            'parent_url' => $places_link."/places/",
            'parent_slug' => 'places',
            'show_for_displayed_user' => false,
            'screen_function' => 'bp_listo_places_to_discover_screen',
            'item_css_id' => "places-to-discover"
        )
    );
}

function bp_listo_places_to_discover_screen() {
    add_action( 'bp_template_title', 'bp_listo_places_to_discover_screen_title' );
    add_action( 'bp_template_content', 'bp_listo_places_to_discover_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function bp_listo_places_to_discover_screen_title() {
    echo 'Lieux à découvrir';
}

function bp_listo_places_to_discover_screen_content() {
    include (ABSPATH.'wp-content/themes/Listo-theme/buddypress/members/single/places-discover.php');
}

?>