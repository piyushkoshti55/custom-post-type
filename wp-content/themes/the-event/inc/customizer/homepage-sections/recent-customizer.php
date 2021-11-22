<?php
/**
 * Recent Customizer Options
 *
 * @package the_event
 */

// Add recent section
$wp_customize->add_section( 'the_event_recent_section', array(
	'title'             => esc_html__( 'Recent Section','the-event' ),
	'description'       => esc_html__( 'Recent Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// recent enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_recent]', array(
	'default'           => the_event_theme_option('enable_recent'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_recent]', array(
	'label'             => esc_html__( 'Enable Recent', 'the-event' ),
	'section'           => 'the_event_recent_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// recent sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[recent_sub_title]', array(
	'default'          	=> the_event_theme_option('recent_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[recent_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_recent_section',
	'type'				=> 'text',
) );

// recent label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[recent_title]', array(
	'default'          	=> the_event_theme_option('recent_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[recent_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_recent_section',
	'type'				=> 'text',
) );

// recent content type control and setting
$wp_customize->add_setting( 'the_event_theme_options[recent_content_type]', array(
	'default'          	=> the_event_theme_option('recent_content_type'),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[recent_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'the-event' ),
	'section'           => 'the_event_recent_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'recent' 	=> esc_html__( 'Recent', 'the-event' ),
		'category' 	=> esc_html__( 'Category', 'the-event' ),
	),
) );

// recent pages drop down chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[recent_content_category]', array(
	'sanitize_callback' => 'the_event_sanitize_category',
) );

$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[recent_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'the-event' ),
	'section'           => 'the_event_recent_section',
	'choices'			=> the_event_category_choices(),
	'active_callback'	=> 'the_event_recent_content_category_enable',
) ) );
