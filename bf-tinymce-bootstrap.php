<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/Benfarhat
 * @since             1.0.0
 * @package           Bf_Tinymce_Bootstrap
 *
 * @wordpress-plugin
 * Plugin Name:       bf-tinymce-bootstrap
 * Plugin URI:        https://github.com/Benfarhat/bf-tinymce-bootstrap
 * Description:       Bootstrap components integration in tinyMCE
 * Version:           1.0.0
 * Author:            Benfarhat Elyes
 * Author URI:        https://github.com/Benfarhat
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bf-tinymce-bootstrap
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );




/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Bf_Tinymce_Bootstrap
 * @subpackage Bf_Tinymce_Bootstrap/includes
 * @author     Benfarhat Elyes <Benfarhat.elyes@gmail.com>
 */
class Bf_Tinymce_Bootstrap {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'bf-tinymce-bootstrap';

		if ( is_admin() ) {
			add_action( 'init', array(  $this, 'setup_tinymce_plugin' ) );
		}

	}

	/**
	* Check if the current user can edit Posts or Pages, and is using the Visual Editor
	* If so, add some filters so we can register our plugin
	*/
	function setup_tinymce_plugin() {
	
		// Check if the logged in WordPress User can edit Posts or Pages
		// If not, don't register our TinyMCE plugin
			
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
					return;
		}
		
		// Check if the logged in WordPress User has the Visual Editor enabled
		// If not, don't register our TinyMCE plugin
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
		return;
		}
		
		// Setup some filters
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
		add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );
		add_action( 'admin_init', array( &$this, 'add_bootstrap_cdn' ) );
			 
	}

	/**
	* Adds a TinyMCE plugin compatible JS file to the TinyMCE / Visual Editor instance
	*
	* @param array $plugin_array Array of registered TinyMCE Plugins
	* @return array Modified array of registered TinyMCE Plugins
	*/
	function add_tinymce_plugin( $plugin_array ) {
	
		$plugin_array['bf_mce_bootstrap'] = plugin_dir_url( __FILE__ ) . 'tinymce-custom-link-class.js';
		return $plugin_array;

		
	}

	/**
	* Adds a button to the TinyMCE / Visual Editor which the user can click
	* to insert a link with a custom CSS class.
	*
	* @param array $buttons Array of registered TinyMCE Buttons
	* @return array Modified array of registered TinyMCE Buttons
	*/
	function add_tinymce_toolbar_button( $buttons ) {
	
		array_push( $buttons, '|', 'bf_mce_bootstrap' );
		return $buttons;
	}

	/**
	 * Register and load Bootstrap 4.0.0 CDN to WP Editor
	 */
	function add_bootstrap_cdn() {
		add_editor_style( '//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
	}

}

$plugin = new Bf_Tinymce_Bootstrap();
