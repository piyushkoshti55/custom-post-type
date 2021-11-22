<?php
/**
 * Page Customizer Options
 *
 * @package the_event
 */

// Add excerpt section
$wp_customize->add_section( 'the_event_page_section', array(
	'title'             => esc_html__( 'Page Setting','the-event' ),
	'description'       => esc_html__( 'Page Setting Options', 'the-event' ),
	'panel'             => 'the_event_theme_options_panel',
) );

// frontpage setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_front_page]', array(
	'default'           => the_event_theme_option( 'enable_front_page' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_front_page]', array(
	'label'             => esc_html__( 'Show Static Front Page', 'the-event' ),
	'section'           => 'the_event_page_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'the_event_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'the_event_sanitize_select',
	'default'             => the_event_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new The_Event_Radio_Image_Control ( $wp_customize, 'the_event_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'the-event' ),
	'section'             => 'the_event_page_section',
	'choices'			  => the_event_sidebar_position(),
) ) );
