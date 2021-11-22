<?php
/**
 * Schedule Customizer Options
 *
 * @package the_event
 */

// Add schedule section
$wp_customize->add_section( 'the_event_schedule_section', array(
	'title'             => esc_html__( 'Schedule Section','the-event' ),
	'description'       => esc_html__( 'Schedule Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// schedule menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_schedule]', array(
	'default'           => the_event_theme_option('enable_schedule'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_schedule]', array(
	'label'             => esc_html__( 'Enable Schedule', 'the-event' ),
	'section'           => 'the_event_schedule_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// schedule sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[schedule_sub_title]', array(
	'default'          	=> the_event_theme_option('schedule_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[schedule_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_schedule_section',
	'type'				=> 'text',
) );

// schedule label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[schedule_title]', array(
	'default'          	=> the_event_theme_option('schedule_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[schedule_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_schedule_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// schedule pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[schedule_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[schedule_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_schedule_section',
		'choices'			=> the_event_page_choices(),
	) ) );

	// schedule title drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[schedule_content_subtitle_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'the_event_theme_options[schedule_content_subtitle_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Input Sub Title %d', 'the-event' ), $i ),
		'section'           => 'the_event_schedule_section',
		'type'				=> 'text',
	) );

	// schedule hr control and setting
	$wp_customize->add_setting( 'the_event_theme_options[schedule_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new The_Event_Horizontal_Line( $wp_customize, 'the_event_theme_options[schedule_custom_hr_' . $i . ']', array(
		'section'           => 'the_event_schedule_section',
	) ) );

endfor;
