<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the_event
 */

/**
 * the_event_doctype_action hook
 *
 * @hooked the_event_doctype -  10
 *
 */
do_action( 'the_event_doctype_action' );

/**
 * the_event_head_action hook
 *
 * @hooked the_event_head -  10
 *
 */
do_action( 'the_event_head_action' );

/**
 * the_event_body_start_action hook
 *
 * @hooked the_event_body_start -  10
 *
 */
do_action( 'the_event_body_start_action' );
 
/**
 * the_event_page_start_action hook
 *
 * @hooked the_event_page_start -  10
 * @hooked the_event_loader -  20
 *
 */
do_action( 'the_event_page_start_action' );

/**
 * the_event_header_start_action hook
 *
 * @hooked the_event_header_start -  10
 *
 */
do_action( 'the_event_header_start_action' );

/**
 * the_event_site_branding_action hook
 *
 * @hooked the_event_site_branding -  10
 *
 */
do_action( 'the_event_site_branding_action' );

/**
 * the_event_primary_nav_action hook
 *
 * @hooked the_event_primary_nav -  10
 *
 */
do_action( 'the_event_primary_nav_action' );

/**
 * the_event_header_ends_action hook
 *
 * @hooked the_event_header_ends -  10
 *
 */
do_action( 'the_event_header_ends_action' );

/**
 * the_event_site_content_start_action hook
 *
 * @hooked the_event_site_content_start -  10
 *
 */
do_action( 'the_event_site_content_start_action' );

/**
 * the_event_primary_content_action hook
 *
 */
if ( is_front_page() && ! is_home() ) {
	$sections = the_event_sortable_sections();
	$sorted = array_keys( $sections );
	$i = 1;

	foreach ( $sorted as $section ) {
		add_action( 'the_event_primary_content_action', 'the_event_add_'. $section .'_section', $i . 0 );
		$i++;
	}
	do_action( 'the_event_primary_content_action' );
}

function style_files_list() {

wp_enqueue_script( 'filter-js', 'script.js', false );
}

add_action('wp_enqueue_scripts','style_files_list');