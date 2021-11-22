<?php
/**
 * Callbacks functions
 *
 * @package the_event
 */

if ( ! function_exists( 'the_event_has_woocommerce' ) ) :
	/**
	 * Check if woocommerce is enabled enabled
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function the_event_has_woocommerce() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
endif;

if ( ! function_exists( 'the_event_recent_content_category_enable' ) ) :
	/**
	 * Check if recent content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function the_event_recent_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'the_event_theme_options[recent_content_type]' )->value();
	}
endif;
