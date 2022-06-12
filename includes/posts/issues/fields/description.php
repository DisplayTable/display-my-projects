<?php 

/**
 * Description metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'add_meta_boxes', 'dmp_issues_metabox_description' );

/**
 * Add description metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
function dmp_issues_metabox_description() {
    $id             = DMP_ISSUES_FIELD_DESCRIPTION . '-box';
    $title          = __( 'Description', DMP_LANGUAGE ); 
    $callback       = 'dmp_issues_metabox_description_callback'; 
    $screen         = DMP_ISSUES_CPT; 
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
 * Description metabox callback.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param WP_Post $post Current post.
 * @return string
 */
function dmp_issues_metabox_description_callback( $post ) {
    $id = DMP_ISSUES_FIELD_DESCRIPTION;
    ?>
    <label class="screen-reader-text" for="<?php echo $id ?>"><?php _e( 'Description', DMP_LANGUAGE ); ?></label>
    <textarea rows="1" cols="40" name="<?php echo $id ?>" id="<?php echo $id ?>"><?php echo get_post_meta( $post->ID, DMP_PROJECTS_FIELD_DESCRIPTION, true ); ?></textarea>
    <p><?php _e( 'Issue description', DMP_LANGUAGE ); ?></p>
    <?php
}