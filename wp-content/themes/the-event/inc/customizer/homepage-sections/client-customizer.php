<?php
/**
 * Client Customizer Options
 *
 * @package the_event
 */

// Add client section
$wp_customize->add_section( 'the_event_client_section', array(
	'title'             => esc_html__( 'Client/Sponsor Section','the-event' ),
	'description'       => esc_html__( 'Client Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// client menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_client]', array(
	'default'           => the_event_theme_option('enable_client'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_client]', array(
	'label'             => esc_html__( 'Enable Client', 'the-event' ),
	'section'           => 'the_event_client_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// client sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[client_sub_title]', array(
	'default'          	=> the_event_theme_option('client_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[client_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_client_section',
	'type'				=> 'text',
) );

// client label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[client_title]', array(
	'default'          	=> the_event_theme_option('client_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[client_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_client_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// client pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[client_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[client_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_client_section',
		'choices'			=> the_event_page_choices(),
	) ) );

endfor;
