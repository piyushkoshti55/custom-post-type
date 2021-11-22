<?php
/**
 * Contact hook
 *
 * @package the_event
 */

if ( ! function_exists( 'the_event_add_contact_section' ) ) :
    /**
    * Add contact section
    *
    *@since Kingston Pro 1.0.0
    */
    function the_event_add_contact_section() {

        // Check if contact is enabled on frontpage
        $contact_enable = apply_filters( 'the_event_section_status', 'enable_contact', '' );

        if ( ! $contact_enable )
            return false;

        // Render contact section now.
        the_event_render_contact_section();
    }
endif;

if ( ! function_exists( 'the_event_render_contact_section' ) ) :
  /**
   * Start contact section
   *
   * @return string contact content
   * @since Kingston Pro 1.0.0
   *
   */
   function the_event_render_contact_section() {
        $contact_shortcode = the_event_theme_option( 'contact_shortcode', '' );
        $contact_image = the_event_theme_option( 'contact_image', '' );
        $title = the_event_theme_option( 'contact_title', '' );
        $sub_title = the_event_theme_option( 'contact_sub_title', '' );
        $map_shortcode = the_event_theme_option( 'map_shortcode', '' );

        // if ( empty( $contact_shortcode ) && empty( $contact_image ) )
        //     return;

        ?>
        <div id="contact" class="relative page-section" style="background-image: url('<?php echo esc_url( $contact_image ); ?>');">
            <div class="wrapper">

                <div class="section-content right-align">
                    <div class="entry-container">
                        <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                            <div class="section-header">
                                <?php if ( ! empty( $sub_title ) ) : ?>
                                    <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                                <?php endif;

                                if ( ! empty( $title ) ) : ?>
                                    <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                                <?php endif; ?>
                            </div><!-- .section-header -->
                        <?php endif; ?>

                        <?php if ( ! empty( $contact_shortcode ) ) :
                            echo do_shortcode( wp_kses_post( $contact_shortcode ) );
                        endif; ?>
                    </div><!-- .entry-container -->
                </div><!-- .section-content -->
            </div><!-- .wrapper -->

            <div id="map" class="relative">
                <?php if ( ! empty( $map_shortcode ) ) :
                    echo do_shortcode( wp_kses_post( $map_shortcode ) );
                endif; ?>
            </div><!-- #map-posts -->
        
        </div><!-- #contact-posts -->

    <?php 
    }
endif;