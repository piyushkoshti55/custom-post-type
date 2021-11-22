<?php
/**
 * Global Customizer Options
 *
 * @package the_event
 */

// Add Global section
$wp_customize->add_section( 'the_event_global_section', array(
	'title'             => esc_html__( 'Global Setting','the-event' ),
	'description'       => esc_html__( 'Global Setting Options', 'the-event' ),
	'panel'             => 'the_event_theme_options_panel',
) );

// breadcrumb setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_breadcrumb]', array(
	'default'           => the_event_theme_option( 'enable_breadcrumb' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_breadcrumb]', array(
	'label'             => esc_html__( 'Enable Breadcrumb', 'the-event' ),
	'section'           => 'the_event_global_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// homepage subtitle type control and setting
$wp_customize->add_setting( 'the_event_theme_options[subtitle_layout]', array(
	'default'          	=> the_event_theme_option('subtitle_layout'),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[subtitle_layout]', array(
	'label'             => esc_html__( 'Homepage Sub Title Layout', 'the-event' ),
	'section'           => 'the_event_global_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'normal-subtitle' 		=> esc_html__( 'Normal', 'the-event' ),
		'absolute-subtitle' 	=> esc_html__( 'Large Absolute', 'the-event' ),
	),
) );

// site layout setting and control.
$wp_customize->add_setting( 'the_event_theme_options[site_layout]', array(
	'sanitize_callback'   => 'the_event_sanitize_select',
	'default'             => the_event_theme_option('site_layout'),
) );

$wp_customize->add_control(  new The_Event_Radio_Image_Control ( $wp_customize, 'the_event_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'the-event' ),
	'section'             => 'the_event_global_section',
	'choices'			  => the_event_site_layout(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_loader]', array(
	'default'           => the_event_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'the-event' ),
	'section'           => 'the_event_global_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'the_event_theme_options[loader_type]', array(
	'default'          	=> the_event_theme_option('loader_type'),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'the-event' ),
	'section'           => 'the_event_global_section',
	'type'				=> 'select',
	'choices'			=> the_event_get_spinner_list(),
) );
