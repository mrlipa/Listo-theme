<?php

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

remove_action ( 'woocommerce_after_single_product_summary' , 'woocommerce_output_product_data_tabs', 10);
remove_action ( 'woocommerce_after_single_product_summary' , 'hooked woocommerce_output_related_products', 20);

add_action ( 'woocommerce_single_product_title_description', 'woocommerce_template_single_title', 5);
add_action ( 'woocommerce_single_product_title_description', 'woocommerce_template_single_excerpt', 10 );

add_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5);
add_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

add_action ( 'woocommerce_data_after_product_summary' , 'woocommerce_output_product_data_tabs', 10);
add_action ( 'woocommerce_related_products_before_reviews', 'woocommerce_output_related_products', 10);

