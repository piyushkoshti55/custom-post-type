<?php
/**
 * Portfolio Customizer Options
 *
 * @package the_event
 */

// Add portfolio section
$wp_customize->add_section( 'the_event_portfolio_section', array(
	'title'             => esc_html__( 'Portfolio Section','the-event' ),
	'description'       => esc_html__( 'Portfolio Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// portfolio menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_portfolio]', array(
	'default'           => the_event_theme_option('enable_portfolio'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_portfolio]', array(
	'label'             => esc_html__( 'Enable Portfolio', 'the-event' ),
	'section'           => 'the_event_portfolio_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// portfolio sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[portfolio_sub_title]', array(
	'default'          	=> the_event_theme_option('portfolio_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[portfolio_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_portfolio_section',
	'type'				=> 'text',
) );

// portfolio label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[portfolio_title]', array(
	'default'          	=> the_event_theme_option('portfolio_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[portfolio_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_portfolio_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 6; $i++ ) :

	// portfolio posts drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[portfolio_content_post_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[portfolio_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'the-event' ), $i ),
		'section'           => 'the_event_portfolio_section',
		'choices'			=> the_event_post_choices(),
	) ) );

endfor;
