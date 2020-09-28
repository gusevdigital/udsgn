<?php
/*
# ===================================================
# template-home.php
#
# Template name: Home
# ===================================================
*/

get_header();

if ( is_active_sidebar( 'home-sidebar' ) ) {
  dynamic_sidebar( 'home-sidebar' );
}

get_footer();
?>
