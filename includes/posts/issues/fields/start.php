<?php 

require_once( __DIR__ . './description.php' );

/**
 * Projects styles and scripts.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'admin_enqueue_scripts', 'dmp_issues_metabox_assets' );

/**
 * Load styles and scripts for issues cpt.
 *
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param string $hook Page type.
 * @return void
 */
function dmp_issues_metabox_assets( $hook ) {
    global $post_type;
    if( DMP_ISSUES_CPT !== $post_type ) return;
    $styles_id  = DMP_ISSUES_CPT . '-fields-styles';
    $scripts_id = DMP_ISSUES_CPT . '-fields-scripts';
    wp_enqueue_style( $styles_id, DMP_ISSUES_URL . 'assets/css/fields.css', array(), '1.0', 'all' );
}