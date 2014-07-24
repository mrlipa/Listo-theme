<?php

/**
 * Add the field to the checkout
 * https://gist.github.com/mikejolley/1604009
 **/
add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');

function my_custom_checkout_field( $checkout ) {
    global $woocommerce;

    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

    echo '<div id="my_custom_listo_checkout_field"><h3>'.'Passenger information'.'</h3>';

    echo '<script language="javascript">
        jQuery(document).ready(function(){
            var formats = ["dd.mm.yy","dd.mm.yy"];
            jQuery(".passeport_expiry_date_field").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat:"dd.mm.yy",
            });
        });
    </script>';

    woocommerce_form_field( 'my_nationality_field', array(
        'type'          => 'country',
        'class'         => array('my-nationality-field'),
        'label'         => __('Nationality'),
        'placeholder'   => __('ex: Suisse'),
        'required'      => true,
    ), $checkout->get_value( 'my_nationality_field'));

    woocommerce_form_field( 'my_passeport_number_field', array(
        'type'          => 'text',
        'class'         => array('my-passeport-number-field form-row-first'),
        'label'         => __('Passport n°'),
        'placeholder'   => __('Enter your passeport number'),
    ), $checkout->get_value( 'my_passeport_number_field' ));

    woocommerce_form_field( 'my_passeport_expiry_field', array(
        'type'          => 'text',
        'class'         => array('my-passeport-expliry-field form-row-last'),
        'input_class'   => array('passeport_expiry_date_field'),
        'label'         => __('Passeport expiry date'),
        'placeholder'   => __('Passport expiry date'),
    ), $checkout->get_value( 'my_passeport_expiry_field' ));

    $qty =  $woocommerce->cart->cart_contents_count;
    if ($qty > 1){
        echo "<h3>Other passengers</h3>";
        $i = 2;
        while ($i <= $qty ) {
            echo "<h4>Passenger ". $i ."</h4>";
            $passanger_lastname_field = 'passanger_lastname_field_'.$i;
            woocommerce_form_field( $passanger_lastname_field, array(
                'type'          => 'text',
                'class'         => array('lastname-class form-row-first'),
                'label'         => __('Lastname'),
                'placeholder'   => __('Lastname'),
            ), $checkout->get_value( $passanger_lastname_field ));

            $passanger_name_field = 'passanger_name_field_'.$i;
            woocommerce_form_field( $passanger_name_field, array(
                'type'          => 'text',
                'class'         => array('name-class form-row-last'),
                'label'         => __('Name'),
                'placeholder'   => __('Name'),
            ), $checkout->get_value( $passanger_name_field ));

            $passanger_nationality_field = 'passanger_nationality_field_'.$i;
            woocommerce_form_field( $passanger_nationality_field, array(
                'type'          => 'country',
                'class'         => array('nationality-class'),
                'label'         => __('Nationality'),
                'placeholder'   => __('Nationality'),
            ), $checkout->get_value( $passanger_name_field ));

            $passanger_passport_field = 'passanger_passport_field_'.$i;
            woocommerce_form_field( $passanger_passport_field, array(
                'type'          => 'text',
                'class'         => array('passport-class form-row-first'),
                'label'         => __('Passport number'),
                'placeholder'   => __('Enter your passport number'),
            ), $checkout->get_value( $passanger_passport_field ));

            $passanger_expiry_field = 'passenger_expiry_field_'.$i;
            woocommerce_form_field( $passanger_expiry_field, array(
                'type'          => 'text',
                'class'         => array('passenger-expliry-field form-row-last'),
                'input_class'   => array('passeport_expiry_date_field'),
                'label'         => __('Passeport expiry date'),
                'placeholder'   => __('Passport expiry date'),
            ), $checkout->get_value( $passanger_expiry_field ));

            $i++;
        }
    }

    echo '</div>';

}




* Update the user meta with field value
    **/
add_action('woocommerce_checkout_update_user_meta', 'my_custom_checkout_field_update_user_meta');

function my_custom_checkout_field_update_user_meta( $user_id ) {
    if ($user_id && $_POST['my_nationality_field']) update_user_meta( $user_id, 'my_nationality_field', esc_attr($_POST['my_nationality_field']) );
}   if ($user_id && $_POST['my-passeport-number-field']) update_user_meta( $user_id, 'my-passeport-number-field', esc_attr($_POST['my-passeport-number-field']) );
if ($user_id && $_POST['my_passeport_expiry_field']) update_user_meta( $user_id, 'my_passeport_expiry_field', esc_attr($_POST['my_passeport_expiry_field']) );

