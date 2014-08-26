<?php
	/*  PHP Document                               */
	/*  Code to include in the functions.php file  */
	
	
	/* Marquee - post type */
	function create_post_type_marquee() {
		register_post_type('marquee_panel',
			array(
				'labels' => array(
					'name' => __('Marquee'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('Panel')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon'=> get_template_directory_uri().'/myMarquee/images/admin_marquee_icon.png',
				'rewrite' => array('slug' => 'learnmore', 'with_front' => false), // Permalinks format
				'supports' => array('title','editor','thumbnail')
			)
		);
	}
	add_action('init','create_post_type_marquee');


	/* Marquee - register custom JavaScript files */
	function load_marquee_scripts(){
		
		//wp_register_script('jquery', 'http://code.jquery.com/jquery-1.11.0.min.js');
		wp_register_script('marquee_js', get_template_directory_uri().'/myMarquee/js/marquee.js', array('jquery'));
		
		//wp_enqueue_script('jquery');
		wp_enqueue_script('marquee_js');
	
	}
	add_action('wp_enqueue_scripts', 'load_marquee_scripts');


?>