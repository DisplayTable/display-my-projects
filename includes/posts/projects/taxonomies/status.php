<?php

require_once( __DIR__ . '/../utils.php' );

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
     
    // Now register the taxonomy
    register_taxonomy( DMP_SLUG . 'status', array( DMP_SLUG . 'projects' ), $args );
}