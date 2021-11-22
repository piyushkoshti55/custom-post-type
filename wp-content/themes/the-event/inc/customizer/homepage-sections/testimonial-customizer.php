<?php
/**
 * Testimonial Customizer Options
 *
 * @package the_event
 */

// Add testimonial section
$wp_customize->add_section( 'the_event_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial Section','the-event' ),
	'description'       => esc_html__( 'Testimonial Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// testimonial enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_testimonial]', array(
	'default'           => the_event_theme_option('enable_testimonial'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_testimonial]', array(
	'label'             => esc_html__( 'Enable Testimonial', 'the-event' ),
	'section'           => 'the_event_testimonial_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// testimonial sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[testimonial_sub_title]', array(
	'default'          	=> the_event_theme_option('testimonial_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[testimonial_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_testimonial_section',
	'type'				=> 'text',
) );

// testimonial label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[testimonial_title]', array(
	'default'          	=> the_event_theme_option('testimonial_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[testimonial_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_testimonial_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 2; $i++ ) :

	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_testimonial_section',
		'choices'			=> the_event_page_choices(),
	) ) );

	// testimonial label chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'the_event_theme_options[testimonial_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'the-event' ), $i ),
		'section'           => 'the_event_testimonial_section',
		'type'				=> 'text',
	) );

	// testimonial hr control and setting
	$wp_customize->add_setting( 'the_event_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new The_Event_Horizontal_Line( $wp_customize, 'the_event_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'section'           => 'the_event_testimonial_section',
	) ) );

endfor;
