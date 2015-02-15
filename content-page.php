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

    if($showTable == 'Yes') { // If the option has been chosen to show the table, let's show it.
      if( have_rows('page_content') ): ?>
    
    <h2>Table of Contents</h2>
        
        <?php
        
        while( have_rows('page_content') ) : the_row();

          if( get_row_layout() == 'text' ) : // If the text layout option was chosen, show it. ?>
    
    <a href="#<?php the_sub_field('header_text_anchor'); ?>"><?php the_sub_field('section_header_text'); ?></a>
    
          <?php

          elseif( get_row_layout() == 'file' ) :

            the_sub_field('file');

          endif;

        endwhile;

      else :

      endif; // End text layout option display
    
    }
    
    if( have_rows('page_content') ):

      while( have_rows('page_content') ) : the_row();
      
      // attach variables to security settings
       
      $whoText = get_sub_field('who_text');
      $whoFiles = get_sub_field('who_files');
      $whoImages = get_sub_field('who_images');

        if( get_row_layout() == 'text' && current_user_can($whoText) ) : // If the text layout option was chosen, show it. ?>
        
    <h2 id="<?php the_sub_field('header_text_anchor'); ?>"><?php the_sub_field('section_header_text'); ?></h2>
    <p><?php the_sub_field('text'); ?></p>

          <?php 

        elseif( get_row_layout() == 'files' ) :  // End text layout option display and begin displaying the files layout ?>

    <h2 id="<?php the_sub_field('header_files_anchor'); ?>"><?php the_sub_field('section_header_files'); ?></h2>

        <?php
    
          $files = get_sub_field('files');

          foreach($files as $file) {
            print_r($file); ?>
            
           <p><a href="<?php echo $file['file_upload']['url']; ?>"><?php echo $file['file_type'] . ' ' . $file['file_name_to_display']; ?></a></p>
            
          <?php
    
          }
        
        elseif( get_row_layout() == 'images' ) : // End files layout option display and begin displaying images layout

        endif; // We've covered all our bases.

      endwhile;  // We can stop showing our layouts now.

    else : // Is there anything else?

    endif;  // All the content. Nothing else to see here.
    
    ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'chapterland' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
