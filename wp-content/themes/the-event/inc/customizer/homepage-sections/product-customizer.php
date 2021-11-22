<?php
/**
 * Product Customizer Options
 *
 * @package the_event
 */

// Add featured section
$wp_customize->add_section( 'the_event_product_section', array(
	'title'             => esc_html__( 'Product Section','the-event' ),
	'description'       => esc_html__( 'Note: You need to install WooCommerce to customize this section.', 'the-event' ),
	'panel'             => 'the_event_homepage_sections_panel',
) );

// featured menu enable setting and control.
$wp_customize->add_setting( 'the_event_theme_options[enable_product]', array(
	'default'           => the_event_theme_option('enable_product'),
	'sanitize_callback' => 'the_event_sanitize_switch',
) );

$wp_customize->add_control( new The_Event_Switch_Control( $wp_customize, 'the_event_theme_options[enable_product]', array(
	'label'             => esc_html__( 'Enable Product', 'the-event' ),
	'section'           => 'the_event_product_section',
	'on_off_label' 		=> the_event_show_options(),
	'active_callback'	=> 'the_event_has_woocommerce',
) ) );

// featured sub title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[product_sub_title]', array(
	'default'          	=> the_event_theme_option('product_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[product_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'the-event' ),
	'section'           => 'the_event_product_section',
	'type'				=> 'text',
	'active_callback'	=> 'the_event_has_woocommerce',
) );

// featured title chooser control and setting
$wp_customize->add_setting( 'the_event_theme_options[product_title]', array(
	'default'          	=> the_event_theme_option('product_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'the_event_theme_options[product_title]', array(
	'label'             => esc_html__( 'Title', 'the-event' ),
	'section'           => 'the_event_product_section',
	'type'				=> 'text',
	'active_callback'	=> 'the_event_has_woocommerce',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// featured products drop down chooser control and setting
	$wp_customize->add_setting( 'the_event_theme_options[product_content_product_' . $i . ']', array(
		'sanitize_callback' => 'the_event_sanitize_page_post',
	) );

	$wp_customize->add_control( new The_Event_Dropdown_Chosen_Control( $wp_customize, 'the_event_theme_options[product_content_product_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Product %d', 'the-event' ), $i ),
		'section'           => 'the_event_product_section',
		'choices'			=> the_event_product_choices(),
		'active_callback'	=> 'the_event_has_woocommerce',
	) ) );

endfor;
