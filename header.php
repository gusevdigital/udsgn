<?php
/*
# ===================================================
# header.php
#
# The theme header.
# ===================================================
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); echo get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="author" content="Gusev Digital">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
  <!-- Favicon & Apple Touc Icon -->
  <?php
    $favicon16 = ICONS . '/favicon-16x16.png';
    $favicon32 = ICONS . '/favicon-32x32.png';
    $touchicon = ICONS . '/apple-touch-icon.png';
  ?>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $touchicon; ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon32; ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon16; ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header-navbar">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-menu-text-default="navbar-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
          <img src="<?php echo IMAGES . '/logo.png'; ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-light" />
          <img src="<?php echo IMAGES . '/logo-white.png'; ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-dark" />
        </a>
        <button class="navbar-toggler btn btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <img src="<?php echo ICONS . '/menu-burger-light.svg'; ?>" class="menu-icon-open" />
          <img src="<?php echo ICONS . '/menu-close-light.svg'; ?>" class="menu-icon-close" />
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
					  wp_nav_menu( array(
							'menu_class' => 'navbar-nav mx-auto',
							'theme_location' => 'main-menu',
							'container' => false,
							'container_aria_label' => __( 'Website Navigation', 'udsgn' ),
						) );
            if ( is_active_sidebar( 'header-sidebar' ) ) {
              dynamic_sidebar( 'header-sidebar' );
            }
					?>
        </div>
      </div>
    </nav>
  </header>
