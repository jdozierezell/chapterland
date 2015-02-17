<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package chapterLand
 */
?>



    </div><!-- .container -->
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
    <script>
        jQuery(document).ready(function($){
           // $('.flexnav').flexNav({'animationSpeed':'100'});
           $( '#menu' ).slicknav({
             label: "Touch for Menu",
             allowParentLinks: true
           });
         // $( '#menu li:has(ul)' ).doubleTapToGo();
        });
        (function() {

            var dataLogin = document.querySelector( '[data-dialog-login]' ),
                dialogLogin = document.getElementById( dataLogin.getAttribute( 'data-dialog-login' ) ),
                dlgLgn = new DialogFx( dialogLogin );

            dataLogin.addEventListener( 'click', dlgLgn.toggle.bind(dlgLgn) );
            
            var dataTry = document.querySelector( '[data-dialog-try]' ),
                dialogTry = document.getElementById( dataTry.getAttribute( 'data-dialog-try' ) ),
                dlgTry = new DialogFx( dialogTry );

            dataTry.addEventListener( 'click', dlgTry.toggle.bind(dlgTry) );
            
            var dataReset = document.querySelector( '[data-dialog-reset]' ),
                dialogReset = document.getElementById( dataReset.getAttribute( 'data-dialog-reset' ) ),
                dlgReset = new DialogFx( dialogReset );

            dataReset.addEventListener( 'click', dlgReset.toggle.bind(dlgReset) );
        })();
    </script>

</body>
</html>
