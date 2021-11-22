<?php
/**
 * Skills Customizer Options
 *
 * @package the_event
 */

// Add skills section
$wp_customize->add_section( 'the_event_skills_section', array(
	'title'             => esc_html__( 'Skills Section','the-event' ),
	'description'       => esc_html__( 'Skills Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// skills menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_skills]', array(
	'default'           => the_event_theme_option('enable_skills'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_skills]', array(
	'label'             => esc_html__( 'Enable Skills', 'the-event' ),
	'section'           => 'the_event_skills_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// skills sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[skills_sub_title]', array(
	'default'          	=> the_event_theme_option('skills_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[skills_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_skills_section',
	'type'				=> 'text',
) );

// skills label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[skills_title]', array(
	'default'          	=> the_event_theme_option('skills_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[skills_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_skills_section',
	'type'				=> 'text',
) );

// Client additional image setting and control.
$wp_customize->add_setting( 'the_event_theme_options[skills_image]', array(
	'sanitize_callback' => 'the_event_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'the_event_theme_options[skills_image]',
		array(
		'label'       		=> esc_html__( 'Select Image', 'the-event' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'the-event' ), 600, 600 ),
		'section'     		=> 'the_event_skills_section',
) ) );

// skills video chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[skills_video]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'the_event_theme_options[skills_video]', array(
	'label'             => esc_html__( 'Video Url', 'the-event' ),
	'description' 		=> esc_html__( 'Use video url from YouTube or Media Library.', 'the-event' ),
	'section'           => 'the_event_skills_section',
	'type'				=> 'url',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// skills menu enable setting and control.
	$wp_customize->add_setting( 'the_event_theme_options[skills_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new The_Event_Icon_Picker_Control( $wp_customize, 'the_event_theme_options[skills_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'the-event' ), $i ),
		'section'           => 'the_event_skills_section',
		'type' 				=> 'icon_picker',
	) ) );

	// skills pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[skills_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[skills_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_skills_section',
		'choices'			=> the_event_page_choices(),
	) ) );

	// skills hr control and setting
	$wp_customize->add_setting( 'the_event_theme_options[skills_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new The_Event_Horizontal_Line( $wp_customize, 'the_event_theme_options[skills_custom_hr_' . $i . ']', array(
		'section'           => 'the_event_skills_section',
	) ) );

endfor;
