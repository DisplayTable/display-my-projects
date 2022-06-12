<?php

/**
 * Create CPT.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init', 'dmp_create_issues_custom_post_type' );

/**
 * Create Projects CPT implementation.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @return void
 */
function dmp_create_issues_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'Issues', 'Post Type General Name', DMP_LANGUAGE ),
        'singular_name'         => _x( 'Issue', 'Post Type Singular Name', DMP_LANGUAGE ),
        'menu_name'             => __( 'Issues', DMP_LANGUAGE ),
        'parent_item_colon'     => __( 'Parent Issue', DMP_LANGUAGE ),
        'all_items'             => __( 'All Issues', DMP_LANGUAGE ),
        'view_item'             => __( 'View Issue', DMP_LANGUAGE ),
        'add_new_item'          => __( 'Add New Issue', DMP_LANGUAGE ),
        'add_new'               => __( 'Add New', DMP_LANGUAGE ),
        'edit_item'             => __( 'Edit Issue', DMP_LANGUAGE ),
        'update_item'           => __( 'Update Issue', DMP_LANGUAGE ),
        'search_items'          => __( 'Search Issue', DMP_LANGUAGE ),
        'not_found'             => __( 'Not Found', DMP_LANGUAGE ),
        'not_found_in_trash'    => __( 'Not found in Trash', DMP_LANGUAGE ),
    );
    $args = array(
        'label'                 => __( 'issues', DMP_LANGUAGE ),
        'description'           => __( 'Issues associated a projects', DMP_LANGUAGE ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'author', 'thumbnail', 'revisions', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-code-standards',
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,  
    );
    register_post_type( DMP_ISSUES_CPT, $args );
}