<?php

/**
 * Functions and definitions
 *
 * @link https://www.cybroservices.com
 *
 * @package Cybro Services Theme v2023
 * @subpackage Cybro_Services_Theme_v2023
 * @since 2023
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('cstheme_2023_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function cstheme_2023_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'cstheme_2023' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('cstheme_2023', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');


		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ($is_IE) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style($editor_stylesheet_path);

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__('Extra small', 'cstheme_2023'),
					'shortName' => esc_html_x('XS', 'Font size', 'cstheme_2023'),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__('Small', 'cstheme_2023'),
					'shortName' => esc_html_x('S', 'Font size', 'cstheme_2023'),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__('Normal', 'cstheme_2023'),
					'shortName' => esc_html_x('M', 'Font size', 'cstheme_2023'),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__('Large', 'cstheme_2023'),
					'shortName' => esc_html_x('L', 'Font size', 'cstheme_2023'),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__('Extra large', 'cstheme_2023'),
					'shortName' => esc_html_x('XL', 'Font size', 'cstheme_2023'),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__('Huge', 'cstheme_2023'),
					'shortName' => esc_html_x('XXL', 'Font size', 'cstheme_2023'),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__('Gigantic', 'cstheme_2023'),
					'shortName' => esc_html_x('XXXL', 'Font size', 'cstheme_2023'),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__('Black', 'cstheme_2023'),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__('Dark gray', 'cstheme_2023'),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__('Gray', 'cstheme_2023'),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__('Green', 'cstheme_2023'),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__('Blue', 'cstheme_2023'),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__('Purple', 'cstheme_2023'),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__('Red', 'cstheme_2023'),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__('Orange', 'cstheme_2023'),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__('Yellow', 'cstheme_2023'),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__('White', 'cstheme_2023'),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__('Purple to yellow', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to purple', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__('Green to yellow', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to green', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__('Red to yellow', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to red', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__('Purple to red', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__('Red to purple', 'cstheme_2023'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);



		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for experimental link color control.
		add_theme_support('experimental-link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');

		// Remove feed icon link from legacy RSS widget.
		add_filter('rss_widget_feed_link', '__return_empty_string');
	}
}
add_action('after_setup_theme', 'cstheme_2023_setup');






// function get_reading_time($content)
// {
// 	$words_per_minute = 200; // Adjust this value to change the reading speed.

// 	$word_count = str_word_count(strip_tags($content));
// 	$reading_time = ceil($word_count / $words_per_minute);

// 	return $reading_time;
// }


class ReadingTime
{
	public $wordsPerMinute;
	public $content;
	public function __construct($content)
	{
		$this->content =  $content;
		$this->wordsPerMinute = 200;
	}

	public function getReadingTime($content)
	{
		$wordCount = str_word_count(strip_tags($content));
		$readingTime = ceil($wordCount / $this->wordsPerMinute);
		return $readingTime;
	}
}

//$readTime = new ReadingTime(get_the_content());
//add_action('init', [$readTime, 'getReadingTime']);


class My_Custom_Class
{
	public function my_custom_method()
	{
		// Your code goes here
		echo "Hello from my_custom_method!";
	}
}
// Instantiate the class and call the method on the 'wp_footer' action hook
//$custom_class_instance = new My_Custom_Class();
//add_action( 'wp_footer', [$custom_class_instance, 'my_custom_method'] );

// Another sample
class Person
{
	public $name;
	public $age;
	public function __construct($name, $age)
	{
		$this->name = $name;
		$this->age = $age;
		//echo "This is a class.";
	}

	public function getPerson()
	{
		echo $this->name . " " . $this->age;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function setAge($age)
	{
		$this->age = $age;
	}
}

//$person = new Person("Marvin", 40);
//add_action('init', [$person, 'getPerson']);
//add_action('wp_head', [$person, 'getPerson']);
//add_action('the_post', [$person, 'getPerson']);
//add_action('wp_footer', [$person, 'getPerson']);
//add_action('dynamic_sidebar', [$person, 'getPerson']);
//add_action('the_header', [$person, 'getPerson']);

/* Enqueu Bootstrap via CDN */
// function enqueue_bootstrapCDN() {
//    wp_enqueue_style("bootstrapCss", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css");
//    wp_enqueue_style("bootstrapIcons", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
//    wp_enqueue_script("bootstrapJs", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js");
//  }

// Enqueu Bootstrap Local  */
function enqueue_bootstrap()
{
	wp_enqueue_style("bootstrapCss", get_template_directory_uri() . "/framework/vendor/bootstrap-5/css/bootstrap.min.css");
	wp_enqueue_script("bootstrapJs", get_template_directory_uri() . "/framework/vendor/bootstrap-5/js/bootstrap.min.js");
}
add_action("wp_enqueue_scripts", "enqueue_bootstrap");

function enqueue_fontawesome() {
	wp_enqueue_style("fontawesomeCss", get_template_directory_uri() . "/framework/vendor/fontawesome-free-6.4.2-web/css/all.min.css");
	//wp_enqueue_script("fontawesomeJs", get_template_directory_uri() . "/framework/vendor/fontawesome-free-6.4.2-web/js/all.min.js");
}

add_action("wp_enqueue_scripts", "enqueue_fontawesome");

// enqueue custom.js
function enqueue_custom_js()
{
	wp_enqueue_script("custom-js", get_template_directory_uri() . "/framework/js/custom.js", array("jquery"), "1.0", true);
}
add_action("wp_enqueue_scripts", "enqueue_custom_js");

/* enqueue custom.css */
function enqueue_custom_css()
{
	wp_enqueue_style("theme-x", get_bloginfo("stylesheet_directory") . "/framework/css/theme_x.css");
	wp_enqueue_style("cs-styles", get_bloginfo("stylesheet_directory") . "/style.css");
}
add_action("wp_enqueue_scripts", "enqueue_custom_css");

