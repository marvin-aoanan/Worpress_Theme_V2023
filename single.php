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
?>
<?php get_header(); ?>

<div id="horizontal_ads_top" class="horizontal_ads container">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Horizontal Ads Top')); ?>
</div>

<div id="page" class="container-fluid">
	<div class="formatted">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div <?php post_class('single-post') ?> id="post-<?php the_ID(); ?>">

						<h2><span class="glyphicon glyphicon-pencil"></span> <span><?php the_title(); ?></span></h2>
						<?php if (get_post_meta(get_the_ID(), 'minti_subtitle', true)) { ?>
							<h4><?php echo get_post_meta(get_the_ID(), 'minti_subtitle', true); ?></h4>
						<?php } ?>

						<div class="meta">
							<small class="date-time">
								<?php
								$timestamp = get_the_date('M d');
								echo $timestamp;
								$reading_time = get_reading_time(get_the_content(), 200);
								echo ' • ' . $reading_time . 'm read time';
								?>
							</small>
							<small>
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
								<?php the_category(', ') ?> • <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
								<?php the_author_posts_link(); ?>
							</small>
							
						</div>

						<?php if (has_post_thumbnail()) { ?>
							<div class="big-post-thumb"> <?php //the_post_thumbnail('single-thumb'); ?> </div>
						<?php } ?>

						<div class="entry">
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						</div>

						<div class="meta-tags">
							<?php the_tags('', '', ''); ?>
						</div>
					</div>
					<div id="comments-section" class="comments-section">
						<?php comments_template(); ?>
					</div>

			<?php endwhile;
			endif; ?>
	</div>
</div>

<?php get_footer(); ?>