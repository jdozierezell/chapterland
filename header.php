<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package chapterLand
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'chapterland' ); ?></a>
    <header class="container">
        <div class="login-wrap"><button data-dialog="logindialog" class="trigger">Login to Chapterland</button></div>
        <div id="logindialog" class="dialog">
            <div class="dialog__overlay"></div>
            <div class="dialog__content">
                <?php dynamic_sidebar( 'upper_right_corner' ); ?><button class="action" data-dialog-close>Close</button></div>
            </div>
        </div>
        <section class="branding">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="siteName" src="<?php bloginfo('template_directory'); ?>/images/logo.jpg" alt=""></a>
            <img class="brandLogo" src="<?php bloginfo('template_directory'); ?>/images/header-right-logo.jpg" alt="">
        </section>
    </header>
    <div class="wide">
        <div class="container">
            <nav class="main-nav">
                <div class="menu-button" aria-controls="menu" aria-expanded="false"><?php _e( 'Touch for Menu', 'chapterland' ); ?></div>
			<?php callMainNav(); // secret sauce located in library/navigation.php ?>
            </nav>
        </div>
    </div>
    <div class="container">