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
  <img src="<?php echo $pageImage['sizes']['pretty-face']; ?>" alt="<?php echo $pageImage['alt']; ?>">
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pageContent' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php 

    $showTable = get_field('include_table_of_contents_links');

    if($showTable == 'Yes') { // If the option has been chosen to show the table, let's show it.
      if( have_rows('page_content') && is_user_logged_in() ) : // same check as below around ln 55. No sense in showing the table of contents to people who can't read the content. ?>
    
    <h2>Table of Contents</h2>
        
        <?php
        
        while( have_rows('page_content') ) : the_row();

          if( get_row_layout() == 'text' ) : // If the text layout option was chosen, show it. ?>
    
    <a href="#<?php the_sub_field('header_text_anchor'); ?>">
      <h3><?php the_sub_field('section_header_text'); ?></h3>
    </a>
    
          <?php

          elseif( get_row_layout() == 'files' ) : // If the images layout option was chosen, show it. ?>
    
    <a href="#<?php the_sub_field('header_files_anchor'); ?>">
      <h3><?php the_sub_field('section_header_files'); ?></h3>
    </a>
    
          <?php

          elseif( get_row_layout() == 'images' ) : // If the files layout option was chosen, show it. ?>
    
    <a href="#<?php the_sub_field('header_images_anchor'); ?>">
      <h3><?php the_sub_field('section_header_images'); ?></h3>
    </a>

          <?php        
    
           the_sub_field('file');

          endif;

        endwhile;

      else :

      endif; // End text layout option display
    
    }
    
    if( have_rows('page_content') && is_user_logged_in() ) : // check to see if the content exists and if the user is logged in to see it.

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

          foreach($files as $file) { // For each file to be displayed.
            $fileIcon = '';
            $fileType = $file['file_type'];
            switch( $fileType ) {
              case ".ai":
              case ".indd":
              case ".psd":
                $fileIcon = '<i class="fa fa-file-image-o"></i>';
                break;
              case ".doc/.docx":
                $fileIcon = '<i class="fa fa-file-word-o"></i>';
                break;
              case ".html":
                $fileIcon = '<i class="fa fa-file-code-o"></i>';
                break;
              case ".mov":
              case ".mp4":
                $fileIcon = '<i class="fa fa-file-video-o"></i>';
                break;
              case ".ppt":
                $fileIcon = '<i class="fa fa-file-powerpoint-o"></i>';
                break;
              case ".pdf":
                $fileIcon = '<i class="fa fa-file-pdf-o"></i>';
                break;
              case ".rtf":
              case ".txt":
                $fileIcon = '<i class="fa fa-file-text-o"></i>';
                break;
              case ".xls/.xlsx":
                $fileIcon = '<i class="fa fa-file-excel-o"></i>';
                break;
            } ?>
    
           <p><a href="<?php echo $file['file_upload']['url']; ?>"><span class="button"><?php echo $fileIcon . '&nbsp;&nbsp;&nbsp;' . $file['file_name_to_display']; ?></span></a> &mdash; <?php echo $file['file_description']; ?></p>
            
          <?php
    
          }
        
        elseif( get_row_layout() == 'images' ) : // End files layout option display and begin displaying images layout ?>

    <h2 id="<?php the_sub_field('header_images_anchor'); ?>"><?php the_sub_field('section_header_images'); ?></h2>

        <?php
    
          $images = get_sub_field('images');

          foreach($images as $image) { // For each image to be displayed. ?>
    <a href="<?php echo $image['image_upload']['url'] ?>">
      <h3>
        <img src="<?php echo $image['image_upload']['sizes']['medium']; ?>" /><?php echo $image['image_name_display']; ?>
        <br>
        <?php echo $image['image_description']; ?>
      </h3>
      
    </a>
    
        <?php
            
         }

        endif; // We've covered all our bases.

      endwhile;  // We can stop showing our layouts now.

    else : // Is there anything else? ?>
    
    <p> The content on this page is for internal use only. Please login with the link above to continue. If you require access to ChapterLand, contact your supervisor. If you are looking for AFSP's public site, <a href="http://afsp.org">click to visit afsp.org.</a></p>

          <?php

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
