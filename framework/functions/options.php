<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */
 
 /*
 * This is an example of how to override a default filter
 * for 'textarea' sanitization and $allowedposttags + embed and script.
 */
add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
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
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}

function optionsframework_option_name() {

// This gets the theme name from the stylesheet
$themename = get_option( 'stylesheet' );
$themename = preg_replace("/\W/", "_", strtolower($themename) );

$optionsframework_settings = get_option( 'optionsframework' );
$optionsframework_settings['id'] = $themename;
update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

	$bgrepeat_array = array(
			'stretch' => __('stretch', 'options_framework_theme'),
			'repeat' => __('repeat', 'options_framework_theme'),
			'repeat-x' => __('repeat-x', 'options_framework_theme'),
			'repeat-y' => __('repeat-y', 'options_framework_theme'),
			'no-repeat' => __('no-repeat', 'options_framework_theme')
		);
	$bgposition_array = array(
			'top left' => __('top left', 'options_framework_theme'),
			'top center' => __('top center', 'options_framework_theme'),
			'top right' => __('top right', 'options_framework_theme'),
			'center center' => __('center center', 'options_framework_theme'),
			'bottom left' => __('bottom left', 'options_framework_theme'),
			'bottom center' => __('bottom center', 'options_framework_theme'),
			'bottom right' => __('bottom right', 'options_framework_theme')
		);
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	$options = array();

				
/* ----------------------------------------------------- */
/* General Settings */
/* ----------------------------------------------------- */
	/*					
	$options[] = array( "name" => "General Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Show Notification Bar",
						"desc" => "Notification Bar (Sliding Bar above Header)",
						"id" => "infobar_checkbox",
						"std" => "0", // [0 = uncheck | 1 =  checked]
						"type" => "checkbox"); 
						
	$options[] = array( "name" => "Notification Bar visible on Pageload?",
						"desc" => "Check if Notification Bar should be visible on Pageload. <br />Make sure to delete Cookies before testing, because the Notification Bar uses cookies - so if you see it closed even though you checked the box just delete cookies and reload the Page - also the other way round.",
						"id" => "infobar_visible",
						"std" => "1", // [0 = uncheck | 1 =  checked]
						"type" => "checkbox"); 
	
	$options[] = array( "name" => "Notification Bar Text (above Header)",
						"desc" => "Notification Bar descriptive Text",
						"id" => "infobar_text",
						"std" => "This is an incredibly powerful &amp; fully responsive WordPress Theme. Grab your copy on <a href='http://cybrosolutions.net' target='_blank'>Cybro Solutions</a>",
						"type" => "textarea"); 
	
	$options[] = array( "name" => "Show Latestwork on Home Page",
						"desc" => "Show Latest Work on Home Page",
						"id" => "latestwork_checkbox",
						"std" => "1", // [0 = uncheck | 1 =  checked]
						"type" => "checkbox"); 
						
	$options[] = array( "name" => "Latest Work Text",
						"desc" => "Descriptive Text of Latest Work on Home Page",
						"id" => "latestwork_text",
						"std" => "Maecenas a mi nibh, eu euismod orci. Vivamus viverra lacus vitae tortor molestie malesuada.<br /><br /><a href='#' class='btn'>Show all Works</a>",
						"type" => "textarea");
						
	$options[] = array( "name" => "Show Latest Posts from Blog on Home Page",
						"desc" => "Show Latest Posts from Blog on Home Page",
						"id" => "latestposts_checkbox",
						"std" => "1", // [0 = uncheck | 1 =  checked]
						"type" => "checkbox"); 
						
	$options[] = array( "name" => "Latest Posts Text",
						"desc" => "Descriptive Text of Latest Posts on Home Page",
						"id" => "latestposts_text",
						"std" => "Maecenas a mi nibh, eu euismod orci. Vivamus viverra lacus vitae tortor molestie malesuada.<br /><br /><a href='#' class='btn'>Show all Posts</a>",
						"type" => "textarea");
						
	$options[] = array( "name" => "Show Twitter-Feed above Footer",
						"desc" => "Show Twitter-Feed above Footer (configure your Twitter Name in Social Media)",
						"id" => "twitterfooter_checkbox",
						"std" => "1", // [0 = uncheck | 1 =  checked]
						"type" => "checkbox");
	
	$options[] = array( "name" => "Contact E-Mail",
						"desc" => "Contact Form E-Mail Address",
						"id" => "contact_email",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "Contact Number",
						"desc" => "Contact Form Number. Can also be appear in the header.",
						"id" => "contact_number",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Contact Information",
						"desc" => "Insert your Contact Information here. This will be display beside the contact form.",
						"id" => "contact_information",
						"std" => "Contact Information
								Cybro Solutions<br />
								Manila, Philippines 1218 <br />
								<br /><br />

								Phone: +63 792 2048<br />
								Email: info@cybrosolutions.net<br />
								Web: http://cybrosolutions.net<br />",
						"type" => "textarea");
	
	$options[] = array( "name" => "Google Analytics Code",
						"desc" => "Insert your Google Analytics Code",
						"id" => "analytics_code",
						"std" => "",
						"type" => "textarea");														
*/
				
/* ----------------------------------------------------- */
/* Theme / Colors */
/* ----------------------------------------------------- */
					
	$options[] = array( 
		"name" => "Color",
		"type" => "heading"
	);
						
	$options[] = array(
		"name" => "Primary Color",
		"desc" => "Set primary color.",
		"id" => "primary_colorpicker",
		"std" => "#0d6efd",
		"type" => "color"
	);
	
	$options[] = array(
		"name" => "Secondary Color",
		"desc" => "Set secondary color.",
		"id" => "secondary_colorpicker",
		"std" => "#6c757d",
		"type" => "color"
	);

	



/* ----------------------------------------------------- */
/* Header Settings */
/* ----------------------------------------------------- */

	
	$options[] = array(
		"name" => "Header Template",
		"type" => "heading",
	);
	$options[] = array(
		"name" => "Header",
		"desc" => "Header template showing site's title, tagline, logo and cta buttons.
				You can change your site's title, tagline, upload logo via <b>'Appearance > Customize > Site Identity'</b>. ",
		"id" => "header",
		"options" => array (
			"0" => get_bloginfo('template_directory') . "/framework/images/header_0.png", 
			"1" => get_bloginfo('template_directory') . "/framework/images/header_1.png",
			"2" => get_bloginfo('template_directory') . "/framework/images/header_2.png",
			"3" => get_bloginfo('template_directory') . "/framework/images/header_3.png"
		),
		"type" => "images",
		"std" => "0"
	);
						
						


/* ----------------------------------------------------- */
/* Footer Settings */
/* ----------------------------------------------------- */
/*
$options[] = array( "name" => "Footer",
						"type" => "heading");
						
	$options[] = array( "name" => "Show Footer Menu",
						"desc" => "Show Footer Bar Menu (Edit your footer menu text and links through Appearance >> Widgets >> Footer Menu)",
						"id" => "footer_menu_checkbox",
						"std" => "1",
						"type" => "checkbox"); 					
	
	$options[] = array( "name" => "Misc",
						"desc" => "You can put some html, text, etc..",
						"id" => "footer_text",
						"std" => "",
						"type" => "textarea");					
	
	$options[] = array( "name" => "Footer Logo",
						"desc" => "Footer Logo",
						"id" => "footerlogo_upload",
						"type" => "upload");		
						
	$options[] = array( "name" => "Copyright Text",
						"desc" => "Descriptive Text (under Footer Logo)",
						"id" => "copyright_text",
						"std" => "This is an incredibly powerful &amp; fully responsive WordPress Theme.",
						"type" => "textarea");
*/

/* ----------------------------------------------------- */
/* Social Media */
/* ----------------------------------------------------- */
/*						
	$options[] = array( "name" => "Social Media",
						"type" => "heading");
	
	$options[] = array( "name" => "Twitter",
						"desc" => "Twitter Username",
						"id" => "twitter_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Facebook",
						"desc" => "Facebook Url",
						"id" => "facebook_url",
						"std" => "",
						"type" => "text");
						
*/						

/* ----------------------------------------------------- */
/* Slider */
/* ----------------------------------------------------- */
/*						
	$options[] = array( "name" => "Slider",
						"type" => "heading");
						
	$options[] = array( "name" => "Use Royal Slider",
						"desc" => "Use Royal Slider as Slider plugin?  Check this to enable Royal Slider",
						"id" => "royalslider_checkbox",
						"std" => "0",
						"type" => "checkbox"); 					
	
	$options[] = array( "name" => "Slide 1",
						"desc" => "Image size should be 940px by 430px.",
						"id" => "slide1_upload",
						"type" => "upload");
	
	$options[] = array( "name" => "Slide 1 Caption",
						"desc" => "Caption for Slide 1. Can put HTML ex: <p></p>",
						"id" => "slide1_caption",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Slide 1 URL",
						"desc" => "URL for Slide 1",
						"id" => "slide1_url",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Slide 2",
						"desc" => "Image size should be 940px by 430px.",
						"id" => "slide2_upload",
						"type" => "upload");
						
	$options[] = array( "name" => "Slide 2 Caption",
						"desc" => "Caption for Slide 2",
						"id" => "slide2_caption",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Slide 2 URL",
						"desc" => "URL for Slide 2",
						"id" => "slide2_url",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Slide 3",
						"desc" => "Image size should be 940px by 430px.",
						"id" => "slide3_upload",
						"type" => "upload");
						
	$options[] = array( "name" => "Slide 3 Caption",
						"desc" => "Caption for Slide 3",
						"id" => "slide3_caption",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Slide 3 URL",
						"desc" => "URL for Slide 3",
						"id" => "slide3_url",
						"std" => "",
						"type" => "text");
*/						

/* ----------------------------------------------------- */
/* Miscellaneous */
/* ----------------------------------------------------- */
/*						
	$options[] = array( "name" => "Miscellaneous",
						"type" => "heading");
	
	$options[] = array( "name" => "Payment Method",
						"desc" => "Upload Paypal logo here if you accept Paypal as payment method.",
						"id"   => "paypal_logo_upload",
						"type" => "upload");
	$options[] = array( 
						"desc" => "Upload Credit Card logo here if you accept Credit Card as payment method.",
						"id"   => "cc_logo_upload",
						"type" => "upload");					
						
	$options[] = array( 
						"desc" => "Upload Bank Logo Here if you accept Bank Deposit as payment method.",
						"id"   => "bank_logo_upload",
						"type" => "upload");
	
	$options[] = array( 
						"desc" => "Upload other Bank Logo Here if you accept some other Bank Deposit as payment method.",
						"id"   => "bank_logo_upload2",
						"type" => "upload");
*/
/* ----------------------------------------------------- */
/* EOF */
/* ----------------------------------------------------- */
									
	return $options;
}