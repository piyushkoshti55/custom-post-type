<?php
/*
Plugin Name:       WPPB Event
Plugin URI:        https://example.com/plugins/the-basics/
Description:       WPPB Event Management plugin
Version:           1.0
Author:            Piyush Koshti
Author URI:        https://author.example.com/
License:           GPL v2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Update URI:        https://example.com/my-plugin/
Text Domain:       wppb-event
Domain Path:       /languages
*/

function pluginprefix_setup_post_type() {
  
  // create custom post type

    register_post_type( 'event',  array(
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event',
      'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
      'taxonomies' => array( 'event_type', 'event category' ),

    ),
    'menu_icon' => 'dashicons-calendar'
  ));

   //create event category

    	$eventCategoryLabels = array(
		'labels' => array(
		'name' => 'Eevent Category',
		'singular_name' => 'Event Category',
		'all_items' => 'All event Category',
		'edit_item' => 'Edit event Category',
		'update_item' => 'Update event Category',
		'add_new_item' => 'Add event Category',
		'new_item_name' => 'New event Category',	
		'show_in_rest'          => true,
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rest_base'             => 'event_category',
	)
	);
 
	// Event Category.
	register_taxonomy('event category', 'event', array(
		'hierarchical' => true,
		'label' => 'Event Category',
		'labels' => $eventCategoryLabels,
		
	));



} 
add_action( 'init', 'pluginprefix_setup_post_type' );


/**
 * Activate the plugin.
 */
function wppb_activate() { 
   pluginprefix_setup_post_type();
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'wppb_activate' );


/**
 * Deactivation hook.
 */
function wppb_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type( 'event' );
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'wppb_deactivate' );


add_action('admin_menu', 'add_event_submenu');

function add_event_submenu(){

add_submenu_page('edit.php?post_type=event', 'Past Event', 'Past Event', 'manage_options', 'past_event', 'wppb_past_event', 'event' );
}

function wppb_past_event() {
   ob_start();

    include_once plugin_dir_path(__FILE__) . 'views\new_past_event.php';

    $template = ob_get_contents();
    
    ob_end_clean();
    
    echo $template;

}


?>
