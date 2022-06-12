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

/**
 * Path defines.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
define( 'DMP_INCLUDE_PATH', plugin_dir_path( __FILE__ ) . 'includes/' );
define( 'DMP_ASSETS_PATH', plugin_dir_path( __FILE__ ) . 'assets/' );
define( 'DMP_TEMPLATE_PATH', plugin_dir_path( __FILE__ ) . 'templates/' );
define( 'DMP_REGISTER_PATH', plugin_dir_path( __FILE__ ) . 'register/' );

/**
 * Url defines.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
define( 'DMP_PROJECTS_URL', plugin_dir_url( __FILE__ ) . 'includes/posts/projects/' );
define( 'DMP_ISSUES_URL', plugin_dir_url( __FILE__ ) . 'includes/posts/issues/' );

/**
 * Slug defines.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
define( 'DMP_SLUG', 'dmp-');

/**
 * CPT Project defines.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
define( 'DMP_PROJECTS_CPT', 'dmp-projects');
define( 'DMP_PROJECTS_TAX_CLIENTS', DMP_PROJECTS_CPT . '-clients');
define( 'DMP_PROJECTS_TAX_STATUS', DMP_PROJECTS_CPT . '-status');
define( 'DMP_PROJECTS_TAX_PRIORITIES', DMP_PROJECTS_CPT . '-priorities');
define( 'DMP_PROJECTS_FIELD_DESCRIPTION', DMP_PROJECTS_CPT . '-description');
define( 'DMP_PROJECTS_FIELD_DATES', DMP_PROJECTS_CPT . '-dates');
define( 'DMP_PROJECTS_FIELD_DATESTART', DMP_PROJECTS_CPT . '-date-start');
define( 'DMP_PROJECTS_FIELD_DATEEND', DMP_PROJECTS_CPT . '-date-end');
define( 'DMP_PROJECTS_FIELD_DOCUMENTS', DMP_PROJECTS_CPT . '-documents');
define( 'DMP_PROJECTS_FIELD_ISSUES', DMP_PROJECTS_CPT . '-issues');
define( 'DMP_PROJECTS_FIELD_ISSUES_SELECTED', DMP_PROJECTS_FIELD_ISSUES . '-selected-issues');
define( 'DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN', DMP_PROJECTS_FIELD_ISSUES . '-selected-issues-hidden');

/**
 * CPT Issues defines.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
define( 'DMP_ISSUES_CPT', 'dmp-issues');
define( 'DMP_ISSUES_TAX_STATUS', DMP_ISSUES_CPT . '-status');
define( 'DMP_ISSUES_TAX_PRIORITIES', DMP_ISSUES_CPT . '-priorities');
define( 'DMP_ISSUES_FIELD_DESCRIPTION', DMP_ISSUES_CPT . '-description');

/**
 * Language defines.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
define( 'DMP_LANGUAGE', 'displaymyprojects');

/**
 * Start plugin.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
require_once(plugin_dir_path( __FILE__ ) . 'start.php');