<?php

require_once( DMP_UPLOADER_PATH . 'uploader.php' );

/**
 * Documents metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'add_meta_boxes', 'dmp_projects_metabox_documents' );

/**
 * Add documents metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
function dmp_projects_metabox_documents() {
    $id             = DMP_PROJECTS_FIELD_DOCUMENTS . '-box';
    $title          = __( 'Documents', DMP_LANGUAGE ); 
    $callback       = 'dmp_projects_metabox_documents_callback'; 
    $screen         = DMP_PROJECTS_CPT; 
    $context        = 'normal'; 
    $priority       = 'high'; 
    $callback_args  = array();
    add_meta_box( 
        $id, 
        $title, 
        $callback, 
        $screen, 
        $context, 
        $priority 
    );
}

/**
 * Documents metabox callback.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param WP_Post $post Current post.
 * @return string
 */
function dmp_projects_metabox_documents_callback( $post ) {
    ?>
    <p><?php _e( '', DMP_LANGUAGE ); ?></p>
    <button type="button" id="<?php echo DMP_COMMON_UPLOADER_OPEN_DIALOG; ?>" class="button button-primary button-large">
        <?php _e( 'Upload files', DMP_LANGUAGE ); ?>
    </button>
    <input 
        type="hidden" 
        value="<?php echo $issues; ?>" 
        id="<?php echo DMP_COMMON_UPLOADER_FILES_HIDDEN ?>" 
        name="<?php echo DMP_COMMON_UPLOADER_FILES_HIDDEN ?>" 
    />
    <div id="<?php echo DMP_COMMON_UPLOADER_FILES; ?>">
        <p>FILES</p>
    </div>
    <?php
}