/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
    global $woocommerce;

    if ($_POST['my_nationality_field']) update_post_meta( $order_id, 'Nationality', esc_attr($_POST['my_nationality_field']));
    if ($_POST['my_passeport_number_field']) update_post_meta( $order_id, 'Passport Number', esc_attr($_POST['my_passeport_number_field']));
    if ($_POST['my_passeport_expiry_field']) update_post_meta( $order_id, 'Expiry Date', esc_attr($_POST['my_passeport_expiry_field']));

    $qty =  $woocommerce->cart->cart_contents_count;
    if ( $qty = 2 ){
        if ($_POST['passanger_lastname_field_2']) update_post_meta( $order_id, 'Lastname Field 2', esc_attr($_POST['passanger_lastname_field_2']));
        if ($_POST['passanger_name_field_2']) update_post_meta( $order_id, 'Name Field 2', esc_attr($_POST['passanger_name_field_2']));
        if ($_POST['passanger_nationality_field_2']) update_post_meta( $order_id, 'Nationality Field 2', esc_attr($_POST['passanger_nationality_field_2']));
        if ($_POST['passanger_passport_field_2']) update_post_meta( $order_id, 'Passport Field 2', esc_attr($_POST['passanger_passport_field_2']));
        if ($_POST['passenger_expiry_field_2']) update_post_meta( $order_id, 'Expiry Field 2', esc_attr($_POST['passenger_expiry_field_2']));
    }
    if ( $qty = 3 ){
        if ($_POST['passanger_lastname_field_2']) update_post_meta( $order_id, 'Lastname Field 2', esc_attr($_POST['passanger_lastname_field_2']));
        if ($_POST['passanger_name_field_2']) update_post_meta( $order_id, 'Name Field 2', esc_attr($_POST['passanger_name_field_2']));
        if ($_POST['passanger_nationality_field_2']) update_post_meta( $order_id, 'Nationality Field 2', esc_attr($_POST['passanger_nationality_field_2']));
        if ($_POST['passanger_passport_field_2']) update_post_meta( $order_id, 'Passport Field 2', esc_attr($_POST['passanger_passport_field_2']));
        if ($_POST['passenger_expiry_field_2']) update_post_meta( $order_id, 'Expiry Field 2', esc_attr($_POST['passenger_expiry_field_2']));

        if ($_POST['passanger_lastname_field_3']) update_post_meta( $order_id, 'Lastname Field 3', esc_attr($_POST['passanger_lastname_field_3']));
        if ($_POST['passanger_name_field_3']) update_post_meta( $order_id, 'Name Field 3', esc_attr($_POST['passanger_name_field_3']));
        if ($_POST['passanger_nationality_field_3']) update_post_meta( $order_id, 'Nationality Field 3', esc_attr($_POST['passanger_nationality_field_3']));
        if ($_POST['passanger_passport_field_3']) update_post_meta( $order_id, 'Passport Field 3', esc_attr($_POST['passanger_passport_field_3']));
        if ($_POST['passenger_expiry_field_3']) update_post_meta( $order_id, 'Expiry Field 3', esc_attr($_POST['passenger_expiry_field_3']));
    }

    if ( $qty = 4 ){
        if ($_POST['passanger_lastname_field_2']) update_post_meta( $order_id, 'Lastname Field 2', esc_attr($_POST['passanger_lastname_field_2']));
        if ($_POST['passanger_name_field_2']) update_post_meta( $order_id, 'Name Field 2', esc_attr($_POST['passanger_name_field_2']));
        if ($_POST['passanger_nationality_field_2']) update_post_meta( $order_id, 'Nationality Field 2', esc_attr($_POST['passanger_nationality_field_2']));
        if ($_POST['passanger_passport_field_2']) update_post_meta( $order_id, 'Passport Field 2', esc_attr($_POST['passanger_passport_field_2']));
        if ($_POST['passenger_expiry_field_2']) update_post_meta( $order_id, 'Expiry Field 2', esc_attr($_POST['passenger_expiry_field_2']));

        if ($_POST['passanger_lastname_field_3']) update_post_meta( $order_id, 'Lastname Field 3', esc_attr($_POST['passanger_lastname_field_3']));
        if ($_POST['passanger_name_field_3']) update_post_meta( $order_id, 'Name Field 3', esc_attr($_POST['passanger_name_field_3']));
        if ($_POST['passanger_nationality_field_3']) update_post_meta( $order_id, 'Nationality Field 3', esc_attr($_POST['passanger_nationality_field_3']));
        if ($_POST['passanger_passport_field_3']) update_post_meta( $order_id, 'Passport Field 3', esc_attr($_POST['passanger_passport_field_3']));
        if ($_POST['passenger_expiry_field_3']) update_post_meta( $order_id, 'Expiry Field 3', esc_attr($_POST['passenger_expiry_field_3']));

        if ($_POST['passanger_lastname_field_4']) update_post_meta( $order_id, 'Lastname Field 4', esc_attr($_POST['passanger_lastname_field_4']));
        if ($_POST['passanger_name_field_4']) update_post_meta( $order_id, 'Name Field 4', esc_attr($_POST['passanger_name_field_4']));
        if ($_POST['passanger_nationality_field_4']) update_post_meta( $order_id, 'Nationality Field 4', esc_attr($_POST['passanger_nationality_field_4']));
        if ($_POST['passanger_passport_field_4']) update_post_meta( $order_id, 'Passport Field 4', esc_attr($_POST['passanger_passport_field_4']));
        if ($_POST['passenger_expiry_field_4']) update_post_meta( $order_id, 'Expiry Field 3', esc_attr($_POST['passenger_expiry_field_4']));
    }

    if ( $qty = 5 ){
        if ($_POST['passanger_lastname_field_2']) update_post_meta( $order_id, 'Lastname Field 2', esc_attr($_POST['passanger_lastname_field_2']));
        if ($_POST['passanger_name_field_2']) update_post_meta( $order_id, 'Name Field 2', esc_attr($_POST['passanger_name_field_2']));
        if ($_POST['passanger_nationality_field_2']) update_post_meta( $order_id, 'Nationality Field 2', esc_attr($_POST['passanger_nationality_field_2']));
        if ($_POST['passanger_passport_field_2']) update_post_meta( $order_id, 'Passport Field 2', esc_attr($_POST['passanger_passport_field_2']));
        if ($_POST['passenger_expiry_field_2']) update_post_meta( $order_id, 'Expiry Field 2', esc_attr($_POST['passenger_expiry_field_2']));

        if ($_POST['passanger_lastname_field_3']) update_post_meta( $order_id, 'Lastname Field 3', esc_attr($_POST['passanger_lastname_field_3']));
        if ($_POST['passanger_name_field_3']) update_post_meta( $order_id, 'Name Field 3', esc_attr($_POST['passanger_name_field_3']));
        if ($_POST['passanger_nationality_field_3']) update_post_meta( $order_id, 'Nationality Field 3', esc_attr($_POST['passanger_nationality_field_3']));
        if ($_POST['passanger_passport_field_3']) update_post_meta( $order_id, 'Passport Field 3', esc_attr($_POST['passanger_passport_field_3']));
        if ($_POST['passenger_expiry_field_3']) update_post_meta( $order_id, 'Expiry Field 3', esc_attr($_POST['passenger_expiry_field_3']));

        if ($_POST['passanger_lastname_field_4']) update_post_meta( $order_id, 'Lastname Field 4', esc_attr($_POST['passanger_lastname_field_4']));
        if ($_POST['passanger_name_field_4']) update_post_meta( $order_id, 'Name Field 4', esc_attr($_POST['passanger_name_field_4']));
        if ($_POST['passanger_nationality_field_4']) update_post_meta( $order_id, 'Nationality Field 4', esc_attr($_POST['passanger_nationality_field_4']));
        if ($_POST['passanger_passport_field_4']) update_post_meta( $order_id, 'Passport Field 4', esc_attr($_POST['passanger_passport_field_4']));
        if ($_POST['passenger_expiry_field_4']) update_post_meta( $order_id, 'Expiry Field 4', esc_attr($_POST['passenger_expiry_field_4']));

        if ($_POST['passanger_lastname_field_5']) update_post_meta( $order_id, 'Lastname Field 5', esc_attr($_POST['passanger_lastname_field_5']));
        if ($_POST['passanger_name_field_5']) update_post_meta( $order_id, 'Name Field 5', esc_attr($_POST['passanger_name_field_5']));
        if ($_POST['passanger_nationality_field_5']) update_post_meta( $order_id, 'Nationality Field 5', esc_attr($_POST['passanger_nationality_field_5']));
        if ($_POST['passanger_passport_field_5']) update_post_meta( $order_id, 'Passport Field 5', esc_attr($_POST['passanger_passport_field_5']));
        if ($_POST['passenger_expiry_field_5']) update_post_meta( $order_id, 'Expiry Field 5', esc_attr($_POST['passenger_expiry_field_5']));
    }
}

