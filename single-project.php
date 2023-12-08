<?php

get_header();

$field_group = acf_get_fields('group_65704cbe24ea4'); // get group slug
//var_dump($field_group);
var_dump(get_post_meta(get_the_ID(), 'project_meta_logo', true));

?>

<div>Logo: <img src="<?php the_field('project_meta_logo'); ?>" srcset="<?php the_field('project_meta_logo'); ?>"></div>
<div>Title: <?php the_field('project_meta_title'); ?></div>

<?php get_footer(); ?>