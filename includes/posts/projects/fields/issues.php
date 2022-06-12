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
    ?>
    <p class="meta-options">
        <label for="<?php echo DMP_PROJECTS_FIELD_ISSUES ?>"><?php _e( 'Add issue to this project', DMP_LANGUAGE ); ?></label>
        <select
            id="<?php echo DMP_PROJECTS_FIELD_ISSUES ?>"
            name="<?php echo DMP_PROJECTS_FIELD_ISSUES ?>"
        >
            <option value="1">Issue 1</option>
            <option value="2">Issue 2</option>
            <option value="3">Issue 3</option>
            <option value="4">Issue 4</option>
            <option value="5">Issue 5</option>
        </select>
    </p>
    <div id="<?php echo DMP_PROJECTS_FIELD_ISSUES_SELECTED ?>">
        
    </div>
    <input
        type="hidden" 
        value="" 
        id="<?php echo DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN ?>"
        name="<?php echo DMP_PROJECTS_FIELD_ISSUES_SELECTED_HIDDEN ?>"
    />
    <?php
}