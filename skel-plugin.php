<?php
/*
Plugin Name: Plugin Name
Description: Plugin Description. Here you can talk about what the plugin does. For example, this plugin adds widgets and a shortcode that does XYZ.
Author: Tom Morton
Version: 1.0
Author URI: http://twmorton.com/
*/

//Do not allow direct access to your plugins php files
defined('ABSPATH') or die("Cannot access pages directly.");

//defining a few items
define( 'skeletonclass_URL', plugin_dir_url(__FILE__) ); // http://example.com/wp-content/plugins/skeletonclass/
define( 'skeletonclass_URL_IMG', plugin_dir_url(__FILE__).'images' ); // http://example.com/wp-content/plugins/skeletonclass/images/
define( 'skeletonclass_PATH', plugin_dir_path(__FILE__) ); // absolute/path/of/your/server/wp-content/plugins/skeletonclass/

require_once('skel-widgets.php');
require_once('skel-cpt.php');

if (!class_exists("skeletonclass")) {

	class skeletonclass {
	
		function skeletonclass()
		{
			$this->__construct();
		} // function
	
		function __construct()
		{
			new skeletonclass_cpt; 
			new skeletonclass_widgets; 

			add_action( 'init', array( &$this, 'init' ) );			
			add_action( 'wp_head', array( &$this, 'skeletonclass_vardefine_head' ) );

		} // __construct
	
		function admin_init()
		{

		} // admin_init
	
		function init()
		{
			$this->skeletonclass_enqueue_scripts();
			$this->skeletonclass_enqueue_styles();

			add_image_size('book-slide', 97, 160, false);
			add_image_size('main-slide', 990, 275, false);

		} // init


		function skeletonclass_enqueue_scripts()
		{
			if(!is_admin()){
			
				
			}// if is admin
			
		} // skeletonclass_enqueue_scripts

		function skeletonclass_enqueue_styles()
		{
			
			if(!is_admin()){
			
			
			}// if is admin
			
			
		} // skeletonclass_enqueue_scripts		
	
	} // class

} //End if class exists

$skeletonclass = new skeletonclass;