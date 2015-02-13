<?php

// Style the login page
function chapterland_login() { ?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
      background-size: 320px;
      width: 320px;
    }
    .login .message {
      border-left:0.5em solid #f36f21;
    }
    .wp-core-ui .button-primary {
      background: #00619a;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'chapterland_login' );

// Change the login logo url
function chapterland_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'chapterland_login_logo_url' );

// Change the login logo text
function chatperland_login_logo_title() {
  return 'ChapterLand Home';
}
add_filter( 'login_headertitle', 'chatperland_login_logo_title' );

//Change forgot password url
function chapterland_forgot_url() {
  return site_url('/wp-login.php?action=lostpassword');
}
add_filter( 'lostpassword_url', 'chapterland_forgot_url' );
?>