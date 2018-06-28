<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www
 * @since      1.0.0
 *
 * @package    Wod_Custom
 * @subpackage Wod_Custom/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wod_Custom
 * @subpackage Wod_Custom/admin
 * @author     Frederico Alves <frederico.palves@gmail.com>
 */
class Wod_Custom_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wod_Custom_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wod_Custom_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wod-custom-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wod_Custom_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wod_Custom_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wod-custom-admin.js', array( 'jquery' ), $this->version, false );

	}


	
	
	public function wod_skills_after_save( $field ) 
	{
		// Saves the maximum selection size as field meta data
		
		if( isset( $_POST['xprofile-wod-skills-maximum-selection-size'] ) ) {
		
			bp_xprofile_update_field_meta( $field->id, 'xprofile_wod_skills_maximum_selection_size', $_POST['xprofile-wod-skills-maximum-selection-size'] );
		}
}
}
