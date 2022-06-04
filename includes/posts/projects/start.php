<?php

require_once( __DIR__ . './taxonomies/client.php' );
require_once( __DIR__ . './taxonomies/status.php' );
require_once( __DIR__ . './taxonomies/priority.php' );
require_once( __DIR__ . './cpt.php' );

/**
 * Create CPT.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init', 'dmp_create_projects_custom_post_type' );

/**
 * Create client taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_projects_client_taxonomy' );

/**
 * Create status taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_projects_status_taxonomy' );

/**
 * Create priority taxonomy.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_action( 'init',  'dmp_create_projects_priority_taxonomy' );