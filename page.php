<?php
/**
 * The template for displaying all page posts
 *
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'parts/content/content-carousel' );
	get_template_part( 'parts/content/content-hero' );
	get_template_part( 'parts/content/content-cards' );
	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
