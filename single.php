<?php
/*
# ===================================================
# single.php
#
# The signle project template file
# ===================================================
*/

/* Load header.php */
get_header();
?>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
  <?php $currentCategories = get_the_category(); ?>
  <section id="header-title" class="navbar-space" data-menu-bg="bg-light" data-menu-text="navbar-light">
    <div class="container pt-10">
      <div class="row d-flex align-items-center">
        <div class="col-lg-12 text-center">
          <h1 class="display-1"><?php wp_title( '' ); ?></h1>
          <div class="project-category mb-5">
            <?php udsgn_project_meta( $currentCategories, 7 ); ?>
          </div>
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div> <!-- end container -->
  </section> <!-- end section -->
  <section id="project" class="pt-10 pb-2 bg-blue-110" data-menu-bg="bg-blue-110" data-menu-text="navbar-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-light">
          <?php
            echo str_replace( '<img', '<img class="img-fluid" ', get_the_content() );
          ?>
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div> <!-- end container -->
  </section> <!-- end section -->
<?php endwhile; ?>

<?php else : ?>
  <?php _e( 'Oops, it seems there is nothing here.', 'udsgn' ); ?>
<?php endif; ?>


<?php
/* Load footer.php */
get_footer();
?>
