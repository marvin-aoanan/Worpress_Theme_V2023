<?php

/* ----------------------------------------------------- */
/* Hero Banner Custom Post Type */
/* ----------------------------------------------------- */

define( 'TEMPLATE_URL', get_bloginfo('template_directory') . '/framework/images/' );

add_action( 'init', 'register_hero_cpt' );

function register_hero_cpt() {

    $labels = array( 
        'name' => _x( 'Hero Banners', 'hero_banner' ),
        'singular_name' => _x( 'Hero Banner', 'hero_banner' ),
        'add_new' => _x( 'Add New', 'hero_banner' ),
        'add_new_item' => _x( 'Add New Hero Banner', 'hero_banner' ),
        'edit_item' => _x( 'Edit Hero Banner', 'hero_banner' ),
        'new_item' => _x( 'New Hero Banner', 'hero_banner' ),
        'view_item' => _x( 'View Hero Banner', 'hero_banner' ),
        'search_items' => _x( 'Search Hero Banners', 'hero_banner' ),
        'not_found' => _x( 'No Hero Banners found', 'hero_banner' ),
        'not_found_in_trash' => _x( 'No Hero Banners found in Trash', 'hero_banner' ),
        'parent_item_colon' => _x( 'Parent Hero Banner:', 'hero_banner' ),
        'menu_name' => _x( 'Hero Banners', 'hero_banner' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Display all your Hero Banners with this fantastic filterable Portfolio',
        'supports' => array( 'title', 'editor', 'comments', 'revisions', 'author', 'thumbnail', 'custom-sidebar' ),
		'taxonomies' => array('post_tag'), // this is IMPORTANT
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        'menu_icon' => TEMPLATE_URL . 'work.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
		
    );

    register_post_type( 'hero_banner', $args );
}

/* ----------------------------------------------------- */
/* EOF */
/* ----------------------------------------------------- */

?>