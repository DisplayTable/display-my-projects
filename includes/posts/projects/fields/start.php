<?php 

require_once( __DIR__ . './query.php' );
require_once( __DIR__ . './ajax.php' );
require_once( __DIR__ . './description.php' );
require_once( __DIR__ . './dates.php' );
require_once( __DIR__ . './documents.php' );
require_once( __DIR__ . './issues.php' );

/**
 * Projects styles and scripts.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'admin_enqueue_scripts', 'dmp_projects_metabox_assets' );

/**
 * Projects metabox save.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'save_post_' . DMP_PROJECTS_CPT, 'dmp_projects_metabox_save' );

/**
 * Save meta box content.
 *
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param int $post_id Post ID
 */
function dmp_projects_metabox_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        DMP_PROJECTS_FIELD_DESCRIPTION,
        DMP_PROJECTS_FIELD_DATESTART,
        DMP_PROJECTS_FIELD_DATEEND,
        DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
    }
}

/**
 * Load styles and scripts for projects cpt.
 *
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param string $hook Page type.
 * @return void
 */
function dmp_projects_metabox_assets( $hook ) {
    global $post_type;
    if( DMP_PROJECTS_CPT !== $post_type ) return;
    $styles_id  = DMP_PROJECTS_CPT . '-fields-styles';
    $jquery_ui_style_id = DMP_PROJECTS_CPT . '-jquery-ui-styles';
    $jquery_ui_script_id = DMP_PROJECTS_CPT . '-jquery-ui-scripts';
    $scripts_id = DMP_PROJECTS_CPT . '-fields-scripts';
    $current_language_code = get_bloginfo("language");
    $datepicker_locale_path = DMP_ASSETS_PATH . 'js/jquery-ui/datepicker/i18n/datepicker-' . $current_language_code . '.js';
    $datepicker_locale_url = DMP_ASSETS_URL . 'js/jquery-ui/datepicker/i18n/datepicker-' . $current_language_code . '.js';
    wp_enqueue_style( $jquery_ui_style_id, DMP_ASSETS_URL . 'css/jquery-ui/jquery-ui.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( $styles_id, DMP_PROJECTS_URL . 'assets/css/fields.css', array( $jquery_ui_style_id ), '1.0', 'all' );
    wp_enqueue_script( $jquery_ui_script_id, DMP_ASSETS_URL . 'js/jquery-ui/jquery-ui.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( $scripts_id, DMP_PROJECTS_URL . 'assets/js/fields.js', array( 'jquery', $jquery_ui_script_id ), '1.0', true );
    if( file_exists( $datepicker_locale_path ) ) {
        wp_enqueue_script( 
            DMP_PROJECTS_CPT . '-jquery-ui-datepicker-' . $current_language_code , 
            $datepicker_locale_url, 
            array( 'jquery', $jquery_ui_script_id ), 
            '1.0', 
            true 
        );
    }
    wp_localize_script( $scripts_id, 'assetsData', array(
        'dateStartId'           => DMP_PROJECTS_FIELD_DATESTART,
        'dateEndId'             => DMP_PROJECTS_FIELD_DATEEND,
        'issuesId'              => DMP_PROJECTS_FIELD_ISSUES,
        'issuesSelectdId'       => DMP_PROJECTS_FIELD_ISSUES_SELECTED,
        'issuesSelectdHiddenId' => DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN,
        'issueContainer'        => DMP_PROJECTS_FIELD_ISSUE_CONTAINER,
        'issueRemove'           => DMP_PROJECTS_FIELD_ISSUE_REMOVE,
        'url'                   => admin_url( 'admin-ajax.php' ),
        'nonce'                 => wp_create_nonce( DMP_PROJECTS_FIELD_AJAX_GET_ISSUES ),
        'action'                => 'get-issues'
    ) );
}