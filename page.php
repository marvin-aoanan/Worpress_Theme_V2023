<?php
/**
 * The template for displaying all page content
 *
 * @link https://www.cybroservices.com
 *
 * @package Cybro Services Theme
 * @subpackage Cybro Services Theme v2023
 * @since 2023
 */

get_header();

/* Start the Loop */
if (is_home() || is_front_page()) {
	get_template_part( 'parts/content/content-home' );
} else {
	while ( have_posts() ) :
		the_post();
		get_template_part( 'parts/content/content-page' );
	
		// If comments are open or there is at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile; // End of the loop.
}
get_footer();
