<?php
/**
 * Slider Customizer Options
 *
 * @package the_event
 */

// Add slider section
$wp_customize->add_section( 'the_event_slider_section', array(
	'title'             => esc_html__( 'Slider Section','the-event' ),
	'description'       => esc_html__( 'Slider Setting Options', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_slider]', array(
	'default'           => the_event_theme_option('enable_slider'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[slider_arrow]', array(
	'default'           => the_event_theme_option('slider_arrow'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// slider autoplay control enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[slider_autoplay]', array(
	'default'           => the_event_theme_option('slider_autoplay'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[slider_autoplay]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// slider wave border enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_slider_wave]', array(
	'default'           => the_event_theme_option('enable_slider_wave'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_slider_wave]', array(
	'label'             => esc_html__( 'Enable Slider Wave Border', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// slider count control and setting
$wp_customize->add_setting( 'the_event_theme_options[slider_opacity]', array(
	'default'          	=> the_event_theme_option('slider_opacity'),
	'sanitize_callback' => 'the_event_sanitize_number_range',
) );

$wp_customize->add_control( 'the_event_theme_options[slider_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// slider alignment type control and setting
$wp_customize->add_setting( 'the_event_theme_options[slider_align]', array(
	'default'          	=> the_event_theme_option('slider_align'),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[slider_align]', array(
	'label'             => esc_html__( 'Alignment', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'left-align' 		=> esc_html__( 'Left Align', 'the-event' ),
		'center-align' 		=> esc_html__( 'Center Align', 'the-event' ),
		'right-align' 		=> esc_html__( 'Right Align', 'the-event' ),
	),
) );

// slider text color type control and setting
$wp_customize->add_setting( 'the_event_theme_options[slider_text]', array(
	'default'          	=> the_event_theme_option('slider_text'),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[slider_text]', array(
	'label'             => esc_html__( 'Text Color', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'light-text' 		=> esc_html__( 'Light Text', 'the-event' ),
		'dark-text' 		=> esc_html__( 'Dark Text', 'the-event' ),
	),
) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[slider_btn_label]', array(
	'default'          	=> the_event_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'type'				=> 'text',
) );

// slider alt btn label chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[slider_alt_btn_label]', array(
	'default'          	=> the_event_theme_option('slider_alt_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[slider_alt_btn_label]', array(
	'label'             => esc_html__( 'Alt Button Label', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'type'				=> 'text',
) );

// slider alt btn link chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[slider_alt_btn_link]', array(
	'default'          	=> the_event_theme_option('slider_alt_btn_link'),
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'the_event_theme_options[slider_alt_btn_link]', array(
	'label'             => esc_html__( 'Alt Button Url', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'type'				=> 'url',
) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[slider_alt_btn_color]', array(
	'default'           => the_event_theme_option('slider_alt_btn_color'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[slider_alt_btn_color]', array(
	'label'             => esc_html__( 'Enable Alt Button Color', 'the-event' ),
	'section'           => 'the_event_slider_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

for ( $i = 1; $i <= 2; $i++ ) :

	// slider title drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[slider_sub_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'the_event_theme_options[slider_sub_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Sub Title %d', 'the-event' ), $i ),
		'section'           => 'the_event_slider_section',
		'type'				=> 'text',
	) );

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'the-event' ), $i ),
		'section'           => 'the_event_slider_section',
		'choices'			=> the_event_page_choices(),
	) ) );

endfor;
