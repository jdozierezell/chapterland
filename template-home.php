<?php
/*
Template Name: Home Page
*/

get_header(); ?>
    <div class="container">
        <header class="branding">
            <img class="siteName" src="images/logo.jpg" alt="">
            <img class="brandLogo" src="images/header-right-logo.jpg" alt="">
        </header>
    </div>
    <div class="wide">
        <div class="container">
            <nav class="main-nav">
                <div class="menu-button">Menu</div>
                <ul class="flexnav" data-breakpoint="844">
                    <li><a href="#">Living the Brand</a></li>
                    <li><a href="#">Style Guide</a></li>
                    <li><a href="#">Image Library</a></li>
                    <li><a href="#">Templates</a></li>
                    <li><a href="#">Publications</a></li>
                    <li><a href="#">Operations</a></li>
                    <li><a href="#">Media Center</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>

<?php while ( have_posts() ) : the_post(); ?>
    <?php
        $pageImage = get_field('page_image');
    ?>

    <div class="container">
        <div class="prettyFace wow fadeIn" data-wow-delay=".5s">
            <img src="<?php echo $pageImage['url']; ?>" alt="<?php echo $pageImage['alt']; ?>">
        </div>
        <ul class="boxMenu">
        <?php
            $delay = 0.5;
            while ( have_rows('box_menu') ) : the_row();
            $delay = $delay + 0.3;
            $PageLink = get_sub_field('page_link');
            $post = $PageLink;
            setup_postdata( $post );
        ?>
            <li class="wow fadeIn" data-wow-delay="<?php echo $delay ?>s">
                <a href="#">
                    <div></div>
                    <div>
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo the_field('page_description'); ?></p>
                    </div>
                </a>
            </li>
            <?php wp_reset_postdata(); ?>
        <?php endwhile // ACF Repeater ?>
        </ul>
    </div>

<?php endwhile // WP_Query Loop ?>

<script>
    jQuery(document).ready(function($){
        $('.flexnav').flexNav();
        if(screen.width > 640) {
            new WOW().init();
        }
    });
    </script>
<?php get_footer(); ?>