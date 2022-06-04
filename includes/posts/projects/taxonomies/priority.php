<?php

require_once( __DIR__ . '/../utils.php' );

/**
 * Client taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_projects_client_taxonomy' );

/**
 * Create Projects priority taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @return void
 */
function dmp_create_projects_priority_taxonomy() {
    $labels = dmp_projects_taxonomies_labels( 'Priority', 'Priorities' );
    $args   = dmp_projects_taxonomies_args( $labels );
    
    register_taxonomy( DMP_PROJECTS_TAX_PRIORITIES, array( DMP_PROJECTS_CPT ), $args );
}