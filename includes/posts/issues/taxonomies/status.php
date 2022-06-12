<?php

require_once( __DIR__ . '/../../../utils/utils.php' );

/**
 * Status taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_issues_status_taxonomy' );

/**
 * Create Issues status taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @return void
 */
function dmp_create_issues_status_taxonomy() {
    $labels = dmp_taxonomies_labels( 'Status', 'Status' );
    $args   = dmp_taxonomies_args( $labels );

    register_taxonomy( DMP_ISSUES_TAX_STATUS, array( DMP_ISSUES_CPT ), $args );
}