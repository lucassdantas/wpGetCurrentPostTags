<?php 
/**
 * Plugin Name: Get Current post tag
 * Description: Get all current post tags with the shortcode [lc_show_post_Tags]
 * Plugin URI:  https://github.com/lucassdantas/wpGetCurrentPostTags.git
 * Version:     1.0.0
 * Author:      R&D Marketing Digital
 * Author URI:  https://rdmarketing.com.br/
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if(!function_exists('add_action')){
    die;
}
function get_current_post_tags(){
	$post_tags = get_the_tags();

	if ( $post_tags ) {
		foreach( $post_tags as $tag ) {
			$tagUrl = get_term_link($tag->term_taxonomy_id);
			echo "<a href='$tagUrl'>" . $tag->name . '</a>'. ', '; 
		}
	}
}
add_shortcode('lc_show_post_Tags', 'get_current_post_tags');