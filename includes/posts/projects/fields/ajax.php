<?php 

/**
 * Ajax hook for getting issues.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( "wp_ajax_get-issues", "dmp_projects_ajax_get_issues" );

/**
 * Ajax callback for getting issues.
 *
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @param int $post_id Post ID
 */
function dmp_projects_ajax_get_issues() {
    check_ajax_referer ( DMP_PROJECTS_FIELD_AJAX_GET_ISSUES, 'nonce' );
    $term = sanitize_text_field( $_GET[ 'term' ] );
    $args = array( 
        'post_type'         => DMP_ISSUES_CPT,
        'numberposts'       => -1,
        'suppress_filters'  => false
    );
    if( is_numeric( $term ) ) $args[ 'include' ] = array( $term );
    else $args[ 'post__title' ] = $term ;
    $posts = get_posts( $args );
    $parsed_post = array_map( function( $post ) { 
        return array( 
            'id'    => $post->ID, 
            'label' => $post->post_title, 
            'value' => $post->post_title 
        ); 
    }, $posts );
    echo json_encode( $parsed_post );
    wp_die();
}