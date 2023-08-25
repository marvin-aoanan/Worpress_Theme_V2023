<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="heading-title">
	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<small class="date-time">
		<?php
		$timestamp = get_the_date('M d');
		echo $timestamp;
		$reading_time = get_reading_time(get_the_content(), 200);
		echo ' • ' . $reading_time . 'm read time';
		?>
	</small>
	</div>
	<div class="entry-content">
	<a href="<?php the_permalink(); ?>">
		<?php
		if (has_post_thumbnail()) {
			the_post_thumbnail('thumbnail'); // Sizes: 'medium', 'large', or use 'full' for the original size.
		}
		?>
	</a>
		<div class="entry-excerpt">
			<?php
			$excerpt = '<p>'.get_the_excerpt().'</p>';
			$excerpt_more = '<a class="read-more btn btn-outline-info" href="' . esc_url(get_permalink()) . '">Read more</a>';
			echo wp_kses_post($excerpt . $excerpt_more); // Use wp_kses_post() to properly display the excerpt without HTML tags.
			?>

		</div>
	</div><!-- .entry-content -->
</article><!-- #post-${ID} -->