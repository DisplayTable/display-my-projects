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
    $script_lightbox_id = DMP_COMMON_UPLOADER . '-script-lightbox';
    $style_id = DMP_COMMON_UPLOADER . '-style';
    $style_lightbox_id = DMP_COMMON_UPLOADER . '-style-lightbox';
    wp_enqueue_style( $style_lightbox_id, DMP_UPLOADER_URL . 'assets/css/lightbox2/lightbox.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( $style_id, DMP_UPLOADER_URL . 'assets/css/uploader.css', array(), '1.0', 'all' );
    wp_enqueue_script( $script_lightbox_id, DMP_UPLOADER_URL . 'assets/js/lightbox2/lightbox.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( $script_id, DMP_UPLOADER_URL . 'assets/js/uploader.js', array( 'jquery', $script_lightbox_id ), '1.0', true );
    wp_localize_script( $script_id, 'dmpCommonUploaderAssetsData', array(
        'openDialogId'  => DMP_COMMON_UPLOADER_OPEN_DIALOG,
        'filesID'       => DMP_COMMON_UPLOADER_FILES,
        'filesHiddenID' => DMP_COMMON_UPLOADER_FILES_HIDDEN,
        'fileItem'      => DMP_COMMON_UPLOADER_FILE_ITEM, 
    ) );
}

/**
 * Callback function to render upload files and button.
 *
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param WP_Post $post Current post.
 * @return void
 */
function dmp_common_uploader_render_callback( $post ) {
    $files = get_post_meta( $post->ID, DMP_COMMON_UPLOADER_FILES_HIDDEN, true );
    $arr_files = $files ? explode( ',', $files ) : [];
    ?>
    <p><?php _e( '', DMP_LANGUAGE ); ?></p>
    <button type="button" id="<?php echo DMP_COMMON_UPLOADER_OPEN_DIALOG; ?>" class="button button-primary button-large">
        <?php _e( 'Upload files', DMP_LANGUAGE ); ?>
    </button>
    <input 
        type="hidden" 
        value="<?php echo $files; ?>" 
        id="<?php echo DMP_COMMON_UPLOADER_FILES_HIDDEN ?>" 
        name="<?php echo DMP_COMMON_UPLOADER_FILES_HIDDEN ?>" 
    />
    <div id="<?php echo DMP_COMMON_UPLOADER_FILES; ?>">
    <?php foreach( $arr_files as $file_id ) : ?>
        <?php 
            $file = wp_get_attachment_url( $file_id );
            $caption = wp_get_attachment_caption( $file_id ); 
            $type = get_post_mime_type( $file_id );
        ?>
        <div class="<?php echo DMP_COMMON_UPLOADER_FILE_ITEM; ?>" data-id="<?php echo $file_id ?>">
            <button type="button" class="delete-file">
                <span>+</span>
            </button>
            <?php if ( strpos( $type, 'image' ) !== false) : ?> 
                <a class="image" href="<?php echo $file ?>" data-lightbox="<?php echo $file_id; ?>" data-title="<?php echo $caption; ?>"><img src="<?php echo $file ?>" /></a>
            <?php else : ?> 
                <a class="file" href="<?php echo $file ?>" target="_blank"><span class="dashicons dashicons-admin-page"></span></a>
            <?php endif; ?> 
        </div>
    <?php endforeach; ?>
    </div>
    <?php
}