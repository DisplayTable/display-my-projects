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
define( 'DMP_COMMON_PATH', DMP_INCLUDE_PATH . 'common/' );
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
define( 'DMP_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
define( 'DMP_INCLUDES_URL', plugin_dir_url( __FILE__ ) . 'includes/' );
define( 'DMP_COMMON_URL', DMP_INCLUDES_URL . 'common/' );
define( 'DMP_PROJECTS_URL', DMP_INCLUDES_URL . 'posts/projects/' );
define( 'DMP_ISSUES_URL', plugin_dir_url( __FILE__ ) . 'posts/issues/' );

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
define( 'DMP_PROJECTS_FIELD_ISSUE_CONTAINER', DMP_PROJECTS_CPT . '-issue-container');
define( 'DMP_PROJECTS_FIELD_ISSUE_REMOVE', DMP_PROJECTS_CPT . '-delete-issue');
define( 'DMP_PROJECTS_FIELD_ISSUES_SELECTED', DMP_PROJECTS_FIELD_ISSUES . '-selected-issues');
define( 'DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN', DMP_PROJECTS_FIELD_ISSUES . '-selected-issues-hidden');
define( 'DMP_PROJECTS_FIELD_AJAX_GET_ISSUES', DMP_PROJECTS_FIELD_ISSUES . '-ajax-get-issues');

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
 * Common functions defines.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
define( 'DMP_COMMON', 'dmp-common' );
define( 'DMP_COMMON_UPLOADER', DMP_COMMON . '-uploader' );
define( 'DMP_COMMON_UPLOADER_OPEN_DIALOG', DMP_COMMON_UPLOADER . '-open' );
define( 'DMP_COMMON_UPLOADER_FILES', DMP_COMMON_UPLOADER . '-files' );
define( 'DMP_COMMON_UPLOADER_FILES_HIDDEN', DMP_COMMON_UPLOADER . '-files-hidden' );
define( 'DMP_COMMON_UPLOADER_FILE_ITEM', DMP_COMMON_UPLOADER . '-file-item' );
define( 'DMP_UPLOADER_PATH', DMP_COMMON_PATH . 'uploader/' );
define( 'DMP_UPLOADER_URL', DMP_COMMON_URL . 'uploader/' );

/**
 * Start plugin.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
require_once(plugin_dir_path( __FILE__ ) . 'start.php');