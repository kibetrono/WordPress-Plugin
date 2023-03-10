<?php

/**
 * To be triggered on plugin uninstall
 * 
 * @package KibetPLugin
 */

 // security
 if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
 }

//  clear DB data
// ***************first  option

// $books=get_posts(array('post_type'=> 'book','numberposts'=>-1));

// foreach($books as $book){
//     wp_delete_post($book->ID,true);
// }

// ***************second  option

global $wpdb; // allows us to access the DB via SQL

$wpdb->query("DELETE FROM wp_posts WHERE post_type='book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");