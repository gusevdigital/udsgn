<?php
/*
# ===================================================
# functions.php
#
# The theme functions file.
# ===================================================
*/

/* -------------------------------------------------- */
/* 1. CONSTANTS */
/* -------------------------------------------------- */

define ('THEMEROOT', get_stylesheet_directory_uri() );
define ( 'IMAGES', THEMEROOT . '/imgs' );
define ( 'ICONS', THEMEROOT . '/icons' );
define ('JS', THEMEROOT . '/js' );
define ('CSS', THEMEROOT . '/css' );



/* -------------------------------------------------- */
/* 2. THEME SETUP */
/* -------------------------------------------------- */

if( ! function_exists( 'udsgn_theme_setup' ) ) {
  function udsgn_theme_setup() {
    /* Make the theme available for translation */
    $lang_dir = THEMEROOT . 'languages';
    load_theme_textdomain ( 'udsgn', $lang_dir );

    /* Add suppoirt for automatic feed links */
    add_theme_support( 'automatic-feed-links' );

    /* Add support for post thumbnails */
    add_theme_support( 'post-thumbnails', apply_filters( 'pagelines_post-thumbnails', array('post') ) );

    /* Register nav menu */
    register_nav_menus( array(
      'main-menu' => __( 'Main menu', 'udsgn' )
    ) );

    /* Add image sizes */
    add_image_size( 'project-thumbnail', 1000, 800, true );
  }

  add_action( 'after_setup_theme', 'udsgn_theme_setup' );
}


/* -------------------------------------------------- */
/* 3. ADD BOOTSTRAP CLASSES TO MENU */
/* -------------------------------------------------- */
// Add class to A element of .primary-menu
function udsgn_primary_menu_anchor_class($item_output, $item, $depth, $args) {
    $item_output = preg_replace('/<a /', '<a class="nav-link" ', $item_output, 1);
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'udsgn_primary_menu_anchor_class', 10, 4);

// Add class to LI element of .primary-menu
function udsgn_primary_menu_li_class($objects, $args) {
    foreach($objects as $key => $item) {
      $objects[$key]->classes[] = 'nav-item';
    }
    return $objects;
}
add_filter('wp_nav_menu_objects', 'udsgn_primary_menu_li_class', 10, 2);

// Add active class to current-page-menu-items
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}



/* -------------------------------------------------- */
/* 4. SCRIPTS */
/* -------------------------------------------------- */

if ( ! function_exists( 'udsgn_scripts' ) ) {
  function udsgn_scripts() {

    wp_register_script( 'bootstrap-js', THEMEROOT . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), false, true );
    wp_register_script( 'main-js', JS . '/main.js', array( 'jquery' ), false, true );
    wp_register_script( 'isotope-js', THEMEROOT . '/node_modules/isotope-layout/dist/isotope.pkgd.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'bootstrap-js' );
    if( is_home() ) {
      wp_enqueue_script( 'isotope-js' );
    }
    wp_enqueue_script ( 'main-js' );

    wp_enqueue_style ( 'theme-css', CSS . '/theme.min.css' );

  }

  add_action( 'wp_enqueue_scripts', 'udsgn_scripts' );
}



/* -------------------------------------------------- */
/* 5. REGISTER WIDGET AREA */
/* -------------------------------------------------- */
if ( ! function_exists( 'udsgn_widget_init' ) ) {
  function udsgn_widget_init() {
    /* Check if current version of WordPress supports sidebar */
    if ( function_exists( 'register_sidebar' ) ) {
      register_sidebar( array(
        'name' => __( 'Header', 'udsgn' ),
        'id' => 'header-sidebar',
        'description' => __( 'Content for header', 'udsgn' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
      ));
      register_sidebar( array(
        'name' => __( 'Home', 'udsgn' ),
        'id' => 'home-sidebar',
        'description' => __( 'Content for "Home" page', 'udsgn' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
      ));
      register_sidebar( array(
        'name' => __( 'Footer', 'udsgn' ),
        'id' => 'footer-sidebar',
        'description' => __( 'Content for footer', 'udsgn' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
      ));
      register_sidebar( array(
        'name' => __( 'Contact', 'udsgn' ),
        'id' => 'contact-sidebar',
        'description' => __( 'Content for "Contact" page"', 'udsgn' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
      ));
    }
  }
  add_action ( 'widgets_init', 'udsgn_widget_init' );
}

/* -------------------------------------------------- */
/* 4. GET PROJECT META */
/* -------------------------------------------------- */
if ( ! function_exists( 'udsgn_project_meta' ) ) {
  function udsgn_project_meta( $categories, $hide_category ) {
    if ( get_post_type() === 'post' ) {
      $categories_array = array();
      $meta = '';

      foreach ($categories as $key => $category) {
        if( $category->term_id == $hide_category ) {
          unset( $categories[ $key] );
        }
      }

      $categories_array = array_map(function($category) { return '<span class="project-category-item">' . $category->name . '</span>' ;}, $categories );
      $meta = join( '<span>/</span>', $categories_array );

      echo $meta;

    }
  }
}

/* -------------------------------------------------- */
/* 5. VALIDATE FIELD LENGTH */
/* -------------------------------------------------- */
if ( ! function_exists( 'udsgn_validate_length' ) ) {
  function udsgn_validate_length( $fieldValue, $minLength ) {
    return ( strlen( trim( $fieldValue ) ) > $minLength );
  }
}

/* -------------------------------------------------- */
/* 6. WIDGETS */
/* -------------------------------------------------- */
require_once( get_template_directory(). '/include/widgets/widget-header-button.php' );
require_once( get_template_directory(). '/include/widgets/widget-home-header.php' );
require_once( get_template_directory(). '/include/widgets/widget-home-about.php' );
require_once( get_template_directory(). '/include/widgets/widget-home-projects.php' );
require_once( get_template_directory(). '/include/widgets/widget-footer.php' );
require_once( get_template_directory(). '/include/widgets/widget-contact-contacts.php' );
require_once( get_template_directory(). '/include/widgets/widget-contact-form.php' );

?>
