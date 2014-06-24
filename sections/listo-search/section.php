<?php
/*
	Section: Modal Search
	Author: PageLines
	Author URI: http://www.pagelines.com
	Description: A modal search section that uses yith woocommerce ajax search plugin
	Class Name: ListoModalSeach
	Cloning: true
	Workswith: main, templates, sidebar_wrap
	Filter: slider
*/

/**
 * Main section class
 *
 * @package PageLines DMS
 * @author PageLines
 */
class ListoModalSeach extends PageLinesSection {

	var $default_limit = 2;

	/**
	 * Load styles and scripts
	 */
	function section_styles(){

	}

	function old_section_head(){
    }

	/**
	* Section template.
	*/
   function section_template() {



	}

	function do_defaults(){

	
	}

	

	function section_opts(){
		
			$options = array();

			$options[] = array(

				'title' => __( 'Slider Configuration', 'pagelines' ),
				'type'	=> 'multi',
				'opts'	=> array(
					array(
						'key'			=> 'quick_transition',
						'type' 			=> 'select',
						'default'		=> 'fade',
						'label' 	=> __( 'Select Transition Type', 'pagelines' ),
						'opts' => array(
							'fade' 			=> array('name' => __( 'Use Fading Transition', 'pagelines' ) ),
							'slide_h' 		=> array('name' => __( 'Use Slide/Horizontal Transition', 'pagelines' ) ),
						),
					), 
					array(
						'key'			=> 'quick_slideshow',
						'type' 			=> 'check',
						'label' 	=> __( 'Animate Slideshow Automatically?', 'pagelines' ),
					
					)
				)

			);


			$options[] = array(
				'key'		=> 'quickslider_array',
		    	'type'		=> 'accordion', 
				'col'		=> 2,
				'title'		=> __('Slides Setup', 'pagelines'), 
				'post_type'	=> __('Slide', 'pagelines'), 
				'opts'	=> array(
					array(
						'key'		=> 'image',
						'label' 	=> __( 'Slide Background Image', 'pagelines' ),
						'type'		=> 'image_upload',
						'sizelimit'	=> 2097152, // 2M
						'help'		=> __( 'For high resolution, 2000px wide x 800px tall images. (2MB Limit)', 'pagelines' )

					),

					array(
						'key'	=> 'text',
						'label'	=> __( 'Slide Text', 'pagelines' ),
						'type'			=> 'text'
					),
					array(
						'key'	=> 'link',
						'label'	=> __( 'Slide Link URL', 'pagelines' ),
						'type'			=> 'text'
					),
					


				)
		    );
		
		return $options;
		
	}
	
}
