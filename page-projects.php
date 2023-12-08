<?php
/*
Template Name: Projects
*/
?>
<?php 

get_header();

$field_group = acf_get_fields('group_65704cbe24ea4'); // get group slug

$meta = $field_group[0];

$field = get_field('logo');

print_r($meta);


?>
<div>Logo: <?php the_field('logo'); ?></div>
<div>Title: <?php the_field('title'); ?></div>



<div class="heading heading-title text-center py-4">
	<h4>Projects</h4>
	<h2>We Focus On Driving Measurable Results</h2>
	<a href="/contact-us/" class="btn btn-warning my-4">Request a Quote</a>
</div>

<div id="posts" class="posts projects">
	<?php $args = array('post_type' => 'project', 'posts_per_page' => 12);
	$loop = new WP_Query($args);
	while ($loop->have_posts()) : $loop->the_post(); ?>
		<div class="project-list project-cover">
			<div class="cover-image"><?php the_post_thumbnail(); ?></div>
			<div class="cover-info">
				<div class="project_logo"><?php //the_project_logo(); ?></div>
				<div>Logo: <?php the_field('logo', the_ID(), true); ?></div>
				<div>Title: <?php the_field('title', the_ID(), true); ?></div>
				<div class="project_excerpt"><?php the_excerpt(); ?></div>
				<div class="project_short_desc">
					<a class="btn btn-lg btn-outline-light" href="<?php the_permalink() ?>">View Project Details <i class="fa-solid fa-circle-chevron-right"></i></a>
				</div>
			</div>
		</div>

	<?php endwhile; ?>
</div>



<?php get_footer(); ?>