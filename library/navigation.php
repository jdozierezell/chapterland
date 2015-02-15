<?php

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'chapterland' ),
) );

// Parameters for primary menu


function callMainNav() {
    $mainNav = array(
        'theme_location'  => 'primary',
        'menu'            => '',
        'container'       => false,
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => '',
        'menu_id'         => 'menu',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
    );
    wp_nav_menu( $mainNav );
}

?>