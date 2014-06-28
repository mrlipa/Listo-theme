<?php

add_action( 'bp_setup_nav', 'my_accomplisshments_nav' );
function my_accomplisshments_nav(){
    global $bp;
    $profile_link = trailingslashit( $bp->loggedin_user->domain . $bp->profile->slug );
    bp_core_new_nav_item(
        array(
            'name' => __('Challenges', 'buddypress'),
            'slug' => "challenges",
            'position' => 50,
            'parent_url' => $profile_link,
            'show_for_displayed_user' => false,
            'screen_function' => 'bp_listo_profile_challenges_screen',
            'default_subnav_slug' => 'inbox',
            'item_css_id' => "challenges"
        )
    );
}

function bp_listo_profile_challenges_screen() {
    add_action( 'bp_template_title', 'bp_listo_profile_challenges_screen_title' );
    add_action( 'bp_template_content', 'bp_listo_profile_challenges_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function bp_listo_profile_challenges_screen_title() {
    echo 'Mes challenges';
}

function bp_listo_profile_challenges_screen_content() {
    include (ABSPATH.'wp-content/themes/Listo-theme/buddypress/members/single/challenge.php');
    Echo "hello";
}


//-----------------------------------------------------------------------------------------

// Add the Membership sub-navigation menu item to BuddyPress' Profile navigation array
add_action( 'bp_setup_nav', 'my_woo_info_nav' );
function my_woo_info_nav() {
    global $bp;
    $profile_link = trailingslashit( $bp->loggedin_user->domain . $bp->profile->slug );
    bp_core_new_subnav_item(
        array(
            'name' => __( 'Adresse', 'buddypress' ),
            'slug' => 'my-address',
            'parent_url' => $profile_link,
            'parent_slug' => $bp->profile->slug,
            'screen_function' => 'bp_woo_profile_subscription_screen',
            'position' => 30,
            'item_css_id' => 'my-address'
        )
    );
}

// This is the screen_function used by BuddyPress' navigation
function bp_woo_profile_subscription_screen() {
    add_action( 'bp_template_title', 'bp_woo_profile_subscription_screen_title' );
    add_action( 'bp_template_content', 'bp_woo_profile_subscription_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

// Echo the screen title
function bp_woo_profile_subscription_screen_title() {
    echo 'My Address Settings';
}

// Add the WooCommerce My Account shortcode to the screen
function bp_woo_profile_subscription_screen_content() {
    echo do_shortcode( '[woocommerce_my_account]' );
}

// When an address is updated, redirect paying members back to BuddyPress profile
add_action( 'woocommerce_customer_save_address', 'save_address_locate_to_bp_profile' );
function save_address_locate_to_bp_profile() {
    global $bp;

    if( current_user_can( 'members' ) ) {
        wp_safe_redirect( $bp->loggedin_user->domain . $bp->profile->slug . '/my-address/' );
        exit;
    }
}



?>