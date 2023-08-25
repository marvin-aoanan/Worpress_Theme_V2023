<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://www.cybroservices.com
 *
 * @package WordPress
 * @subpackage Cybro_Services_Theme
 * @since Cybro Services 2.0.23
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php echo "data-bs-theme=" . of_get_option("theme"); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<?php get_template_part('parts/body/body-options'); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php
			/* translators: Hidden accessibility text. */
			esc_html_e('Skip to content', 'cybroservices');
			?>
		</a>

		<?php get_template_part('parts/header/header-options'); ?>
		<?php get_template_part('parts/navbar/navbar-options'); ?>

		<main id="main" class="site-main">