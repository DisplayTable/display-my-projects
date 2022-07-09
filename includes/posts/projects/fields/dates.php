<?php

/**
 * Dates metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'add_meta_boxes', 'dmp_projects_metabox_dates' );

/**
 * Add dates metabox.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
function dmp_projects_metabox_dates() {
    $id             = DMP_PROJECTS_FIELD_DATES . '-box';
    $title          = __( 'Dates', DMP_LANGUAGE ); 
    $callback       = 'dmp_projects_metabox_date_callback'; 
    $screen         = DMP_PROJECTS_CPT; 
    $context        = 'side'; 
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
function dmp_projects_metabox_date_callback( $post ) {
    $date_start_id      = DMP_PROJECTS_FIELD_DATESTART;
    $date_end_id        = DMP_PROJECTS_FIELD_DATEEND;
    $date_start_value   = get_post_meta( $post->ID, DMP_PROJECTS_FIELD_DATESTART, true );
    $date_end_value     = get_post_meta( $post->ID, DMP_PROJECTS_FIELD_DATEEND, true );
    ?>
    <div id="<?php echo $date_start_id ?>-container">
        <p class="meta-options">
            <label for="<?php echo $date_start_id ?>"><?php _e( 'Start date', DMP_LANGUAGE ); ?></label>
            <input 
                id="<?php echo $date_start_id ?>" 
                type="text" 
                name="<?php echo $date_start_id ?>" 
                value="<?php echo $date_start_value; ?>"
            >
        </p>
        <p class="meta-options">
            <label for="<?php echo $date_end_id ?>"><?php _e( 'End date', DMP_LANGUAGE ); ?></label>
            <input 
                id="<?php echo $date_end_id ?>" 
                type="text" 
                name="<?php echo $date_end_id ?>" 
                value="<?php echo $date_end_value; ?>"
            >
        </p>
    </div>
    <p><?php _e( 'Your project start and deadline dates.', DMP_LANGUAGE ); ?></p>
    <?php
}