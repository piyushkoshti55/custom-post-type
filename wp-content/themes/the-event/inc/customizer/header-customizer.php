<?php
/**
 * Header Customizer Options
 *
 * @package the_event
 */

// Add header section
$wp_customize->add_section( 'the_event_header_section', array(
	'title'             => esc_html__( 'Header Section','the-event' ),
	'description'       => esc_html__( 'Header Setting Options', 'the-event' ),
	'panel'             => 'the_event_theme_options_panel',
) );

// header social menu setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_header_social_menu]', array(
	'default'           => the_event_theme_option( 'enable_header_social_menu' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_header_social_menu]', array(
	'label'             => esc_html__( 'Show Header Social Menu', 'the-event' ),
	'section'           => 'the_event_header_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// header search setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_header_search]', array(
	'default'           => the_event_theme_option( 'enable_header_search' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_header_search]', array(
	'label'             => esc_html__( 'Show Header Search', 'the-event' ),
	'section'           => 'the_event_header_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// header layout control and setting
$wp_customize->add_setting( 'the_event_theme_options[header_layout]', array(
	'default'          	=> the_event_theme_option('header_layout'),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[header_layout]', array(
	'label'             => esc_html__( 'Header Layout', 'the-event' ),
	'section'           => 'the_event_header_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'normal-header' 	=> esc_html__( 'Normal', 'the-event' ),
		'absolute-header' 	=> esc_html__( 'Absolute', 'the-event' ),
	),
) );
