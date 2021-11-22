<?php
/**
 * Hero Content hook
 *
 * @package the_event
 */

if ( ! function_exists( 'the_event_add_hero_content_section' ) ) :
    /**
    * Add hero_content section
    *
    *@since The Event 1.0.0
    */
    function the_event_add_hero_content_section() {

        // Check if hero_content is enabled on frontpage
        $hero_content_enable = apply_filters( 'the_event_section_status', 'enable_hero_content', '' );

        if ( ! $hero_content_enable )
            return false;

        // Get hero_content section details
        $section_details = array();
        $section_details = apply_filters( 'the_event_filter_hero_content_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render hero_content section now.
        the_event_render_hero_content_section( $section_details );
    }
endif;

if ( ! function_exists( 'the_event_get_hero_content_section_details' ) ) :
    /**
    * hero_content section details.
    *
    * @since The Event 1.0.0
    * @param array $input hero_content section details.
    */
    function the_event_get_hero_content_section_details( $input ) {

        $content = array();
        $page_id = the_event_theme_option( 'hero_content_content_page', '' );
        
        $args = array(
            'post_type' => 'page',
            'page_id' => absint( $page_id ),
            'posts_per_page' => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = the_event_trim_content( 35 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// hero_content section content details.
add_filter( 'the_event_filter_hero_content_section_details', 'the_event_get_hero_content_section_details' );


if ( ! function_exists( 'the_event_render_hero_content_section' ) ) :
  /**
   * Start hero_content section
   *
   * @return string hero_content content
   * @since The Event 1.0.0
   *
   */
   function the_event_render_hero_content_section( $content_details = array() ) {
        $read_more = the_event_theme_option( 'hero_content_btn_label', esc_html__( 'Learn More', 'the-event' ) );
        $date = the_event_theme_option( 'hero_content_date' );
        $time = the_event_theme_option( 'hero_content_time' );
        $sub_title = the_event_theme_option( 'hero_content_sub_title', '' );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) : ?>
        	<div class="page-section hero-section relative" <?php if ( ! empty( $content['image'] ) ) { echo 'style="background-image: url(' . esc_url( $content['image'] ) . ')"'; } ?>>
                <div class="overlay"></div>
                <div class="wrapper">
                    <article class="hentry">
                        <div class="post-wrapper">
                            <?php if ( ! empty( $content['title'] ) || ! empty( $sub_title ) ) : ?>
                                <div class="section-header align-center">
                                    <?php if ( ! empty( $sub_title ) ) : ?>
                                        <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                                    <?php endif;

                                    if ( ! empty( $content['title'] ) ) : ?>
                                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                    <?php endif; ?>
                                </div><!-- .section-header -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="entry-content">
                                        <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <div id="countdown" data-date="<?php echo esc_html( $date ); ?>"></div>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $read_more ); ?></a>
                                </div>
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #hero_content -->
        <?php endforeach;
    }
endif;