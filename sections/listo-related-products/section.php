<?php
/*
	Section: Related Products
	Author: Gabriel Zambrano
	Author URI: http://www.zambrano.ch
	Description: Displays related products
	Class Name: PageLinesListoRelatedProducts
	Cloning: true
	Workswith: main, templates, sidebar_wrap
	Filter: Components
*/

/**
 * Main section class
 *
 * @package PageLines DMS
 * @author PageLines
 */
class PageLinesListoRelatedProducts extends PageLinesSection {
	
	/**
	 * Load styles and scripts
	 */
	function section_styles(){}

	function old_section_head(){}

	/**
	* Section template.
	*/
   	function section_template() {
		?>
			<div class="listo-related-products">
				<?php do_action ('woocommerce_related_products_before_reviews'); ?>
			</div>

		<?php 
	}

	function do_defaults(){}


	function section_opts(){}
	
}