/* ----------------------------------------------------- */
/* Include Theme Options Framework */
/* ----------------------------------------------------- */

if (!function_exists("optionsframework_init")) {

	/* Set the file path based on whether we"re in a child theme or parent theme */

	if (STYLESHEETPATH == TEMPLATEPATH) {
		define("OPTIONS_FRAMEWORK_URL", TEMPLATEPATH . "/admin/");
		define("OPTIONS_FRAMEWORK_DIRECTORY", get_bloginfo("template_directory") . "/admin/");
	} else {
		define("OPTIONS_FRAMEWORK_URL", TEMPLATEPATH . "/admin/");
		define("OPTIONS_FRAMEWORK_DIRECTORY", get_bloginfo("stylesheet_directory") . "/admin/");
	}

	require_once(OPTIONS_FRAMEWORK_URL . "options-framework.php");
}


// Todo: Improve this...
//require_once('custom-nav.php');

/* ----------------------------------------------------- */
/* Registered Menus */
/* ----------------------------------------------------- */
function register_my_menus()
{
	register_nav_menus(array(
		'primary-menu'   => 'Primary Menu',
		'secondary-menu' => 'Secondary Menu',
	));
}
add_action('after_setup_theme', 'register_my_menus');


/**
 * Add custom order column in custom post type 'Service'
 */


// add_action('init', function () {
// 	register_post_type('service_cpt', array(
// 		'labels' => array(
// 			'name' => 'Services',
// 			'singular_name' => 'Service',
// 			'menu_name' => 'Services',
// 			'all_items' => 'All Services',
// 			'edit_item' => 'Edit Service',
// 			'view_item' => 'View Service',
// 			'view_items' => 'View Services',
// 			'add_new_item' => 'Add New Service',
// 			'new_item' => 'New Service',
// 			'parent_item_colon' => 'Parent Service:',
// 			'search_items' => 'Search Services',
// 			'not_found' => 'No services found',
// 			'not_found_in_trash' => 'No services found in Trash',
// 			'archives' => 'Service Archives',
// 			'attributes' => 'Service Attributes',
// 			'insert_into_item' => 'Insert into service',
// 			'uploaded_to_this_item' => 'Uploaded to this service',
// 			'filter_items_list' => 'Filter services list',
// 			'filter_by_date' => 'Filter services by date',
// 			'items_list_navigation' => 'Services list navigation',
// 			'items_list' => 'Services list',
// 			'item_published' => 'Service published.',
// 			'item_published_privately' => 'Service published privately.',
// 			'item_reverted_to_draft' => 'Service reverted to draft.',
// 			'item_scheduled' => 'Service scheduled.',
// 			'item_updated' => 'Service updated.',
// 			'item_link' => 'Service Link',
// 			'item_link_description' => 'A link to a service.',
// 			'order' => 'Order',
// 			'menu_order' => 'Order'
// 		),
// 		'public' => true,
// 		'hierarchical' => true,
// 		'show_in_rest' => true,
// 		'supports' => array(
// 			0 => 'title',
// 			1 => 'editor',
// 			2 => 'thumbnail',
// 			3 => 'menu_order',
// 			4 => 'order'
// 		),
// 		'taxonomies' => array(
// 			0 => 'category',
// 			1 => 'menu_order',
// 			2 => 'order'
// 		),
// 		'delete_with_user' => false,
// 	));
// });

// function custom_post_type_add_menu_order_column($columns) {
//     $columns['menu_order'] = 'Order';
//     return $columns;
// }
// add_filter('manage_service_cpt_posts_columns', 'custom_post_type_add_menu_order_column');


// function custom_post_type_populate_menu_order_column($column, $post_id) {
//     if ($column === 'menu_order') {
//         $menu_order = get_post_field('menu_order', $post_id);
//         echo $menu_order;
//     }
// }
// add_action('manage_service_cpt_posts_custom_column', 'custom_post_type_populate_menu_order_column', 10, 2);


// function custom_post_type_make_menu_order_column_sortable($sortable_columns) {
//     $sortable_columns['menu_order'] = 'menu_order';
//     return $sortable_columns;
// }
// add_filter('manage_edit-service_cpt_sortable_columns', 'custom_post_type_make_menu_order_column_sortable');


// /**
//  * Add custom meta box
//  */

//  function custom_post_type_add_custom_metabox() {
//     add_meta_box(
//         'custom_menu_order_metabox', // Unique ID
//         'Custom Menu Order Metabox', // Title
//         'custom_menu_order_metabox_callback', // Callback function
//         'service_cpt', // Custom post type
//         'side', // Context (normal, advanced, side)
//         'high' // Priority (high, core, default, low)
//     );
// }
// add_action('add_meta_boxes', 'custom_post_type_add_custom_metabox');

// function custom_menu_order_metabox_callback($post) {
//     // Get the existing value of the custom field
//     $custom_field_value = get_post_meta($post->ID, 'custom_field_name', true);

//     // Output the HTML input field
//     echo '<label for="custom_menu_order">Custom Menu Order:</label>';
//     echo '<input type="number" id="custom_menu_order" name="custom_menu_order" value="' . esc_attr($custom_field_value) . '">';
// }

// function custom_post_type_save_custom_field($post_id) {
//     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
//     if (!current_user_can('edit_post', $post_id)) return;

//     // Save the custom field value
//     if (isset($_POST['custom_menu_order'])) {
//         update_post_meta($post_id, 'custom_field_name', sanitize_text_field($_POST['custom_menu_order']));
//     }
// }
// add_action('save_post', 'custom_post_type_save_custom_field');




/* ----------------------------------------------------- */
/* EOF */
/* ----------------------------------------------------- */