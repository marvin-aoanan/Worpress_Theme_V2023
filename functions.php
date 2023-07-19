<?php

/* Enqueu Bootsrap CSS */
function enqueue_bootstrap() {
   wp_enqueue_style("bootstrapCss", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css");
   wp_enqueue_style("bootstrapIcons", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
   wp_enqueue_script("bootstrapJs", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js");
 }
add_action("wp_enqueue_scripts", "enqueue_bootstrap");

// enqueue custom.js
function enqueue_custom_js() {
    wp_enqueue_script("custom-js", get_template_directory_uri() . "/js/custom.js", array("jquery"), "1.0", true);
}
add_action("wp_enqueue_scripts", "enqueue_custom_js");

/* enqueue custom.css */
function enqueue_custom_css() {
	wp_enqueue_style("theme-x", get_bloginfo("stylesheet_directory") . "/framework/css/theme_x.css");
}
add_action("wp_enqueue_scripts", "enqueue_custom_css");

/* ----------------------------------------------------- */
/* Include Theme Options Framework */
/* ----------------------------------------------------- */

if ( !function_exists( "optionsframework_init" ) ) {

	/* Set the file path based on whether we"re in a child theme or parent theme */
	
	if ( STYLESHEETPATH == TEMPLATEPATH ) {
		define("OPTIONS_FRAMEWORK_URL", TEMPLATEPATH . "/admin/");
		define("OPTIONS_FRAMEWORK_DIRECTORY", get_bloginfo("template_directory") . "/admin/");
	} else {
		define("OPTIONS_FRAMEWORK_URL", TEMPLATEPATH . "/admin/");
		define("OPTIONS_FRAMEWORK_DIRECTORY", get_bloginfo("stylesheet_directory") . "/admin/");
	}
	
	require_once (OPTIONS_FRAMEWORK_URL . "options-framework.php");
}

/*
* Add support for core custom logo.
*
* @link https://codex.wordpress.org/Theme_Logo
*/
$logo_width  = 300;
$logo_height = 100;

add_theme_support(
"custom-logo",
array(
   "height"               => $logo_height,
   "width"                => $logo_width,
   "flex-width"           => true,
   "flex-height"          => true,
   "unlink-homepage-logo" => true,
)
);

/* ----------------------------------------------------- */
/* EOF */
/* ----------------------------------------------------- */