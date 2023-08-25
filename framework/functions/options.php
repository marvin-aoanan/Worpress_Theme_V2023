<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 * This is an example of how to override a default filter
 * for 'textarea' sanitization and $allowedposttags + embed and script.
 */
add_action('admin_init', 'optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
	remove_filter('of_sanitize_textarea', 'of_sanitize_textarea');
	add_filter('of_sanitize_textarea', 'custom_sanitize_textarea');
}
function custom_sanitize_textarea($input) {
	global $allowedposttags;
	$custom_allowedtags["embed"] = array(
		"src" => array(),
		"type" => array(),
		"allowfullscreen" => array(),
		"allowscriptaccess" => array(),
		"height" => array(),
		"width" => array()
	);
	$custom_allowedtags["script"] = array();
	$custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	$output = wp_kses($input, $custom_allowedtags);
	return $output;
}

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet
	$themename = get_option('stylesheet');
	$themename = preg_replace("/\W/", "_", strtolower($themename));

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	$fontfamily_array = [
		"" => "Select font-family",
		"'Big Shoulders Display', cursive" => "'Big Shoulders Display', cursive",
		"'Roboto', sans-serif;" => "'Roboto', sans-serif;"
	];
	$bgrepeat_array = [
		'repeat' => __('repeat', 'options_framework_theme'),
		'repeat-x' => __('repeat-x', 'options_framework_theme'),
		'repeat-y' => __('repeat-y', 'options_framework_theme'),
		'no-repeat' => __('no-repeat', 'options_framework_theme')
	];
	$bgposition_array = [
		'top left' => __('top left', 'options_framework_theme'),
		'top center' => __('top center', 'options_framework_theme'),
		'top right' => __('top right', 'options_framework_theme'),
		'center center' => __('center center', 'options_framework_theme'),
		'bottom left' => __('bottom left', 'options_framework_theme'),
		'bottom center' => __('bottom center', 'options_framework_theme'),
		'bottom right' => __('bottom right', 'options_framework_theme')
	];

	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');

	$options = array();
	$image_path = get_bloginfo('template_directory') . "/framework/images/";

	/* ----------------------------------------------------- */
	/* Theme Options */
	/* ----------------------------------------------------- */
	$options[] = array(
		"name" => "Theme",
		"type" => "heading",
	);
	$options[] = array(
		"name" => "Preset Global Theme / Colors",
		"desc" => "Choose preset theme here or customize. (This will apply globally!)",
		"id" => "theme",
		"type" => "radio",
		"options" => array(
			"light" => "light",
			"dark" => "dark",
			"custom-x" => "custom-x",
		),
		"std" => ""
	);

	/* ----------------------------------------------------- */
	/* Typography Options */
	/* ----------------------------------------------------- */
	$options[] = array(
		"name" => "Typography",
		"type" => "heading",
	);
	$options[] = array(
		"name" => "Custom Global Typography",
		"desc" => "Enable custom typography. (This will apply globally!)",
		"id" => "enable_custom_typography",
		"type" => "checkbox",
		"std" => "0"
	);
	$options[] = array(
		"name" => "Body Font Family",
		"desc" => "Select body font-family",
		"id" => "body_font_family_select",
		"type" => "select",
		"options" => $fontfamily_array,
		"std" => "",
	);

	$options[] = array(
		"name" => "Heading Font Family",
		"desc" => "Select heading font-family. This will apply to H1, H2, H3, H4, H5, H6.",
		"id" => "headings_font_family_select",
		"type" => "select",
		"options" => $fontfamily_array,
		"std" => "",
	);
	$options[] = array(
		"name" => "Paragraph Font Family",
		"desc" => "Select paragraph font-family",
		"id" => "p_font_family_select",
		"type" => "select",
		"options" => $fontfamily_array,
		"std" => "",
	);

	/* ----------------------------------------------------- */
	/* Body Options */
	/* ----------------------------------------------------- */
	$options[] = array(
		"name" => "Body",
		"type" => "heading"
	);
	$options[] = array(
		"name" => "Custom Body Background and Color",
		"desc" => "Enable custom body background. (This will apply globally!)",
		"id" => "enable_custom_body",
		"type" => "checkbox",
		"std" => "0"
	);
	$options[] = array(
		"name" => "Custom Body Text Color",
		"desc" => "Set custom body text color.",
		"id" => "body_text_color",
		"type" => "color",
		"std" => "#ffffff",
	);
	$options[] = array(
		"name" => "Choose Type of Custom Background",
		"desc" => "Select which background you want to use as default body background",
		"id" => "background_type",
		"type" => "radio",
		"options" => array(
			"0" => "Solid color",
			"1" => "Gradient color",
			"2" => "Background image",
			"3" => "None"
		),
		"std" => "0",
	);
	$options[] = array(
		"name" => "Custom Body Background Color",
		"desc" => "Set custom body background color.",
		"id" => "body_bg_color",
		"type" => "color",
		"std" => "#444444"
	);
	$options[] = array(
		"name" => "Custom Body Background Gradient",
		"desc" => "Set custom body background gradient. Note: You may generate your gradient color <a target='_blank' href='https://cssgradient.io/' >here</a>.",
		"id" => "body_bg_gradient",
		"type" => "gradient",
		"std" => "linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%)"
	);
	// Background Image Upload option
	$options[] = array(
		"name" => "Default Background Image",
		"desc" => "Upload custom background image or select from Media Library",
		"id" => "bgimage_upload",
		"type" => "upload"
	);
	$options[] = array(
		"name" => "Background Repeat / Stretch",
		"desc" => "Set background image repeat. (This option only applies to background image if enabled.)",
		"id" => "bgrepeat_select",
		"type" => "select",
		"options" => $bgrepeat_array,
		"std" => "no-repeat"
	);
	$options[] = array(
		"name" => "Background Attachement",
		"desc" => "Set background image attachement. (This option only applies to background image if enabled.)",
		"id" => "bgattachement_select",
		"type" => "select",
		"options" => array(
			'scroll' => __('scroll', 'options_framework_theme'),
			'fixed' => __('fixed', 'options_framework_theme')
		),
		"std" => "scroll"
	);
	$options[] = array(
		"name" => "Background Position (if repeated)",
		"desc" => "Set background image position. (This option only applies to background image if enabled.)",
		"id" => "bgposition_select",
		"type" => "select",
		"options" => $bgposition_array,
		"std" => "top center"
	);
	$options[] = array(
		"name" => "Background Size",
		"desc" => "Set background image size. Learn how to specify the background size <a href='https://developer.mozilla.org/en-US/docs/Web/CSS/background-size'>here</a>. (This option only applies to background image if enabled.)",
		"id" => "bgimage_size",
		"type" => "text",
		"std" => "cover"
	);

	/* ----------------------------------------------------- */
	/* Header Options */
	/* ----------------------------------------------------- */
	$options[] = array(
		"name" => "Header",
		"type" => "heading",
	);
	$options[] = array(
		"name" => "Header layout",
		"desc" => "Choose your header layout showing site's title, tagline, logo and cta buttons.
			You can change your site's title, tagline, upload logo via <b>'Appearance > Customize > Site Identity'</b>. ",
		"id" => "header_type",
		"type" => "images",
		"options" => array(
			"0" => $image_path . "header_0.png",
			"1" => $image_path . "header_1.png",
			"2" => $image_path . "header_2.png",
			"3" => $image_path . "header_3.png"
		),
		"std" => "0"
	);
	$options[] = array(
		"name" => "Custom Header theme",
		"desc" => "Enable custom header background and color.",
		"id" => "enable_custom_header",
		"type" => "checkbox",
		"std" => "0"
	);
	$options[] = array(
		"name" => "Custom Header Color",
		"desc" => "Set custom header color.",
		"id" => "custom_header_color",
		"type" => "color",
		"std" => "#ffffff",
	);
	$options[] = array(
		"name" => "Custom Header Background Color",
		"desc" => "Set custom header background color.",
		"id" => "custom_header_bg_color",
		"type" => "color",
		"std" => "#000000",
	);
	$options[] = array(
		"name" => "Custom Header Background Gradient",
		"desc" => "Set custom header background gradient. Note: You may generate your gradient color <a target='_blank' href='https://cssgradient.io/' >here</a>.",
		"id" => "custom_header_bg_gradient",
		"type" => "gradient",
		"std" => "linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(70,0,255,1) 100%)"
	);

	/* ----------------------------------------------------- */
	/* Navbar Options */
	/* ----------------------------------------------------- */
	$options[] = array(
		"name" => "Navbar",
		"type" => "heading",
	);
	$options[] = array(
		"name" => "Navbar layout",
		"desc" => "Choose your navbar layout.",
		"id" => "navbar_type",
		"type" => "images",
		"options" => array(
			"expand-center" => $image_path . "nav_center.png",
			"expand" => $image_path . "nav_expand.png",
			"expand-md" => $image_path . "nav_expand_md.png",
			"expand-no" => $image_path . "nav_no_expand.png",
		),
		"std" => "expand-md"
	);
	$options[] = array(
		"name" => "Custom Navbar theme",
		"desc" => "Enable custom navbar background and color.",
		"id" => "enable_custom_navbar",
		"type" => "checkbox",
		"std" => "0"
	);
	$options[] = array(
		"name" => "Custom Navbar Color",
		"desc" => "Set custom navbar color.",
		"id" => "custom_navbar_color",
		"type" => "color",
		"std" => "#ffffff",
	);
	$options[] = array(
		"name" => "Custom Navbar Background Color",
		"desc" => "Set custom navbar background color.",
		"id" => "custom_navbar_bg_color",
		"type" => "color",
		"std" => "#444444",
	);
	$options[] = array(
		"name" => "Custom Navbar Background Gradient",
		"desc" => "Set custom navbar background gradient. Note: You may generate your gradient color <a target='_blank' href='https://cssgradient.io/' >here</a>.",
		"id" => "custom_navbar_bg_gradient",
		"type" => "gradient",
		"std" => "linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(70,0,255,1) 100%)"
	);

	/* ----------------------------------------------------- */
	/* Footer Options */
	/* ----------------------------------------------------- */
	$options[] = array(
		"name" => "Footer",
		"type" => "heading"
	);
	$options[] = array(
		"name" => "Custom Footer theme",
		"desc" => "Enable custom footer background and color.",
		"id" => "enable_custom_footer",
		"type" => "checkbox",
		"std" => "0"
	);
	$options[] = array(
		"name" => "Custom Footer Color",
		"desc" => "Set custom footer color.",
		"id" => "custom_footer_color",
		"type" => "color",
		"std" => "#ffffff",
	);
	$options[] = array(
		"name" => "Custom Footer Background Color",
		"desc" => "Set custom footer background color.",
		"id" => "custom_footer_bg_color",
		"type" => "color",
		"std" => "#444444",
	);
	$options[] = array(
		"name" => "Custom Footer Background Gradient",
		"desc" => "Set custom footer background gradient. Note: You may generate your gradient color <a target='_blank' href='https://cssgradient.io/' >here</a>.",
		"id" => "custom_footer_bg_gradient",
		"type" => "gradient",
		"std" => "linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(70,0,255,1) 100%)"
	);

	/* ----------------------------------------------------- */
	/* EOF */
	/* ----------------------------------------------------- */

	return $options;
}
