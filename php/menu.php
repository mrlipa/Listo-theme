<?php

add_filter( 'wp_nav_menu_items', 'modal_menu_search', 1, 2 );
function modal_menu_search( $items, $args ) {
    echo '
		  		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  			<div class="modal-dialog">
		  		   		<div class="modal-content">
		  		   			<div class="modal-body">';
    /*the_widget( "YITH_WCAS_Ajax_Search_Widget" );*/
    the_widget( "WC_Widget_Product_Search" );
    echo '</div>
		  		   		</div>
		  		   	</div>
		  		</div>';
    if ($args->theme_location == 'main_nav') {
        if (!is_home()) {
            $items .= '<li><a class="fa fa-search" data-toggle="modal" data-target="#myModal"></a></li>';
        }

    }
    return $items;
}

?>