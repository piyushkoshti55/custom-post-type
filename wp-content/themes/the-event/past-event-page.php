<?php
/*
Template Name: Past events
*/
get_header();
?>

<div class="single-template-wrapper wrapper page-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
			<?php

			$today = date('Y-m-d');
			//echo $today;

			$args = array(
			'post_type'		 => 'event',
			'posts_per_page' => -1,
			'meta_key' 		 => 'start_date',
			'orderby'  		 => 'meta_value',
			'order'			 => 'ASC',
			'meta_query'	 => array(
				array(
				'key' 		=> 'start_date',
				'value' 	=> $today,
				'type' 		=> 'DATE',
				'compare' 	=> '<',
				)
				)
			);

				$query = new WP_Query($args);

				while ( $query->have_posts() ) {
   				 $query->the_post();
    			?>
    <div class="entry-content">
        <h2><?php the_title(); ?></h2>
        <p><?php echo wp_trim_words(get_the_content(), 38); ?></p>
         <span><b>Start Date: </b><?php echo the_field('start_date'); ?></b></span> <br/>
           <span><b>End Date: </b><?php echo the_field('end_date'); ?></b></span>
    </div>
    <?php
}			?>


		</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php get_footer();

?> 
