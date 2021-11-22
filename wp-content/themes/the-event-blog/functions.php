<?php
/**
 * Theme functions and definitions
 *
 * @package the_event_blog
 */ 


if ( ! function_exists( 'the_event_blog_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function the_event_blog_enqueue_styles() {
		wp_enqueue_style( 'the-event-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'the-event-blog-style', get_stylesheet_directory_uri() . '/style.css', array( 'the-event-style-parent' ), '1.0.0' );

		// Add custom fonts, used in the main stylesheet.
        wp_enqueue_style( 'the-event-blog-fonts', the_event_blog_fonts_url(), array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'the_event_blog_enqueue_styles', 99 );

function the_event_blog_do_action() {
	add_action( 'customize_register', 'the_event_blog_customize_register' );
    remove_action( 'the_event_header_start_action', 'the_event_blog_header_start', 10 );
}
add_action( 'init', 'the_event_blog_do_action');

function the_event_blog_customize_register( $wp_customize ) {
	$wp_customize->remove_control('the_event_theme_options[header_layout]');
	$wp_customize->add_control( 'the_event_theme_options[header_layout]', array(
		'label'             => esc_html__( 'Header Layout', 'the-event-blog' ),
		'section'           => 'the_event_header_section',
		'type'				=> 'radio',
		'choices'			=> array( 
			'normal-header' 	=> esc_html__( 'Normal', 'the-event-blog' ),
			'absolute-header' 	=> esc_html__( 'Absolute', 'the-event-blog' ),
			'center-header' 	=> esc_html__( 'Center Align', 'the-event-blog' ),
		),
	) );
}

if ( ! function_exists( 'the_event_blog_theme_defaults' ) ) :
    /**
     * Customize theme defaults.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function the_event_blog_theme_defaults( $defaults ) {
        $defaults['header_layout'] = 'center-header';
        $defaults['enable_slider'] = false;
        $defaults['enable_hero_content'] = false;
        $defaults['enable_speaker'] = false;
        $defaults['enable_service'] = false;
        $defaults['enable_team'] = false;
        $defaults['enable_schedule'] = false;
        $defaults['enable_gallery'] = false;
        $defaults['enable_portfolio'] = false;
        $defaults['enable_skills'] = false;
        $defaults['enable_product'] = false;
        $defaults['enable_client'] = false;
        $defaults['enable_testimonial'] = false;
        $defaults['enable_recent'] = false;
        $defaults['enable_cta'] = false;
        $defaults['enable_contact'] = false;

        return $defaults;
    }
endif;
add_filter( 'the_event_default_theme_options', 'the_event_blog_theme_defaults', 99 );

/**
 * Enqueue editor styles for Gutenberg
 */
function the_event_blog_block_editor_styles() {
    // Add custom fonts.
    wp_enqueue_style( 'the-event-blog-fonts', the_event_blog_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'the_event_blog_block_editor_styles' );

if ( ! function_exists( 'the_event_blog_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function the_event_blog_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'the-event-blog' ) ) {
        $fonts[] = 'Playfair Display:300,400,500,600,700';
    }

    /* translators: If there are characters in your language that are not supported by Oxygen, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'the-event-blog' ) ) {
        $fonts[] = 'Oxygen:300,400,500,600,700';
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $fonts ) ),
        'subset' => urlencode( $subsets ),
    );

    if ( $fonts ) {
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}
endif;

// Add class to body.
add_filter( 'body_class', 'the_event_blog_add_body_class' );
function the_event_blog_add_body_class( $classes ) {
    return array_merge( $classes, array( 'header-font-8', 'body-font-6' ) );
}

if ( ! function_exists( 'the_event_blog_header_start' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_blog_header_start() { 
		$header_layout = the_event_theme_option( 'header_layout', 'normal-header' ); 
		?>
		<header id="masthead" class="site-header <?php echo esc_attr( $header_layout ); ?>">
		<div class="wrapper">
	<?php }
endif;
add_action( 'the_event_header_start_action', 'the_event_blog_header_start', 10 );