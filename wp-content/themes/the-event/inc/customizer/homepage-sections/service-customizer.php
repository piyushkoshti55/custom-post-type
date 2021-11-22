<?php
/**
 * Service Customizer Options
 *
 * @package the_event
 */

// Add service section
$wp_customize->add_section( 'the_event_service_section', array(
	'title'             => esc_html__( 'Service Section','the-event' ),
	'description'       => esc_html__( 'Service Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// service menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_service]', array(
	'default'           => the_event_theme_option('enable_service'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_service]', array(
	'label'             => esc_html__( 'Enable Service', 'the-event' ),
	'section'           => 'the_event_service_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// service sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[service_sub_title]', array(
	'default'          	=> the_event_theme_option('service_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[service_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_service_section',
	'type'				=> 'text',
) );

// service label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[service_title]', array(
	'default'          	=> the_event_theme_option('service_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[service_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_service_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// service menu enable setting and control.
	$wp_customize->add_setting( 'the_event_theme_options[service_icon_' . $i . ']', array(
		// 'default'           => the_event_theme_option('service_icon_' . $i . ''),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new The_Event_Icon_Picker_Control( $wp_customize, 'the_event_theme_options[service_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'the-event' ), $i ),
		'section'           => 'the_event_service_section',
		'type' 				=> 'icon_picker',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_service_section',
		'choices'			=> the_event_page_choices(),
	) ) );

	// service hr control and setting
	$wp_customize->add_setting( 'the_event_theme_options[service_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new The_Event_Horizontal_Line( $wp_customize, 'the_event_theme_options[service_custom_hr_' . $i . ']', array(
		'section'           => 'the_event_service_section',
	) ) );

endfor;
