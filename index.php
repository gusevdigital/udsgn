<?php
/*
# ===================================================
# index.php
#
# Main template file.
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
<section id="projects" class="pt-10 bg-blue-110" data-menu-bg="bg-blue-110" data-menu-text="navbar-dark">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="nav projects-filter text-light">
          <div class="projects-title"><?php _e( 'Filter by:', 'udsgn' ); ?></div>
          <a class="nav-link active" href="#all" data-filter="*" title="<?php _e( 'Filter All', 'udsgn' ); ?>"><?php _e( 'All', 'udsgn' ); ?></a>
          <!--<a class="nav-link" href="#identity" data-filter=".fidentity" title="Filter Identity">Identity</a>
          <a class="nav-link" href="#print" data-filter=".fprint" title="Filter Print Design">Print</a>
          <a class="nav-link" href="#web" data-filter=".fweb" title="Filter Websites">Web</a>
          <a class="nav-link" href="#socials" data-filter=".fsocials" title="Filter Socials">Socials</a>-->
          <?php
            $args = array(
              'orderby' => 'name',
              'order' => 'ASC',

              'hide_empty' => true,
              /* Exclude not_categorised category */
              'exclude' => array(1,7)
            );

            $categories = get_categories( $args );
            foreach ( $categories as $category ) {
              ?>
              <a class="nav-link" href="#<?php echo $category->slug; ?>" data-filter=".f<?php echo $category->slug; ?>" title="Filter <?php echo $category->name; ?>"><?php echo $category->name; ?></a>
              <?php
            }
          ?>
        </div> <!-- end .projects-filter -->
      </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="row projects-items">
      <?php
        $queryArgs = array(
          /* No uncategorized */
          'cat' => '-1',
          /* Get all posts */
          'posts_per_page' => '-1'
        );
        $query = new WP_Query( $queryArgs );
      ?>
      <?php if ( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
        <?php if ( has_post_thumbnail() ) : ?>
          <?php
            /* Collect all post categories for class attribute */
            $slugs = '';
            $currentCategories = get_the_category();

            foreach ($currentCategories as $currentCategory) {
              $slugs .= ' f' . $currentCategory -> slug;
            }
          ?>
          <figure class="col-lg-4<?php echo $slugs; ?>">
            <a class="card bg-dark text-white shadow text-center" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( 'project-thumbnail', array( 'class' => 'img-fluid card-img' ) ); ?>
              <div class="card-img-overlay d-flex flex-column justify-content-center">
                <h4 class="text-white"><?php the_title(); ?></h4>
                <div class="project-category">
                  <?php udsgn_project_meta( $currentCategories, 7 ); ?>
                </div>
              </div>
            </a>
          </figure>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end section -->

<?php
/* Load footer.php */
get_footer();
?>
