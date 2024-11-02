<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://syn-q.com
 * @since             1.0.0
 * @package           Synq_Utility
 *
 * @wordpress-plugin
 * Plugin Name:       SYNQ Utility Suite
 * Plugin URI:        https://syn-q.com
 * Description:       A utility plugin for site security, email deliverability, and other advanced features.
 * Version:           1.0.0
 * Author:            SYNQ Studio
 * Author URI:        https://syn-q.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       synq-utility
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
define( 'SYNQ_UTILITY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-synq-utility-activator.php
 */
function activate_synq_utility() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-synq-utility-activator.php';
	Synq_Utility_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-synq-utility-deactivator.php
 */
function deactivate_synq_utility() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-synq-utility-deactivator.php';
	Synq_Utility_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_synq_utility' );
register_deactivation_hook( __FILE__, 'deactivate_synq_utility' );


if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-synq-utility.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_synq_utility() {

	$plugin = new Synq_Utility();
	$plugin->run();

}
run_synq_utility();