<?php 
		$args = array(
			'post_type'      => 'fwd-testimonial',
			'orderby' => 'rand',
			'posts_per_page' => 1
	);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			while($query ->have_posts()){
				$query ->the_post();
        the_content();
    }
    wp_reset_postdata();
		}
	
		