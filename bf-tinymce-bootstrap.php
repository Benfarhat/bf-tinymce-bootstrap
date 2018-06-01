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
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bf-tinymce-bootstrap-activator.php
 */
function activate_bf_tinymce_bootstrap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bf-tinymce-bootstrap-activator.php';
	Bf_Tinymce_Bootstrap_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bf-tinymce-bootstrap-deactivator.php
 */
function deactivate_bf_tinymce_bootstrap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bf-tinymce-bootstrap-deactivator.php';
	Bf_Tinymce_Bootstrap_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bf_tinymce_bootstrap' );
register_deactivation_hook( __FILE__, 'deactivate_bf_tinymce_bootstrap' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bf-tinymce-bootstrap.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bf_tinymce_bootstrap() {

	$plugin = new Bf_Tinymce_Bootstrap();
	$plugin->run();

}
run_bf_tinymce_bootstrap();
