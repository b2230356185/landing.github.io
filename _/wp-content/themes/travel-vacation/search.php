<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package travel_vacation
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		do_action( 'travel_vacation_posts_pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main>

<?php
if ( travel_vacation_is_sidebar_enabled() ) {
	get_sidebar();
}
get_footer();
