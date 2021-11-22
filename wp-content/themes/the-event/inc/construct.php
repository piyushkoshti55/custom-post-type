<?php
/**
 * Functions which construct the theme by hooking into WordPress
 *
 * @package the_event
 */


/*------------------------------------------------
            HEADER HOOK
------------------------------------------------*/

if ( ! function_exists( 'the_event_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_doctype() { ?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php }
endif;
add_action( 'the_event_doctype_action', 'the_event_doctype', 10 );

if ( ! function_exists( 'the_event_head' ) ) :
	/**
	 * head Codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_head() { ?>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
				<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
			<?php endif; ?>
			<?php wp_head(); ?>
		</head>
	<?php }
endif;
add_action( 'the_event_head_action', 'the_event_head', 10 );

if ( ! function_exists( 'the_event_body_start' ) ) :
	/**
	 * Body start codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_body_start() { ?>
		<body <?php body_class(); ?>>
		<?php do_action( 'wp_body_open' ); ?>
	<?php }
endif;
add_action( 'the_event_body_start_action', 'the_event_body_start', 10 );


if ( ! function_exists( 'the_event_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_page_start() { ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-event' ); ?></a>
	<?php }
endif;
add_action( 'the_event_page_start_action', 'the_event_page_start', 10 );


if ( ! function_exists( 'the_event_loader' ) ) :
	/**
	 * loader html codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_loader() { 
		if ( ! the_event_theme_option( 'enable_loader' ) )
			return;
		
		$loader = the_event_theme_option( 'loader_type', 'default' )
		?>
		<div id="loader">
            <div class="loader-container">
            	<?php if ( 'default' == $loader ) : ?>
	               	<div id="preloader">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </div>
                <?php else : 
                	echo the_event_get_svg( array( 'icon' => esc_attr( $loader ) ) ); 
                endif; ?>
            </div>
        </div><!-- #loader -->
	<?php }
endif;
add_action( 'the_event_page_start_action', 'the_event_loader', 20 );


if ( ! function_exists( 'the_event_header_start' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_header_start() { 
		$header_layout = the_event_theme_option( 'header_layout', 'normal-header' ); 
		?>
		<header id="masthead" class="site-header <?php echo esc_attr( $header_layout ); ?>">
		<div class="wrapper">
	<?php }
endif;
add_action( 'the_event_header_start_action', 'the_event_header_start', 10 );


if ( ! function_exists( 'the_event_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_site_branding() { ?>
		<div class="site-menu">
            <div class="container">
				<div class="site-branding">
					<?php
					// site logo
					the_custom_logo();
					?>
					<div class="site-details">
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div><!-- .site-details -->
				</div><!-- .site-branding -->
	<?php }
endif;
add_action( 'the_event_site_branding_action', 'the_event_site_branding', 10 );


if ( ! function_exists( 'the_event_primary_nav' ) ) :
	/**
	 * Primary nav codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_primary_nav() { ?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'the-event' ); ?></span>
            <svg viewBox="0 0 40 40" class="icon-menu">
                <g>
                    <rect y="7" width="40" height="2"/>
                    <rect y="19" width="40" height="2"/>
                    <rect y="31" width="40" height="2"/>
                </g>
            </svg>
            <?php echo the_event_get_svg( array( 'icon' => 'close' ) ); ?>
        </button>
		<nav id="site-navigation" class="main-navigation">
			<?php
			$search = '';

			if ( the_event_theme_option( 'enable_header_search' ) ) :
				$search .= '<li class="search-form"><a href="#" class="search">';
				$search .= the_event_get_svg( array( 'icon' => 'search' ) );
				$search .= '</a><div id="search">';
				$search .= get_search_form( $echo = false ); 
				$search .= '</div></li>';
			endif;

			if ( the_event_theme_option( 'enable_header_social_menu' ) && has_nav_menu( 'social' ) ) :
				$search .= '<li class="social-menu">';
				$search .= wp_nav_menu( array(
	            		'theme_location'  	=> 'social',
	            		'container' 		=> false,
	            		'menu_id' 			=> 'social-icons',
        				'menu_class' 		=> 'menu',
	            		'depth'           	=> 1,
	            		'echo' 				=> false,
	        			'link_before' 		=> '<span class="screen-reader-text">',
						'link_after' 		=> '</span>',
	            	) );
				$search .= '</li>';
			endif;
			
			wp_nav_menu( array(
				'theme_location' => 'primary',
    			'container' => 'div',
    			'menu_class' => 'menu nav-menu',
    			'menu_id' => 'primary-menu',
    			'fallback_cb' => 'the_event_menu_fallback_cb',
    			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
			) );
			?>
		</nav><!-- #site-navigation -->
		</div><!-- .container -->
        </div><!-- .site-menu -->
	<?php }
endif;
add_action( 'the_event_primary_nav_action', 'the_event_primary_nav', 10 );


if ( ! function_exists( 'the_event_header_ends' ) ) :
	/**
	 * Header ends codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_header_ends() { ?>
		</div><!-- .wrapper -->
		</header><!-- #masthead -->
	<?php }
endif;
add_action( 'the_event_header_ends_action', 'the_event_header_ends', 10 );


if ( ! function_exists( 'the_event_site_content_start' ) ) :
	/**
	 * Site content start codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_site_content_start() { ?>
		<div id="content" class="site-content">
	<?php }
endif;
add_action( 'the_event_site_content_start_action', 'the_event_site_content_start', 10 );


/**
 * Display custom header title in frontpage and blog
 */
function the_event_custom_header_title() {
	if ( is_home() && is_front_page() ) : 
		$title = the_event_theme_option( 'latest_blog_title', 'Blogs' ); ?>
		<h2><?php echo esc_html( $title ); ?></h2>
	<?php elseif ( is_singular() || ( is_home() && ! is_front_page() ) ): ?>
		<h2><?php single_post_title(); ?></h2>
	<?php elseif ( class_exists( 'WooCommerce' ) && is_shop() ) : ?>
    	<h2><?php woocommerce_page_title(); ?></h2>
    <?php elseif ( is_archive() ) : 
		the_archive_title( '<h2>', '</h2>' );
	elseif ( is_search() ) : ?>
		<h2><?php printf( esc_html__( 'Search Results for: %s', 'the-event' ), get_search_query() ); ?></h2>
	<?php elseif ( is_404() ) :
		echo '<h2>' . esc_html__( 'Oops! That page can&#39;t be found.', 'the-event' ) . '</h2>';
	endif;
}


if ( ! function_exists( 'the_event_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_add_breadcrumb() {
		// Bail if Breadcrumb disabled.
		if ( ! the_event_theme_option( 'enable_breadcrumb' ) ) {
			return;
		}
		
		// Bail if Home Page.
		if ( ! is_home() && is_front_page() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * the_event_breadcrumb hook
				 *
				 * @hooked the_event_breadcrumb -  10
				 *
				 */
				do_action( 'the_event_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;


if ( ! function_exists( 'the_event_custom_header' ) ) :
	/**
	 * Site content codes
	 *
	 * @since The Event 1.0.0
	 *
	 */
	function the_event_custom_header() {
		if ( ! is_home() && is_front_page() ) {
			return;
		}
		
		$header_layout = the_event_theme_option( 'header_layout', 'normal-header' );
		$image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/uploads/banner.jpg';
		if ( is_singular() ) {
			$image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $image;
		}
		?>

        <div class="inner-header-image <?php echo ( 'absolute-header' == $header_layout ) ? 'inner-header-absolute' : ''; ?>" style="background-image: url( '<?php echo esc_url( $image ); ?>' )">
        	<div class="overlay"></div>
        	<div class="wrapper">
                <div class="custom-header-content">
                    <?php 
                    echo the_event_custom_header_title();
                    the_event_add_breadcrumb(); 
                    ?>
                </div><!-- .custom-header-content -->
        	</div><!-- .wrapper -->
        </div><!-- .custom-header-content-wrapper -->
		<?php
	}
endif;
add_action( 'the_event_site_content_start_action', 'the_event_custom_header', 20 );


/*------------------------------------------------
            FOOTER HOOK
------------------------------------------------*/

if ( ! function_exists( 'the_event_site_content_ends' ) ) :
	/**
	 * Site content ends codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_site_content_ends() { ?>
		</div><!-- #content -->
	<?php }
endif;
add_action( 'the_event_site_content_ends_action', 'the_event_site_content_ends', 10 );


if ( ! function_exists( 'the_event_footer_start' ) ) :
	/**
	 * Footer start codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_footer_start() { ?>
		<footer id="colophon" class="site-footer">
	<?php }
endif;
add_action( 'the_event_footer_start_action', 'the_event_footer_start', 10 );


if ( ! function_exists( 'the_event_site_info' ) ) :
	/**
	 * Site info codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_site_info() { 
		$copyright = the_event_theme_option('copyright_text');
		?>
		<div class="site-info">
            <div class="wrapper">
            	<?php if ( ! empty( $copyright ) ) : ?>
	                <div class="copyright">
	                	<p>
	                    	<?php 
	                    	echo the_event_santize_allow_tags( $copyright ); 
	                    	printf( esc_html__( ' The Event by %1$s Shark Themes %2$s', 'the-event' ), '<a href="' . esc_url( 'http://sharkthemes.com/' ) . '" target="_blank">','</a>' );
	                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( ' | ' );
							}
	                    	?>
	                    </p>
	                </div><!-- .copyright -->
	            <?php endif; 

	            if ( ! empty( $copyright ) ) : ?>
	                <div class="powered-by">
	                    <?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
			        			'container' => false,
			        			'menu_class' => 'menu nav-menu',
			        			'menu_id' => 'footer-menu',
			        			'fallback_cb' => 'the_event_menu_fallback_cb',
							) );
						?>
	                </div><!-- .powered-by -->
	            <?php endif; ?>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->
	<?php }
endif;
add_action( 'the_event_site_info_action', 'the_event_site_info', 10 );


if ( ! function_exists( 'the_event_footer_ends' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_footer_ends() { ?>
		</footer><!-- #colophon -->
	<?php }
endif;
add_action( 'the_event_footer_ends_action', 'the_event_footer_ends', 10 );


if ( ! function_exists( 'the_event_slide_to_top' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_slide_to_top() { ?>
		<div class="backtotop">
            <?php echo the_event_get_svg( array( 'icon' => 'up' ) ); ?>
        </div><!-- .backtotop -->
	<?php }
endif;
add_action( 'the_event_footer_ends_action', 'the_event_slide_to_top', 20 );


if ( ! function_exists( 'the_event_page_ends' ) ) :
	/**
	 * Page ends codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_page_ends() { ?>
		</div><!-- #page -->
	<?php }
endif;
add_action( 'the_event_page_ends_action', 'the_event_page_ends', 10 );


if ( ! function_exists( 'the_event_body_html_ends' ) ) :
	/**
	 * Body & Html ends codes
	 *
	 * @since The Event 1.0.0
	 */
	function the_event_body_html_ends() { ?>
		</body>
		</html>
	<?php }
endif;
add_action( 'the_event_body_html_ends_action', 'the_event_body_html_ends', 10 );
