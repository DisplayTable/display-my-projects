<?php

require_once( __DIR__ . '/../../../utils/utils.php' );

/**
 * Client taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_projects_client_taxonomy' );

/**
 * Create Projects client taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 * @return void
 */
function dmp_create_projects_client_taxonomy() {    
    $labels = dmp_taxonomies_labels( 'Client', 'Clients' );
    $args   = dmp_taxonomies_args( $labels );

    register_taxonomy( DMP_PROJECTS_TAX_CLIENTS, array( DMP_PROJECTS_CPT ), $args );
}