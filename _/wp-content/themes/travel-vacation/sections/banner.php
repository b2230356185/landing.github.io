<?php
if ( ! get_theme_mod( 'travel_vacation_enable_banner_section', true ) ) {
	return;
}

$travel_vacation_slider_content_ids  = array();
$travel_vacation_slider_content_type = get_theme_mod( 'travel_vacation_banner_slider_content_type', 'post' );

for ( $travel_vacation_i = 1; $travel_vacation_i <= 3; $travel_vacation_i++ ) {
	$travel_vacation_slider_content_ids[] = get_theme_mod( 'travel_vacation_banner_slider_content_' . $travel_vacation_slider_content_type . '_' . $travel_vacation_i );
}

// Get the category for the banner slider from theme mods or a default category
$travel_vacation_banner_slider_category = get_theme_mod('travel_vacation_banner_slider_category', 'slider');

// Modify query to fetch posts from a specific category
$travel_vacation_banner_slider_args = array(
    'post_type'           => $travel_vacation_slider_content_type,
    'post__in'            => array_filter( $travel_vacation_slider_content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint(3),
    'ignore_sticky_posts' => true,
);

// Apply category filter only if content type is 'post'
if ( 'post' === $travel_vacation_slider_content_type && ! empty( $travel_vacation_banner_slider_category ) ) {
    $travel_vacation_banner_slider_args['category_name'] = $travel_vacation_banner_slider_category;
}

$travel_vacation_banner_slider_args = apply_filters( 'travel_vacation_banner_section_args', $travel_vacation_banner_slider_args );

travel_vacation_render_banner_section( $travel_vacation_banner_slider_args );

/**
 * Render Banner Section.
 */
function travel_vacation_render_banner_section( $travel_vacation_banner_slider_args ) {     ?>

	<section id="travel_vacation_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			travel_vacation_section_link( 'travel_vacation_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$travel_vacation_query = new WP_Query( $travel_vacation_banner_slider_args );
			if ( $travel_vacation_query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider travel-vacation-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php
					$travel_vacation_i = 1;
					while ( $travel_vacation_query->have_posts() ) :
						$travel_vacation_query->the_post();
						$travel_vacation_button_label = get_theme_mod( 'travel_vacation_banner_button_label_' . $travel_vacation_i);
						$travel_vacation_button_link  = get_theme_mod( 'travel_vacation_banner_button_link_' . $travel_vacation_i);
						$travel_vacation_button_link  = ! empty( $travel_vacation_button_link ) ? $travel_vacation_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-img">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="banner-caption">
									<div class="asterthemes-wrapper">
										<div class="banner-catption-wrapper">
											<h1 class="banner-caption-title">
												<?php the_title(); ?>
											</h1>
											<div class="mag-post-excerpt">
												<?php the_excerpt(); ?>
											</div>
											<?php if ( ! empty( $travel_vacation_button_label ) ) { ?>
												<div class="banner-slider-btn">
													<a href="<?php echo esc_url( $travel_vacation_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $travel_vacation_button_label ); ?></a>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$travel_vacation_i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}