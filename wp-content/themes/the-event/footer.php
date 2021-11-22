<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the_event
 */

/**
 * the_event_site_content_ends_action hook
 *
 * @hooked the_event_site_content_ends -  10
 *
 */
do_action( 'the_event_site_content_ends_action' );

/**
 * the_event_footer_start_action hook
 *
 * @hooked the_event_footer_start -  10
 *
 */
do_action( 'the_event_footer_start_action' );

/**
 * the_event_site_info_action hook
 *
 * @hooked the_event_site_info -  10
 *
 */
do_action( 'the_event_site_info_action' );

/**
 * the_event_footer_ends_action hook
 *
 * @hooked the_event_footer_ends -  10
 * @hooked the_event_slide_to_top -  20
 *
 */
do_action( 'the_event_footer_ends_action' );

/**
 * the_event_page_ends_action hook
 *
 * @hooked the_event_page_ends -  10
 *
 */
do_action( 'the_event_page_ends_action' );

wp_footer();

/**
 * the_event_body_html_ends_action hook
 *
 * @hooked the_event_body_html_ends -  10
 *
 */
do_action( 'the_event_body_html_ends_action' );
