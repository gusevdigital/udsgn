<?php
/*
# ===================================================
# template-contact.php
#
# Template Name: Contact
# ===================================================
*/

/* Load header.php */
get_header();
?>
<section id="header-title" class="navbar-space" data-menu-bg="bg-light" data-menu-text="navbar-light">
  <div class="container pt-10">
    <div class="row d-flex align-items-center">
      <div class="col-lg-12 text-center">
        <h1 class="display-1"><?php wp_title( '' ); ?></h1>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end section -->

<?php
if ( is_active_sidebar( 'contact-sidebar' ) ) {
  dynamic_sidebar( 'contact-sidebar' );
}

/* Load footer.php */
get_footer();
?>
