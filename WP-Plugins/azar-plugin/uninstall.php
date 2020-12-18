<?php
/**
 *  Trigger this fil on Plugin uninstall
 * @package AzarPlugin
 */

 if(! defined('WP_UNISTALL_PLUGIN')){
     die();
 }

 // Clear Database stored data fisrt method
/*  $books =get_posts(
     array(
         'post_type'=>'book',
        'numberposts'=>-1)
    ); // -1 get all

foreach($books as $book){
    wp_delete_post($book-ID,true); // delete all no matter what status
} */

// access the database
global $wpdb;
// remove all posts with the type that we created
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
// remove all meta the are not used in posts any more (cause we deleted the posts)
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE post_id NOT IN (SELECT id FROM wp_posts)");