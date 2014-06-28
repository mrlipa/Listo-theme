<?php


add_action( 'bp_setup_nav', 'my_challenges_nav' );
function my_challenges_nav(){
    global $bp;
    $profile_link = trailingslashit( $bp->loggedin_user->domain . $bp->profile->slug );
    bp_core_new_nav_item(
        array(
            'name' => __("<i class='fa fa-trophy'></i> Challenges", 'buddypress'),
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
    include (ABSPATH.'wp-content/themes/Listo-theme/buddypress/members/single/challenges.php');
}

?>