/**
 * Add the field to order emails
 **/
add_filter('woocommerce_email_order_meta_keys', 'my_custom_checkout_field_order_meta_keys');

function my_custom_checkout_field_order_meta_keys( $keys ) {
    $keys[] = 'Nationality';
    $keys[] = 'Passport Number';
    $keys[] = 'Expiry Date';

    $keys[] = 'Lastname Field 2';
    $keys[] = 'Name Field 2';
    $keys[] = 'Nationality Field 2';
    $keys[] = 'Passport Field 2';
    $keys[] = 'Expiry Field 2';

    $keys[] = 'Lastname Field 3';
    $keys[] = 'Name Field 3';
    $keys[] = 'Nationality Field 3';
    $keys[] = 'Passport Field 3';
    $keys[] = 'Expiry Field 3';

    $keys[] = 'Lastname Field 4';
    $keys[] = 'Name Field 4';
    $keys[] = 'Nationality Field 4';
    $keys[] = 'Passport Field 4';
    $keys[] = 'Expiry Field 4';

    $keys[] = 'Lastname Field 5';
    $keys[] = 'Name Field 5';
    $keys[] = 'Nationality Field 5';
    $keys[] = 'Passport Field 5';
    $keys[] = 'Expiry Field 5';

    return $keys;
}


?>