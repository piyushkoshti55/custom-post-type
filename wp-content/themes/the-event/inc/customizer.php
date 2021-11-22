<?php
/**
 * The Event Theme Customizer
 *
 * @package the_event
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_event_customize_register( $wp_customize ) {
	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/controls.php';

	// Load callback functions.
	require get_template_directory() . '/inc/customizer/callbacks.php';

	// Load validation functions.
	require get_template_directory() . '/inc/customizer/validate.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'the_event_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'the_event_customize_partial_blogdescription',
		) );
	}

	// Register custom section types.
	$wp_customize->register_section_type( 'The_Event_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new The_Event_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'The Event Pro', 'the-event' ),
				'pro_text' => esc_html__( 'Buy Pro', 'the-event' ),
				'pro_url'  => 'http://www.sharkthemes.com/downloads/the-event-pro/',
				'priority'  => 10,
			)
		)
	);

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'the_event_homepage_sections_panel' , array(
	    'title'      => esc_html__( 'Homepage Sections','the-event' ),
	    'description'=> esc_html__( 'The Event Homepage Sections.', 'the-event' ),
	    'priority'   => 100,
	) );

	// slider settings
	require get_template_directory() . '/inc/customizer/homepage-sections/slider-customizer.php';

	// hero content settings
	require get_template_directory() . '/inc/customizer/homepage-sections/hero-content-customizer.php';

	// speaker settings
	require get_template_directory() . '/inc/customizer/homepage-sections/speaker-customizer.php';

	// service settings
	require get_template_directory() . '/inc/customizer/homepage-sections/service-customizer.php';

	// team settings
	require get_template_directory() . '/inc/customizer/homepage-sections/team-customizer.php';

	// schedule settings
	require get_template_directory() . '/inc/customizer/homepage-sections/schedule-customizer.php';

	// portfolio settings
	require get_template_directory() . '/inc/customizer/homepage-sections/portfolio-customizer.php';

	// skills settings
	require get_template_directory() . '/inc/customizer/homepage-sections/skills-customizer.php';

	// gallery settings
	require get_template_directory() . '/inc/customizer/homepage-sections/gallery-customizer.php';

	// product settings
	require get_template_directory() . '/inc/customizer/homepage-sections/product-customizer.php';

	// cta settings
	require get_template_directory() . '/inc/customizer/homepage-sections/cta-customizer.php';

	// client settings
	require get_template_directory() . '/inc/customizer/homepage-sections/client-customizer.php';

	// testimonial settings
	require get_template_directory() . '/inc/customizer/homepage-sections/testimonial-customizer.php';

	// recent settings
	require get_template_directory() . '/inc/customizer/homepage-sections/recent-customizer.php';
	
	// contact settings
	require get_template_directory() . '/inc/customizer/homepage-sections/contact-customizer.php';

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'the_event_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','the-event' ),
	    'description'=> esc_html__( 'The Event Theme Options.', 'the-event' ),
	    'priority'   => 100,
	) );

	// header settings
	require get_template_directory() . '/inc/customizer/header-customizer.php';

	// footer settings
	require get_template_directory() . '/inc/customizer/footer-customizer.php';
	
	// blog/archive settings
	require get_template_directory() . '/inc/customizer/blog-customizer.php';

	// single settings
	require get_template_directory() . '/inc/customizer/single-customizer.php';

	// page settings
	require get_template_directory() . '/inc/customizer/page-customizer.php';

	// global settings
	require get_template_directory() . '/inc/customizer/global-customizer.php';

}
add_action( 'customize_register', 'the_event_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function the_event_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function the_event_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_event_customize_preview_js() {
	wp_enqueue_script( 'the-event-customizer', get_template_directory_uri() . '/assets/js/customizer' . the_event_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'the_event_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function the_event_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . the_event_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . the_event_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// Choose fontawesome select jquery.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . the_event_min() . '.css' );
	wp_enqueue_style( 'simple-iconpicker', get_template_directory_uri() . '/assets/css/simple-iconpicker' . the_event_min() . '.css' );
	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . the_event_min() . '.js', array( 'jquery' ), '', true );

	// admin script
	wp_enqueue_style( 'the-event-customizer-style', get_template_directory_uri() . '/assets/css/customizer' . the_event_min() . '.css' );
	wp_enqueue_script( 'the-event-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls' . the_event_min() . '.js', array( 'jquery', 'jquery-chosen', 'jquery-simple-iconpicker' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'the_event_customize_control_js' );

if ( ! function_exists( 'the_event_reset_sortable_options' ) ) :
	/**
	 * Reset sortable options
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function the_event_reset_sortable_options() {
		if ( true === the_event_theme_option('sortable_reset') ) {

			$the_event_default_options = the_event_get_default_theme_options();
	  		$theme_data = wp_parse_args( get_theme_mod( 'the_event_theme_options' ), $the_event_default_options ) ;
	  		$sortable_update = array( 'sortable_reset' => false, 'sortable' => '' );
	  		$theme_data_update = array_replace( $theme_data, $sortable_update );

			// Reset sortable theme options.
			set_theme_mod( 'the_event_theme_options', $theme_data_update );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'the_event_reset_sortable_options' );
