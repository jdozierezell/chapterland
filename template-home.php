<?php
/*
Template Name: Home Page
*/

get_header(); ?>

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