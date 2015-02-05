<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function chapterland_widgets() {

	register_sidebar( array(
		'name'          => __( 'Upper Right Corner', 'chapterland' ),
		'id'            => 'upper_right_corner',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
    
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'chapterland' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'chapterland_widgets' );
?>