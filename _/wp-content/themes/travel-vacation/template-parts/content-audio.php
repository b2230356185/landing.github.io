<?php

/**
 * Template part for displaying Audio Format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travel_vacation
 */

?>
<?php $travel_vacation_readmore = get_theme_mod( 'travel_vacation_readmore_button_text','Read More');?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
        <?php
			// Get the post ID
			$travel_vacation_post_id = get_the_ID();

			// Check if there are audio embedded in the post content
			$travel_vacation_post = get_post($travel_vacation_post_id);
			$travel_vacation_content = do_shortcode(apply_filters('the_content', $travel_vacation_post->post_content));
			$travel_vacation_embeds = get_media_embedded_in_content($travel_vacation_content);

			if (!empty($travel_vacation_embeds)) {
			    // Loop through embedded media and display only audio
			    foreach ($travel_vacation_embeds as $travel_vacation_embed) {
			        // Check if the embed code contains an audio tag or specific audio providers like SoundCloud
			        if (strpos($travel_vacation_embed, 'audio') !== false || strpos($travel_vacation_embed, 'soundcloud') !== false) {
			            ?>
			            <div class="custom-embedded-audio">
			                <div class="media-container">
			                    <?php echo $travel_vacation_embed; ?>
			                </div>
			                <div class="media-comments">
			                    <?php
			                    // Add your comments section here
			                    comments_template(); // This will include the default WordPress comments template
			                    ?>
			                </div>
			            </div>
			            <?php
			        }
			    }
			}
		?>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php travel_vacation_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
			else :
				if ( get_theme_mod( 'travel_vacation_post_hide_post_heading', true ) ) { 
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			    }
			endif;
			?>
			<div class="mag-post-meta">
				<?php
				travel_vacation_posted_by();
				travel_vacation_posted_on();
				?>
			</div>
			<?php if ( get_theme_mod( 'travel_vacation_post_hide_post_content', true ) ) { ?>
				<div class="mag-post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		    <?php } ?>
			<?php if ( get_theme_mod( 'travel_vacation_post_readmore_button', true ) === true ) : ?>
				<div class="mag-post-read-more">
					<a href="<?php the_permalink(); ?>" class="read-more-button">
						<?php if ( ! empty( $travel_vacation_readmore ) ) { ?> <?php echo esc_html( $travel_vacation_readmore ); ?> <?php } ?>
						<i class="<?php echo esc_attr( get_theme_mod( 'travel_vacation_readmore_btn_icon', 'fas fa-chevron-right' ) ); ?>"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->