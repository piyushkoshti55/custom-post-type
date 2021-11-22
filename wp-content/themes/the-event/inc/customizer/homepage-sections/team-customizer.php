<?php
/**
 * Team Customizer Options
 *
 * @package the_event
 */

// Add team section
$wp_customize->add_section( 'the_event_team_section', array(
	'title'             => esc_html__( 'Team/Organizer Section','the-event' ),
	'description'       => esc_html__( 'Team/Organizer Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// team menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_team]', array(
	'default'           => the_event_theme_option('enable_team'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_team]', array(
	'label'             => esc_html__( 'Enable Team', 'the-event' ),
	'section'           => 'the_event_team_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// team sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[team_sub_title]', array(
	'default'          	=> the_event_theme_option('team_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[team_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_team_section',
	'type'				=> 'text',
) );

// team label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[team_title]', array(
	'default'          	=> the_event_theme_option('team_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[team_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_team_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// team pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[team_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[team_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_team_section',
		'choices'			=> the_event_page_choices(),
	) ) );

	// team label chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[team_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'the_event_theme_options[team_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'the-event' ), $i ),
		'section'           => 'the_event_team_section',
		'type'				=> 'text',
	) );

	// team hr control and setting
	$wp_customize->add_setting( 'the_event_theme_options[team_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new The_Event_Horizontal_Line( $wp_customize, 'the_event_theme_options[team_custom_hr_' . $i . ']', array(
		'section'           => 'the_event_team_section',
	) ) );

endfor;
