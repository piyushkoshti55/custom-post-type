<?php
/**
 * Contact Customizer Options
 *
 * @package the_event
 */

// Add contact section
$wp_customize->add_section( 'the_event_contact_section', array(
	'title'             => esc_html__( 'Contact Section','the-event' ),
	'description'       => esc_html__( 'Contact Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// contact menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_contact]', array(
	'default'           => the_event_theme_option('enable_contact'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_contact]', array(
	'label'             => esc_html__( 'Enable Contact', 'the-event' ),
	'section'           => 'the_event_contact_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// Client additional image setting and control.
$wp_customize->add_setting( 'the_event_theme_options[contact_image]', array(
	'sanitize_callback' => 'the_event_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'the_event_theme_options[contact_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'the-event' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'the-event' ), 1920, 1080 ),
		'section'     		=> 'the_event_contact_section',
) ) );

// contact sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[contact_sub_title]', array(
	'default'          	=> the_event_theme_option('contact_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[contact_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_contact_section',
	'type'				=> 'text',
) );

// contact label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[contact_title]', array(
	'default'          	=> the_event_theme_option('contact_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[contact_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_contact_section',
	'type'				=> 'text',
) );

// contact btn label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[contact_shortcode]', array(
	'default'          	=> the_event_theme_option('contact_shortcode'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[contact_shortcode]', array(
	'label'             => esc_html__( 'Contact Form Shortcode', 'the-event' ),
	'description'       => esc_html__( 'Note: Please add form shortcode from Contact Form 7.', 'the-event' ),
	'section'           => 'the_event_contact_section',
	'type'				=> 'text',
) );

// map sub title drop down chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[map_shortcode]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[map_shortcode]', array(
	'label'             => esc_html__( 'Map ShortCode', 'the-event' ),
	'description'       => esc_html__( 'Note: You need to install WP Google Map Plugin as recommended and get a shortcode of a map.', 'the-event' ),
	'section'           => 'the_event_contact_section',
	'type'				=> 'text',
) );