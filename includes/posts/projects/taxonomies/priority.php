<?php

require_once( __DIR__ . '/../utils.php' );

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
     
    // Now register the taxonomy
    register_taxonomy( DMP_SLUG . 'priorities', array( DMP_SLUG . 'projects' ), $args );
}