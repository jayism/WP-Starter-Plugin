<?php
defined('ABSPATH') or die("Cannot access pages directly.");

if (!class_exists("skeletonclass_cpt")) {

	class skeletonclass_cpt extends skeletonclass {
		
		function skeletonclass_cpt()
		{
			$this->__construct();
		} // function

		function __construct()
		{

			add_action( 'init', array( &$this, 'register_cpt_slide' ) );

		} // __construct

		function register_cpt_slide() {

		    $labels = array( 
		        'name' => _x( 'Slides', 'slide' ),
		        'singular_name' => _x( 'Slide', 'slide' ),
		        'add_new' => _x( 'Add New', 'slide' ),
		        'add_new_item' => _x( 'Add New Slide', 'slide' ),
		        'edit_item' => _x( 'Edit Slide', 'slide' ),
		        'new_item' => _x( 'New Slide', 'slide' ),
		        'view_item' => _x( 'View Slide', 'slide' ),
		        'search_items' => _x( 'Search Slides', 'slide' ),
		        'not_found' => _x( 'No slides found', 'slide' ),
		        'not_found_in_trash' => _x( 'No slides found in Trash', 'slide' ),
		        'parent_item_colon' => _x( 'Parent Slide:', 'slide' ),
		        'menu_name' => _x( 'Slides', 'slide' ),
		    );

		    $args = array( 
		        'labels' => $labels,
		        'hierarchical' => false,
		        
		        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
		        
		        'public' => true,
		        'show_ui' => true,
		        'show_in_menu' => true,
		        
		        
		        'show_in_nav_menus' => true,
		        'publicly_queryable' => true,
		        'exclude_from_search' => false,
		        'has_archive' => true,
		        'query_var' => true,
		        'can_export' => true,
		        'rewrite' => true,
		        'capability_type' => 'post'
		    );

		    register_post_type( 'slide', $args );
		}

	}//end class
}//end if class



