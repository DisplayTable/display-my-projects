<?php

/**
 * Plugin Name:       Display My Projects
 * Plugin URI:        https://displaytable.es
 * Description:       A plugin to manage projects and tasks.
 * Version:           0.1
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Author:            Display Table
 * Author URI:        https://displaytable.es
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       display-my-projects
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) or die();

// Defines
define( 'DMP_INCLUDE_PATH', plugin_dir_path( __FILE__ ) . 'includes/' );
define( 'DMP_ASSETS_PATH', plugin_dir_path( __FILE__ ) . 'assets/' );
define( 'DMP_TEMPLATE_PATH', plugin_dir_path( __FILE__ ) . 'templates/' );
define( 'DMP_REGISTER_PATH', plugin_dir_path( __FILE__ ) . 'register/' );
define( 'DMP_SLUG', 'dmp-');
define( 'DMP_LANGUAGE', 'displaymyprojects');

// Start
require_once(plugin_dir_path( __FILE__ ) . 'start.php');