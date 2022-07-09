<?php 

/**
 * Where query override.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
add_filter( 'posts_where', 'dmp_projects_where_override', 10, 2 );

/**
 * Function that alters where query to allow searching by post title.
 * 
 * @author Display Table
 * @version 0.1
 * @since 0.1
 */
function dmp_projects_where_override( $where, $wp_query ) {
    if( !is_admin() ) return $where; // Short circuit early
    global $wpdb;
    if ( $search_term = $wp_query->get( 'post__title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
    }
    return $where;
}