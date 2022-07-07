<?php

/**
 * Issues metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'add_meta_boxes', 'dmp_projects_metabox_issues' );

/**
 * Add issues metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
function dmp_projects_metabox_issues() {
    $id             = DMP_PROJECTS_FIELD_ISSUES . '-box';
    $title          = __( 'Issues', DMP_LANGUAGE ); 
    $callback       = 'dmp_projects_metabox_issues_callback'; 
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
 * Issues callback.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param WP_Post $post Current post.
 * @return string
 */
function dmp_projects_metabox_issues_callback( $post ) {
    $issues = get_post_meta( $post->ID, DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN, true );
    ?>
    <p><?php _e( 'Search for the issue in the input below. Accepted parameters are name or issue id.', DMP_LANGUAGE ); ?></p>
    <p class="meta-options">
        <input type="text" id="<?php echo DMP_PROJECTS_FIELD_ISSUES; ?>" name="<?php echo DMP_PROJECTS_FIELD_ISSUES; ?>" />
    </p>
    <div id="<?php echo DMP_PROJECTS_FIELD_ISSUES_SELECTED ?>"></div>
    <input type="hidden" value="<?php echo $issues; ?>" id="<?php echo DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN ?>" name="<?php echo DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN ?>" />
    <?php
}