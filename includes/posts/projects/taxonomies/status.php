<?php

require_once( __DIR__ . '/../utils.php' );

/**
 * Status taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_projects_status_taxonomy' );

/**
 * Create Projects status taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @return void
 */
function dmp_create_projects_status_taxonomy() {
    $labels = dmp_projects_taxonomies_labels( 'Status', 'Status' );
    $args   = dmp_projects_taxonomies_args( $labels );

    register_taxonomy( DMP_PROJECTS_TAX_STATUS, array( DMP_PROJECTS_CPT ), $args );
}