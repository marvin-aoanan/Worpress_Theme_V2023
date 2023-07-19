<?php
/**
 * Displays header site logo
 *
 * @package WordPress
 * @subpackage Cybro_Solutions_Theme
 * @since Cybro Solutions Theme 2.0.23
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', false ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<div class="site-branding">

	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( $description && true === get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
		<p class="site-description m-0 p-0">
			<?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</p>
	<?php endif; ?>
</div><!-- .site-branding -->
