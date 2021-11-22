<?php
/**
 * Hero Content Customizer Options
 *
 * @package the_event
 */

// Add hero_content section
$wp_customize->add_section( 'the_event_hero_content_section', array(
	'title'             => esc_html__( 'Hero Content Section','the-event' ),
	'description'       => esc_html__( 'Hero Content Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// hero_content menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_hero_content]', array(
	'default'           => the_event_theme_option('enable_hero_content'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_hero_content]', array(
	'label'             => esc_html__( 'Enable Hero Content', 'the-event' ),
	'section'           => 'the_event_hero_content_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// hero_content sub title drop down chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[hero_content_sub_title]', array(
	'default'          	=> the_event_theme_option('hero_content_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[hero_content_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_hero_content_section',
	'type'				=> 'text',
) );

// hero_content pages drop down chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[hero_content_content_page]', array(
	'sanitize_callback' => 'the_event_sanitize_page_post',
) );

$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[hero_content_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'the-event' ),
	'section'           => 'the_event_hero_content_section',
	'choices'			=> the_event_page_choices(),
) ) );

// hero_content btn label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[hero_content_btn_label]', array(
	'default'          	=> the_event_theme_option('hero_content_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[hero_content_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'the-event' ),
	'section'           => 'the_event_hero_content_section',
	'type'				=> 'text',
) );

// hero_content btn label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[hero_content_date]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[hero_content_date]', array(
	'label'             => esc_html__( 'Event Date', 'the-event' ),
	'section'           => 'the_event_hero_content_section',
	'type'				=> 'date',
) );
