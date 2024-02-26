<?php
/**
 * The template for displaying all pages
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
		get_template_part('template-parts/content', 'page');

		$arg2 = array(
			'post_type' => 'fwd-service',
			'posts_per_page' => 4,
			'orderby' => 'title',
			'order' => 'asc',
		);

		$navquery = new WP_Query($arg2);

		if ($navquery->have_posts()) {
			while ($navquery->have_posts()) {
				$navquery->the_post();
				?>
				<nav>
					<ul>
						<a href="#<?php the_ID(); ?>">
							<li>
								<?php the_title(); ?>
							</li>
						</a>
					</ul>
				</nav>
				<?php
			}
		}
		?>


		<?php


	endwhile; // End of the loop.
	?>

	<!-- sider bar in body example -->
	<!-- <?php get_template_part('template-parts/work', 'categories'); ?> -->

	<?php
	$terms = get_terms(
		array(
			'taxonomy' => 'fwd-service-category',
			'hide_empty' => false,
		)
	);
	if ($terms && !is_wp_error($terms)) {

		foreach ($terms as $term) {
			$args = array(
					'post_type' => 'fwd-service',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => array(
							array(
									'taxonomy' => 'fwd-service-category',
									'field' => 'slug',
									'terms' => $term
							),
					),
			);
			$query = new WP_Query($args);
			echo '<section class="work-section"><h2>' . esc_html__($term->name, 'fwd') . '</h2>';
			// creating our services
			while ($query->have_posts()) {
					$query->the_post();
					?>
					<article id="<?php echo get_the_ID() ?>">
							<h2>
									<?php the_title(); ?>
							</h2>
							<?php
							// ACF form validation
							if (function_exists('get_field')) {
									if (get_field('services')) {
											echo the_field('services');
									}
							}
							?>
							<?php the_excerpt(); ?>
					</article>
					<?php
			}
			wp_reset_postdata();
			// Use $term->slug in your tax_query
			// Use $term->name to organize the posts
		}
	} 
	echo "</section>";
	?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
