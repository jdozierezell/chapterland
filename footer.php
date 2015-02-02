<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package chapterLand
 */
?>

	</div><!-- #content -->
    <footer class="footer wide">
        <div class="container">
            <div class="footerLogo"> 
                <a href="#" class="footer-logo"><img src="<?php bloginfo('template_directory'); ?>/images/footer-logo.jpg" alt="" /></a>
            </div>
            <div class="legal">
                <p>
                    Copyright © 2015 [New Organization Name]. All Rights Reserved.<br>
                    <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> 
                </p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
