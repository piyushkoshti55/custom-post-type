<?php
/**
 * Call to Action Customizer Options
 *
 * @package the_event
 */

// Add cta section
$wp_customize->add_section( 'the_event_cta_section', array(
	'title'             => esc_html__( 'Call to Action Section','the-event' ),
	'description'       => esc_html__( 'Call to Action Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// cta menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_cta]', array(
	'default'           => the_event_theme_option('enable_cta'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'the-event' ),
	'section'           => 'the_event_cta_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// cta count control and setting
$wp_customize->add_setting( 'the_event_theme_options[cta_opacity]', array(
	'default'          	=> the_event_theme_option('cta_opacity'),
	'sanitize_callback' => 'the_event_sanitize_number_range',
) );

$wp_customize->add_control( 'the_event_theme_options[cta_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'the-event' ),
	'section'           => 'the_event_cta_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'the_event_sanitize_page_post',
) );

$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'the-event' ),
	'section'           => 'the_event_cta_section',
	'choices'			=> the_event_page_choices(),
) ) );

// cta btn label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[cta_btn_label]', array(
	'default'          	=> the_event_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'the-event' ),
	'section'           => 'the_event_cta_section',
	'type'				=> 'text',
) );
