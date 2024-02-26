<?php
/**
 * The template for displaying the homepage of the site
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()):
		the_post();	
		?>

		<section class="home-intro">
			<h1><?php the_title(); ?></h1>
			<?php the_post_thumbnail('large');
			if (function_exists('get_field')) {
				if (get_field('top_section')) {
					the_field('top_section');
				}
			}
			?>
		</section>
		<section class="home-work">

			<?php
			$args = array(
				'post_type' => 'fwd-work',
				'posts_per_page' => 4,
				'tax_query' => array(
					array(
						'taxonomy' => 'fwd-featured',
						'field' => 'slug',
						'terms' => 'front-page'
					)
				)
			);

			$query = new WP_Query($args);
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					?>
					<article>
						<a href="<?php the_permalink(); ?>">
							<h3>
								<?php the_title(); ?>
							</h3>
							<?php the_post_thumbnail('medium'); ?>
						</a>
					</article>
					<?php
				}
				wp_reset_postdata();
			}
			?>

		</section>
		<section class="home-work"></section>
		<section class="home-left">
			<?php
			if (function_exists('get_field')) {

				if (get_field('left_section_heading')) {
					echo '<h2>';
					the_field('left_section_heading');
					echo '</h2>';
				}

				if (get_field('left_section_content')) {
					echo '<p>';
					the_field('left_section_content');
					echo '</p>';
				}
			}
			?>
		</section>
		<section class="home-right">
			<?php
			if (function_exists('get_field')) {

				if (get_field('right_section_heading')) {
					echo '<h2>';
					the_field('right_section_heading');
					echo '</h2>';
				}

				if (get_field('right_section_content')) {
					echo '<p>';
					the_field('right_section_content');
					echo '</p>';
				}
			}
			?>
		</section>
		<section class="home-slider">
			<?php
			$args = array(
				'post_type' => 'fwd-testimonial',
				'posts_per_page' => -1
			);

			$query = new WP_Query($args);

			if ( $query->have_posts() ) : ?>
				<div class="swiper">
						<div class="swiper-wrapper">
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
										<div class="swiper-slide">
												<?php the_content(); ?>
										</div>
								<?php endwhile; ?>
						</div>
						<div class="swiper-pagination"></div>
						<button class="swiper-button-prev"></button>
						<button class="swiper-button-next"></button>
						
				</div>
				<?php
				wp_reset_postdata();
		endif;
		?>
		</section>
		<section class="home-blog">
			<h2>
				<?php esc_html_e('Latest Blog Posts', 'fwd'); ?>
			</h2>
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4
			);
			$blog_query = new WP_Query($args);
			if ($blog_query->have_posts()) {
				while ($blog_query->have_posts()) {
					$blog_query->the_post();
					?>
					<article>
						<h3>
							<a class="feature-image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<?php
								the_post_thumbnail(
									'feature-image'
								);
								?>
							</a>
							<a href="<?php the_permalink() ?>">
								<?php the_title(); ?>
							</a>
							<?php echo get_the_date(); ?>
						</h3>
					</article>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</section>
		<?php
	endwhile; // End of the loop.
	?>
<button id="scroll-top" class="scroll-top">
	<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
		<path d="M23.677 18.52c.914 1.523-.183 3.472-1.967 3.472h-19.414c-1.784 0-2.881-1.949-1.967-3.472l9.709-16.18c.891-1.483 3.041-1.48 3.93 0l9.709 16.18z"/>
	</svg>
	<span class="screen-reader-text">Scroll To Top</span>
</button>
	</main><!-- #primary -->
</main><!-- #primary -->

<?php
get_footer();
