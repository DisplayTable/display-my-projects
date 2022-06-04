<?php

/**
 * Funtion to return projects taxonomy labels.
 *
 * @param string $singular_name Singular name of taxonomy. 
 * @param string $plural_name Plural name of taxonomy. 
 * @return Array
 */
function dmp_projects_taxonomies_labels( $singular_name, $plural_name ) {
    return array(
        "name"              => _x( "$plural_name", "taxonomy general name" ),
        "singular_name"     => _x( "$singular_name", "taxonomy singular name" ),
        "search_items"      =>  __( "Search $plural_name" ),
        "all_items"         => __( "All $plural_name" ),
        "parent_item"       => __( "Parent $singular_name" ),
        "parent_item_colon" => __( "Parent $singular_name:" ),
        "edit_item"         => __( "Edit $singular_name" ), 
        "update_item"       => __( "Update $singular_name" ),
        "add_new_item"      => __( "Add New $singular_name" ),
        "new_item_name"     => __( "New $singular_name Name" ),
        "menu_name"         => __( "$plural_name" ),
    );   
}

/**
 * Funtion to return projects taxonomy arguments.
 *
 * @param Array $labels Labels of taxonomy. 
 * @return Array
 */
function dmp_projects_taxonomies_args( $labels ) {
    return array(
        "hierarchical"      => true,
        "labels"            => $labels,
        "show_ui"           => true,
        "show_in_rest"      => true,
        "show_admin_column" => true,
        "query_var"         => true,
    );
}