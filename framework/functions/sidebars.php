<?php

if (function_exists('register_sidebar')) {
	
	register_sidebar(array(
		'name' => 'Blog Sidebar Widgets',
		'id'   => 'blog-sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name' => 'User Menu',
		'id'   => 'user-menu',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	
	register_sidebar(array(
	   'name' => 'Header Search',
	   'id'   => 'header-search',
	   'before_widget' => '<div id="%1$s" class="widget %2$s">',
	   'after_widget' => '</div>',
	   'before_title' => '<h2>',
	   'after_title' => '</h2>'
   	));
	
	register_sidebar(array(
		'name' => 'Shop',
		'id'   => 'shop-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	
	register_sidebar(array(
		'name' => 'Default Page Sidebar Widgets',
		'id'   => 'page-sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	
	register_sidebar(array(
		'name' => 'Work Page Sidebar Widgets',
		'id'   => 'work-page-sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	
	register_sidebar(array(
		'name' => 'Contact Page Sidebar Widgets',
		'id'   => 'contact-page-sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	
	/*register_sidebar(array(
	   'name' => 'Footer Widgets',
	   'id'   => 'footer-widgets',
	   'before_widget' => '<div id="%1$s" class="widget %2$s col-4">',
	   'after_widget' => '</div>',
	   'before_title' => '<h2>',
	   'after_title' => '</h2>'
   	));*/
	register_sidebar(array(
	   'name' => 'Footer Widgets',
	   'id'   => 'footer-widgets',
	   'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3 col-sm3">',
	   'after_widget' => '</div>',
	   'before_title' => '<h2>',
	   'after_title' => '</h2>'
   	));
	
	register_sidebar(array(
	   'name' => 'Footer Ads',
	   'id'   => 'footer-ads',
	   'before_widget' => '<div id="%1$s" class="widget %2$s">',
	   'after_widget' => '</div>',
	   'before_title' => '<h2>',
	   'after_title' => '</h2>'
   	));
	
	register_sidebar(array(
	   'name' => 'Footer Text / Links',
	   'id'   => 'footer-text-links',
	   'before_widget' => '<div id="%1$s" class="widget %2$s">',
	   'after_widget' => '</div>',
	   'before_title' => '<h2>',
	   'after_title' => '</h2>'
   	));
	
	register_sidebar(array(
	   'name' => 'Footer Search',
	   'id'   => 'footer-search',
	   'before_widget' => '<div id="%1$s" class="widget %2$s">',
	   'after_widget' => '</div>',
	   'before_title' => '<h2>',
	   'after_title' => '</h2>'
   	));
}

?>