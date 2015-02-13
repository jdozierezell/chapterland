<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package chapterLand
 */
?>

<?php
  $pageImage = get_field('page_image');
?>

<div class="prettyFace">
  <img src="<?php echo $pageImage['url']; ?>" alt="<?php echo $pageImage['alt']; ?>">
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pageContent' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php 

    $showTable = get_field('include_table_of_contents_links');
    if($showTable == 'Yes') { 
      if( have_rows('page_content') ): ?>
    
    <h2>Table of Contents</h2>
        
        <?php
        
        while( have_rows('page_content') ) : the_row();

          if( get_row_layout() == 'text' ) : ?>
    
    <a href="#<?php the_sub_field('header_text_anchor'); ?>"><?php the_sub_field('section_header_text'); ?></a>
    
          <?php

          elseif( get_row_layout() == 'file' ) :

            the_sub_field('file');

          endif;

        endwhile;

      else :

      endif;
    
    }
    
    if( have_rows('page_content') ):

      while( have_rows('page_content') ) : the_row();

        if( get_row_layout() == 'text' ) : ?>
      
    <h2 id="<?php the_sub_field('header_text_anchor'); ?>"><?php the_sub_field('section_header_text'); ?></h2>
    <p><?php the_sub_field('text'); ?></p>

        <?php

        elseif( get_row_layout() == 'file' ) :

          the_sub_field('file');
        
        endif;

      endwhile;

    else :

    endif;
    
    ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'chapterland' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
