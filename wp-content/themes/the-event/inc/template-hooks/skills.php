<?php
/**
 * Skills hook
 *
 * @package the_event
 */

if ( ! function_exists( 'the_event_add_skills_section' ) ) :
    /**
    * Add skills section
    *
    *@since The Event 1.0.0
    */
    function the_event_add_skills_section() {

        // Check if skills is enabled on frontpage
        $skills_enable = apply_filters( 'the_event_section_status', 'enable_skills', '' );

        if ( ! $skills_enable )
            return false;

        // Get skills section details
        $section_details = array();
        $section_details = apply_filters( 'the_event_filter_skills_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render skills section now.
        the_event_render_skills_section( $section_details );
    }
endif;

if ( ! function_exists( 'the_event_get_skills_section_details' ) ) :
    /**
    * skills section details.
    *
    * @since The Event 1.0.0
    * @param array $input skills section details.
    */
    function the_event_get_skills_section_details( $input ) {

        $skills_count  = the_event_theme_option( 'skills_count', 3 );
        $content = array();
        $page_ids = array();
        $icons = array();

        for ( $i = 1; $i <= 4; $i++ ) :
            $page_id = the_event_theme_option( 'skills_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $icons[] = the_event_theme_option( 'skills_icon_' . $i );
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = the_event_trim_content( 12 );
                $page_post['icon']      = ! empty( $icons[ $i ] ) ? $icons[ $i ] : 'fa-laptop';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// skills section content details.
add_filter( 'the_event_filter_skills_section_details', 'the_event_get_skills_section_details' );


if ( ! function_exists( 'the_event_render_skills_section' ) ) :
  /**
   * Start skills section
   *
   * @return string skills content
   * @since The Event 1.0.0
   *
   */
   function the_event_render_skills_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $skills_image = the_event_theme_option( 'skills_image', '' );
        $title = the_event_theme_option( 'skills_title', '' );
        $sub_title = the_event_theme_option( 'skills_sub_title', '' );
        $skills_video = the_event_theme_option( 'skills_video', '' );

        ?>
        <div id="skills" class="page-section relative">
            <div class="wrapper">

                <div class="section-content left-align <?php echo empty( $skills_image ) ? 'no-featured-image' : ''; ?>">
                    <?php if ( ! empty( $skills_image ) ) : ?>
                        <div class="skills-background">
                            <img src="<?php echo esc_url( $skills_image ); ?>">
                            <?php if ( ! empty( $skills_video ) ) : ?>
                                <a href="#" class="skills-play-btn">
                                    <?php echo the_event_get_svg( array( 'icon' => 'play' ) ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="skills-video-model">
                            <div class="skills-video">
                                <a href="#" class="skills-close-btn">
                                    <?php echo the_event_get_svg( array( 'icon' => 'close' ) ); ?>
                                </a>
                                <?php echo wp_video_shortcode( array( 'src' => esc_url( $skills_video ), 'height' => 450, 'width' => 800 ) , '' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="skills-container">
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

                        <div class="skills-content column-2 left-align">
                            <?php foreach ( $content_details as $content ) : ?>
                                <article class="hentry">
                                    <div class="post-wrapper">
                                        <?php if ( ! empty( $content['icon'] ) ) : ?>
                                            <div class="skills">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                    <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                                </a>
                                            </div><!-- .skills -->
                                        <?php endif; ?>

                                        <div class="entry-container">
                                            <?php if ( !empty( $content['title'] ) ) : ?>
                                                <header class="entry-header">
                                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                                </header>
                                            <?php endif;

                                            if ( !empty( $content['excerpt'] ) ) : ?>
                                                <div class="entry-content">
                                                    <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                                </div><!-- .entry-content -->
                                            <?php endif; ?>
                                        </div><!-- .entry-container -->

                                    </div><!-- .post-wrapper -->
                                </article>
                            <?php endforeach; ?>
                        </div><!-- .section-content -->
                    </div><!-- .skills-container -->
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #skills-posts -->

    <?php 
    }
endif;
