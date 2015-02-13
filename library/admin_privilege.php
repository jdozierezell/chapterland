<?php

if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

?>