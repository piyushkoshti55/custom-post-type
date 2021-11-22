<?php
/**
 * Speaker Customizer Options
 *
 * @package the_event
 */

// Add speaker section
$wp_customize->add_section( 'the_event_speaker_section', array(
	'title'             => esc_html__( 'Speaker Section','the-event' ),
	'description'       => esc_html__( 'Speaker Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// speaker menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_speaker]', array(
	'default'           => the_event_theme_option('enable_speaker'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_speaker]', array(
	'label'             => esc_html__( 'Enable Speaker', 'the-event' ),
	'section'           => 'the_event_speaker_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// speaker sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[speaker_sub_title]', array(
	'default'          	=> the_event_theme_option('speaker_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[speaker_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_speaker_section',
	'type'				=> 'text',
) );

// speaker label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[speaker_title]', array(
	'default'          	=> the_event_theme_option('speaker_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[speaker_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_speaker_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// speaker pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[speaker_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[speaker_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_speaker_section',
		'choices'			=> the_event_page_choices(),
	) ) );

	// speaker label chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[speaker_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'the_event_theme_options[speaker_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'the-event' ), $i ),
		'section'           => 'the_event_speaker_section',
		'type'				=> 'text',
	) );

	// speaker hr control and setting
	$wp_customize->add_setting( 'the_event_theme_options[speaker_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new The_Event_Horizontal_Line( $wp_customize, 'the_event_theme_options[speaker_custom_hr_' . $i . ']', array(
		'section'           => 'the_event_speaker_section',
	) ) );

endfor;
