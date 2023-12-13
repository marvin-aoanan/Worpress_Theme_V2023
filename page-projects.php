<?php
/*
Template Name: Projects
*/
?>
<?php 

get_header();
$field_group = acf_get_fields('group_65704cbe24ea4'); // get group slug

?>

<div class="heading heading-title text-center py-4">
	<h4>Projects</h4>
	<h2>We Focus On Driving Measurable Results</h2>
	<a href="/contact-us/" class="btn btn-warning my-4">Request a Quote</a>
</div>

<div id="posts" class="posts projects">
	
	<?php $args = array(
		'posts_per_page' => -1,
		'post_type' => 'project', 
		
	);
	$loop = new WP_Query($args);
	
	while ($loop->have_posts()) : $loop->the_post(); ?>
	<?php 
		//var_dump(get_post_meta(get_the_ID(), 'project_meta_logo', true));
		//echo get_post_meta(get_the_ID(), 'project_meta_title', true);
		$media_id = get_post_meta(get_the_ID(), 'project_meta_logo', true); 

		$media_url = wp_get_attachment_url($media_id);
		//echo $media_url;
	?>
	

		<div class="project-list project-cover">
			<div class="cover-image"><?php the_post_thumbnail(); ?></div>
			<div class="cover-info">
				<div class="project_logo"><img src="<?php echo $media_url; ?>" alt=""></div>
				<div class="project_excerpt"><?php the_excerpt(); ?></div>
				<div class="project_short_desc">
					<a class="btn btn-lg btn-outline-light" href="<?php the_permalink() ?>">View Project Details <i class="fa-solid fa-circle-chevron-right"></i></a>
				</div>
			</div>
		</div>

	<?php endwhile; ?>
</div>



<?php get_footer(); ?>