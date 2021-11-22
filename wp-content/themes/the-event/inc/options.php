<?php
/**
 * Options functions
 *
 * @package the_event
 */

if ( ! function_exists( 'the_event_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function the_event_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'the-event' ),
            'off'       => esc_html__( 'No', 'the-event' )
        );
        return apply_filters( 'the_event_show_options', $arr );
    }
endif;

if ( ! function_exists( 'the_event_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function the_event_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'the-event' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'the_event_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function the_event_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'the-event' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'the_event_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function the_event_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'the-event' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'the_event_product_choices' ) ) :
    /**
     * List of products for product choices.
     * @return Array Array of product ids and name.
     */
    function the_event_product_choices() {
        $posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'the-event' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'the_event_product_category_choices' ) ) :
    /**
     * List of product categories for product category choices.
     * @return Array Array of product category ids and name.
     */
    function the_event_product_category_choices() {
        $args = array(
                'type'          => 'product',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'product_cat',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'the-event' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'the_event_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function the_event_site_layout() {
        $the_event_site_layout = array(
            'full'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'boxed'   => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'the_event_site_layout', $the_event_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'the_event_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function the_event_sidebar_position() {
        $the_event_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/uploads/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/uploads/full.png',
        );

        $output = apply_filters( 'the_event_sidebar_position', $the_event_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'the_event_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function the_event_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'the-event' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'the-event' ),
            'spinner-dots'          => esc_html__( 'Dots', 'the-event' ),
        );
        return apply_filters( 'the_event_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'the_event_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function the_event_selected_sidebar() {
        $the_event_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'the-event' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'the-event' ),
        );

        $output = apply_filters( 'the_event_selected_sidebar', $the_event_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'the_event_sortable_sections' ) ) :
    /**
     * homepage sections
     * @return array sortable sections
     */
    function the_event_sortable_sections() {
        $output = array( 
            'slider'        => esc_html__( 'Slider Section', 'the-event' ),
            'hero_content'  => esc_html__( 'Hero Content Section', 'the-event' ),
            'speaker'       => esc_html__( 'Speaker Section', 'the-event' ),
            'service'       => esc_html__( 'Service Section', 'the-event' ),
            'team'          => esc_html__( 'Team Section', 'the-event' ),
            'schedule'      => esc_html__( 'Schedule Section', 'the-event' ),
            'portfolio'     => esc_html__( 'Portfolio Section', 'the-event' ),
            'skills'        => esc_html__( 'Skills Section', 'the-event' ),
            'gallery'       => esc_html__( 'Gallery Section', 'the-event' ),
            'product'       => esc_html__( 'Product Section', 'the-event' ),
            'cta'           => esc_html__( 'Call to Action Section', 'the-event' ),
            'client'        => esc_html__( 'Client Section', 'the-event' ),
            'testimonial'   => esc_html__( 'Testimonial Section', 'the-event' ),
            'recent'        => esc_html__( 'Recent Section', 'the-event' ),
            'contact'       => esc_html__( 'Contact Section', 'the-event' ),
        );

        return $output;
    }
endif;
