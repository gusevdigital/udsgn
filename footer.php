<?php
/*
# ===================================================
# footer.php
#
# The template for loading the footer.
# ===================================================
*/

if ( is_active_sidebar( 'footer-sidebar' ) ) {
  dynamic_sidebar( 'footer-sidebar' );
}

wp_footer();

?>

</body> <!-- end body -->
</html> <!-- end html -->
