<?php 

/**
 * Projects styles and scripts.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'admin_enqueue_scripts', 'dmp_common_uploader_assets' );

/**
 * Load styles and scripts for uploader.
 *
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param string $hook Page type.
 * @return void
 */
function dmp_common_uploader_assets( $hook ) {
    $script_id = DMP_COMMON_UPLOADER . '-script';
    wp_enqueue_script( $script_id, DMP_UPLOADER_URL . 'assets/uploader.js', array( 'jquery' ), '1.0', true );
    wp_localize_script( $script_id, 'dmpCommonUploaderAssetsData', array(
        'openDialogId'  => DMP_COMMON_UPLOADER_OPEN_DIALOG,
        'filesID'       => DMP_COMMON_UPLOADER_FILES,
        'filesHiddenID' => DMP_COMMON_UPLOADER_FILES_HIDDEN,
        //'url'           => admin_url( 'admin-ajax.php' ),
        //'nonce'                 => wp_create_nonce( DMP_PROJECTS_FIELD_AJAX_GET_ISSUES ),
        //'action'                => 'get-issues'
    ) );
}