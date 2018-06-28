<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www
 * @since      1.0.0
 *
 * @package    Wod_Custom
 * @subpackage Wod_Custom/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wod_Custom
 * @subpackage Wod_Custom/public
 * @author     Frederico Alves <frederico.palves@gmail.com>
 */
class Wod_Custom_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wod-custom-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wod-custom-public.js', array( 'jquery' ), $this->version, false );

	}
// fred
private $bxcft_field_types = array(

	'wod-skills_cb'                 => 'BP_XProfile_Field_Type_Checkbox_Skills',



);

	public function wod_get_field_types($fields)
	{
		$fields = array_merge($fields, $this->bxcft_field_types);
		return $fields;
	}
	public function wod_xprofile_data_before_save($data){
		global $bp;

            $field_id = $data->field_id;
			$field = new BP_XProfile_Field($field_id);
			

		//Checks if the number of skills is less than the maximum
		if ($field->type=="wod-skills_cb")
		{
			$maxSkills=bp_xprofile_get_meta( $field_id, 'field', 'xprofile_wod_skills_maximum_selection_size' );
			$arrayOfSkills=explode(",",bp_unserialize_profile_field($data->value));
			$nbrOfSkills=sizeof($arrayOfSkills);
			if ($nbrOfSkills>$maxSkills) {
				$message = "Please select no more than " . $maxSkills . " skills"; //TODO i18n
				$type = "error";
				bp_core_add_message( $message, $type );
				bp_core_redirect( trailingslashit( bp_displayed_user_domain() . $bp->profile->slug . '/edit/group/' . bp_action_variable( 1 ) ) );
				

			} 
		}
		
		
	}
}
