<?php
/**
 * Single Post Customizer Options
 *
 * @package the_event
 */

// Add excerpt section
$wp_customize->add_section( 'the_event_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','the-event' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'the-event' ),
	'panel'             => 'the_event_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'the_event_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'the_event_sanitize_select',
	'default'             => the_event_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new The_Event_Radio_Image_Control ( $wp_customize, 'the_event_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'the-event' ),
	'section'             => 'the_event_single_section',
	'choices'			  => the_event_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_single_date]', array(
	'default'           => the_event_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'the-event' ),
	'section'           => 'the_event_single_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_single_category]', array(
	'default'           => the_event_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'the-event' ),
	'section'           => 'the_event_single_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_single_tags]', array(
	'default'           => the_event_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'the-event' ),
	'section'           => 'the_event_single_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_single_author]', array(
	'default'           => the_event_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'the-event' ),
	'section'           => 'the_event_single_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );
