<?php

/**
 * The template for displaying all posts
 *
 * @link https://www.cybroservices.com
 *
 * @package Cybro Services Theme
 * @subpackage Cybro Services Theme v2023
 * @since 2023
 */

get_header();

if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
	<div class="page-heading alignwide">
		<h2 class="page-title"><?php single_post_title(); ?></h2>
	</div><!-- .page-heading -->
<?php endif; ?>
<div id="posts" class="posts articles">
	<?php
	if (have_posts()) {
		// Load posts loop.
		while (have_posts()) {
			the_post();
			get_template_part('parts/content/post/content', get_theme_mod('display_excerpt_or_full_post', 'excerpt'));
		}
	} else {
		// If no content, include the "No posts found" template.
		get_template_part('parts/content/post/content-none');
	}
	
	?>
</div>
<?php include (TEMPLATEPATH . '/framework/functions/nav.php' ); ?>

<?php get_footer(); ?>