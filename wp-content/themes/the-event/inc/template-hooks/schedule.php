<?php
/**
 * Schedule hook
 *
 * @package the_event
 */

if ( ! function_exists( 'the_event_add_schedule_section' ) ) :
    /**
    * Add schedule section
    *
    *@since The Event 1.0.0
    */
    function the_event_add_schedule_section() {

        // Check if schedule is enabled on frontpage
        $schedule_enable = apply_filters( 'the_event_section_status', 'enable_schedule', '' );

        if ( ! $schedule_enable )
            return false;

        // Get schedule section details
        $section_details = array();
        $section_details = apply_filters( 'the_event_filter_schedule_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render schedule section now.
        the_event_render_schedule_section( $section_details );
    }
endif;

if ( ! function_exists( 'the_event_get_schedule_section_details' ) ) :
    /**
    * schedule section details.
    *
    * @since The Event 1.0.0
    * @param array $input schedule section details.
    */
    function the_event_get_schedule_section_details( $input ) {

        $content = array();
        $page_ids = array();
        $subtitle = array();

        for ( $i = 1; $i <= 3; $i++ )  :
            $page_id = the_event_theme_option( 'schedule_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $subtitle[] = the_event_theme_option( 'schedule_content_subtitle_' . $i );
            endif;
        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['sub_title'] = ! empty( $subtitle[ $i ] ) ? $subtitle[ $i ] : '';
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();

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
// schedule section content details.
add_filter( 'the_event_filter_schedule_section_details', 'the_event_get_schedule_section_details' );


if ( ! function_exists( 'the_event_render_schedule_section' ) ) :
  /**
   * Start schedule section
   *
   * @return string schedule content
   * @since The Event 1.0.0
   *
   */
   function the_event_render_schedule_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = the_event_theme_option( 'schedule_title', '' );
        $sub_title = the_event_theme_option( 'schedule_sub_title', '' );
        ?>
    	<div class="schedule-section page-section relative">
            <div class="wrapper">
                <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $sub_title ) ) : ?>
                            <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif;

                        if ( ! empty( $title ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content">
                    <div class="schedule-tab">
                        <ul>
                            <?php foreach ( $content_details as $key => $content ) : ?>
                                <li>
                                    <h5>
                                        <a href="#" class="tab-heading <?php echo ( 0 == $key ) ? 'active' : ''; ?>" data-tab="tab-<?php echo absint( $content['id'] ); ?>">
                                            <?php echo esc_html( $content['title'] ); ?>
                                            <span><?php echo esc_html( $content['sub_title'] ); ?></span>
                                        </a>
                                    </h5>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php foreach ( $content_details as $key => $content ) : ?>
                        <div class="tab-content <?php echo ( 0 == $key ) ? 'active' : ''; ?> tab-<?php echo absint( $content['id'] ); ?>">
                            <?php 
                                $full_content = apply_filters('the_content', get_post_field( 'post_content', $content['id'] ) ); 
                                $full_content = str_replace(']]>', ']]&gt;', $full_content);
                                echo $full_content;
                            ?>
                        </div><!-- .entry-content -->
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
    <?php 
    }
endif;