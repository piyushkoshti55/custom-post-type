<?php
/**
 * Footer Customizer Options
 *
 * @package the_event
 */

// Add footer section
$wp_customize->add_section( 'the_event_footer_section', array(
	'title'             => esc_html__( 'Footer Section','the-event' ),
	'description'       => esc_html__( 'Footer Setting Options', 'the-event' ),
	'panel'             => 'the_event_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[slide_to_top]', array(
	'default'           => the_event_theme_option('slide_to_top'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'the-event' ),
	'section'           => 'the_event_footer_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'the_event_theme_options[copyright_text]',
	array(
		'default'       		=> the_event_theme_option('copyright_text'),
		'sanitize_callback'		=> 'the_event_santize_allow_tags',
	)
);
$wp_customize->add_control( 'the_event_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'the-event' ),
		'section'    			=> 'the_event_footer_section',
		'type'		 			=> 'textarea',
    )
);

