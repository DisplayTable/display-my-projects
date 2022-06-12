<?php

require_once( __DIR__ . '/../../../utils/utils.php' );

/**
 * Client taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_issues_priority_taxonomy' );

/**
 * Create Issues priority taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @return void
 */
function dmp_create_issues_priority_taxonomy() {
    $labels = dmp_taxonomies_labels( 'Priority', 'Priorities' );
    $args   = dmp_taxonomies_args( $labels );
    
    register_taxonomy( DMP_ISSUES_TAX_PRIORITIES, array( DMP_ISSUES_CPT ), $args );
}