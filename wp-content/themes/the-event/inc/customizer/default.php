<?php
/**
 * Default Theme Customizer Values
 *
 * @package the_event
 */

function the_event_get_default_theme_options() {
	$the_event_default_options = array(
		// default options

		/* Homepage Sections */

		// Slider
		'enable_slider'			=> true,
		'enable_slider_wave'	=> false,
		'slider_arrow'			=> true,
		'slider_autoplay'		=> true,
		'slider_opacity'		=> 3,
		'slider_align'			=> 'center-align',
		'slider_text'			=> 'light-text',
		'slider_btn_label'		=> esc_html__( 'Learn More', 'the-event' ),
		'slider_alt_btn_url'	=> '#',
		'slider_alt_btn_color'	=> false,

		// Hero Content
		'enable_hero_content'		=> true,
		'hero_content_sub_title'	=> esc_html__( 'Count Down', 'the-event' ),
		'hero_content_btn_label'	=> esc_html__( 'Learn More', 'the-event' ),

		// Speakers
		'enable_speaker'			=> true,
		'speaker_sub_title'			=> esc_html__( 'Speakers', 'the-event' ),
		'speaker_title'				=> esc_html__( 'World Freelancers', 'the-event' ),

		// Service
		'enable_service'		=> true,
		'service_sub_title'		=> esc_html__( 'Why Attend', 'the-event' ),
		'service_title'			=> esc_html__( 'What We Offer', 'the-event' ),

		// Team
		'enable_team'			=> true,
		'team_sub_title'		=> esc_html__( 'Organizers', 'the-event' ),
		'team_title'			=> esc_html__( 'Meet Our Exclusive Team', 'the-event' ),
		'team_content_type'		=> 'page',
		'team_column'			=> 'column-4',
		'team_image_layout'		=> 'circle-layout',
		'team_count'			=> 4,

		// Schedule
		'enable_schedule'		=> true,
		'schedule_sub_title'	=> esc_html__( 'Schedule', 'the-event' ),
		'schedule_title'		=> esc_html__( 'Our Timetable', 'the-event' ),

		// Gallery
		'enable_gallery'		=> true,
		'gallery_sub_title'		=> esc_html__( 'Gallery', 'the-event' ),
		'gallery_title'			=> esc_html__( 'Our Previous Event', 'the-event' ),

		// Portfolio
		'enable_portfolio'		=> true,
		'portfolio_sub_title'	=> esc_html__( 'Portfolio', 'the-event' ),
		'portfolio_title'		=> esc_html__( 'Our popular case studies', 'the-event' ),

		// Skills
		'enable_skills'			=> false,
		'skills_sub_title'		=> esc_html__( 'Our Skills', 'the-event' ),
		'skills_title'			=> esc_html__( 'Prominent key Features', 'the-event' ),

		// Product
		'enable_product'		=> true,
		'product_title'			=> esc_html__( 'Featured Products', 'the-event' ),
		'product_sub_title'		=> esc_html__( 'Special in This Spring', 'the-event' ),

		// Client
		'enable_client'			=> true,
		'client_sub_title'		=> esc_html__( 'Sponsors', 'the-event' ),
		'client_title'			=> esc_html__( 'Our Major Clients', 'the-event' ),

		// Testimonial
		'enable_testimonial'	=> true,
		'testimonial_sub_title'	=> esc_html__( 'Testimonial', 'the-event' ),
		'testimonial_title'		=> esc_html__( 'What People Say', 'the-event' ),

		// Recent
		'enable_recent'			=> true,
		'recent_sub_title'		=> esc_html__( 'Latest News', 'the-event' ),
		'recent_title'			=> esc_html__( 'Check latest blogs for more inspiration', 'the-event' ),
		'recent_content_type'	=> 'recent',

		// Call to action
		'enable_cta'			=> true,
		'cta_btn_label'			=> esc_html__( 'Contact Us Now', 'the-event' ),
		'cta_opacity'			=> 7,

		// Contact
		'enable_contact'		=> false,
		'contact_sub_title'		=> esc_html__( 'Contact', 'the-event' ),
		'contact_title'			=> esc_html__( 'Send Your Requirements', 'the-event' ),
		
		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; The Event Theme | All Rights Reserved.', 'the-event' ),

		/* Theme Options */

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Blogs', 'the-event' ),
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_comment'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'enable_front_page'		=> false,
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> true,
		'subtitle_layout'		=> 'absolute-subtitle',
		'enable_breadcrumb'		=> true,
		'enable_header_social_menu'	=> false,
		'enable_header_search'	=> false,
		'header_layout'			=> 'normal-header',
		'loader_type'			=> 'default',
		'site_layout'			=> 'full',
	);

	$output = apply_filters( 'the_event_default_theme_options', $the_event_default_options );
	return $output;
}