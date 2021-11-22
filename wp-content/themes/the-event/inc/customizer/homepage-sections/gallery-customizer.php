<?php
/**
 * Gallery Customizer Options
 *
 * @package the_event
 */

// Add gallery section
$wp_customize->add_section( 'the_event_gallery_section', array(
	'title'             => esc_html__( 'Gallery Section','the-event' ),
	'description'       => esc_html__( 'Gallery Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// gallery menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_gallery]', array(
	'default'           => the_event_theme_option('enable_gallery'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_gallery]', array(
	'label'             => esc_html__( 'Enable Gallery', 'the-event' ),
	'section'           => 'the_event_gallery_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// gallery sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[gallery_sub_title]', array(
	'default'          	=> the_event_theme_option('gallery_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[gallery_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_gallery_section',
	'type'				=> 'text',
) );

// gallery label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[gallery_title]', array(
	'default'          	=> the_event_theme_option('gallery_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[gallery_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_gallery_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 8; $i++ ) :

	// gallery posts drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[gallery_content_post_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[gallery_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'the-event' ), $i ),
		'section'           => 'the_event_gallery_section',
		'choices'			=> the_event_post_choices(),
	) ) );

endfor;
