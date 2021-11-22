<?php
/**
 * demo import
 *
 * @package the_event
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function the_event_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Get demo content files for The Event Theme.', 'the-event' ),
    esc_url( 'https://sharkthemes.com/downloads/the-event' ), esc_html__( 'Click Here', 'the-event' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'the_event_intro_text' );
