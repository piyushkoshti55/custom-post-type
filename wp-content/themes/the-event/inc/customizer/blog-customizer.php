<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package the_event
 */

// Add blog section
$wp_customize->add_section( 'the_event_blog_section', array(
	'title'             => esc_html__( 'Blog/Archive Page Setting','the-event' ),
	'description'       => esc_html__( 'Blog/Archive/Search Page Setting Options', 'the-event' ),
	'panel'             => 'the_event_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> the_event_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'the-event' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'type'				=> 'text',
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'the_event_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'the_event_sanitize_select',
	'default'             => the_event_theme_option( 'sidebar_layout' ),
) );

$wp_customize->add_control(  new The_Event_Radio_Image_Control ( $wp_customize, 'the_event_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'the-event' ),
	'section'             => 'the_event_blog_section',
	'choices'			  => the_event_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'the_event_theme_options[column_type]', array(
	'default'          	=> the_event_theme_option( 'column_type' ),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'the-event' ),
		'column-2' 		=> esc_html__( 'Two Column', 'the-event' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'the_event_theme_options[excerpt_count]', array(
	'default'          	=> the_event_theme_option( 'excerpt_count' ),
	'sanitize_callback' => 'the_event_sanitize_number_range',
	'validate_callback' => 'the_event_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'the_event_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'the-event' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'the_event_theme_options[pagination_type]', array(
	'default'          	=> the_event_theme_option( 'pagination_type' ),
	'sanitize_callback' => 'the_event_sanitize_select',
) );

$wp_customize->add_control( 'the_event_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'the-event' ),
		'numeric' 		=> esc_html__( 'Numeric', 'the-event' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_date]', array(
	'default'           => the_event_theme_option( 'show_date' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_category]', array(
	'default'           => the_event_theme_option( 'show_category' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_author]', array(
	'default'           => the_event_theme_option( 'show_author' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );

// Archive comment meta setting and control.
$wp_customize->add_setting( 'the_event_theme_options[show_comment]', array(
	'default'           => the_event_theme_option( 'show_comment' ),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[show_comment]', array(
	'label'             => esc_html__( 'Show Comment', 'the-event' ),
	'section'           => 'the_event_blog_section',
	'on_off_label' 		=> the_event_show_options(),
) ) );