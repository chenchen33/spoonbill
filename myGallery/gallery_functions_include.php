<?php

	function load_my_scripts(){


		wp_register_script( 'mygallery_lightbox', get_template_directory_uri() . '/myGallery/lightbox/js/lightbox.min.js', array( 'jquery' ) );
		wp_register_script( 'mygallery_custom', get_template_directory_uri() . '/myGallery/gallery.js', array( 'jquery' ) );

		wp_enqueue_script( 'mygallery_lightbox' );
		wp_enqueue_script( 'mygallery_custom' );

	}

	add_action( 'wp_enqueue_scripts', 'load_my_scripts' );

?>