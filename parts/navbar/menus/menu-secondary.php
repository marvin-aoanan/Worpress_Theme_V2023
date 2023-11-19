<?php
// TODO: Improve navigation
wp_nav_menu(array(
    'theme_location' => 'secondary-menu',
    'menu_class'      => 'menu menu-icon',
    'link_before'     => '<span class="icon icon-before"></span>',
    //'link_after'      => '<span class="icon icon-after"></span>', using icon image
    'link_after'      => '<span class="icon fa-solid fa-arrow-right"></span>', // using font-awesome icon
));

// References:
// https://stackoverflow.com/questions/20752318/wordpress-add-a-class-to-menu-link
// https://developer.wordpress.org/reference/hooks/nav_menu_link_attributes/
// https://github.com/nickkuijpers/WordPress-Extended-Bootstrap-Nav-Walker
// HTML5 Blank navigation
// function html5blank_nav()
// {
// wp_nav_menu(
// array(
//     'theme_location'  => 'header-menu',
//     'menu'            => '',
//     'container'       => 'div',
//     'container_class' => 'menu-{menu slug}-container',
//     'container_id'    => '',
//     'menu_class'      => 'menu',
//     'menu_id'         => '',
//     'echo'            => true,
//     'fallback_cb'     => 'wp_page_menu',
//     'before'          => '',
//     'after'           => '',
//     'link_before'     => '',
//     'link_after'      => '',
//     'items_wrap'      => '<ul>%3$s</ul>',
//     'depth'           => 0,
//     'walker'          => ''
//     )
// );
// }