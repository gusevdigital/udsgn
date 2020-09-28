<?php
/**
 * widget-home-projects.php
 *
 * Plugin Name: Udsgn_Widget_Home_Projects
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that controls content of "projects" section on Home page.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Udsgn_Widget_Home_Projects extends WP_Widget {

  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {

    parent::__construct(
      /* id */
      'udsgn-home-projects',
      /* title */
      __( 'Home - Projects', 'udsgn' ),
      array(
        'classname' => 'udsgn-home-projects',
        'description' => __( 'A widget that controls content of projects section on Home page.', 'udsgn' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => '',
        'button-text' => ''
      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'button-text' ); ?>"><?php _e( 'Button text:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button-text' ); ?>" name="<?php echo $this->get_field_name( 'button-text' ); ?>" value="<?php echo esc_attr( $instance['button-text'] ); ?>">
      </p>
      <?php
  }

  /* Process the widget's values */
  /* Initialized when you save the widget */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    /* Update values */
  //  $instance[ 'title' ] = strip_tags( stripslashes( $new_instance[ 'title' ] ) ;
    $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( stripslashes( $new_instance['title'] ) ) : '';
    $instance['button-text'] = ( !empty( $new_instance['button-text'] ) ) ? strip_tags( stripslashes( $new_instance['button-text'] ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = $instance[ 'title' ];
    $button_text = $instance[ 'button-text' ];


    /* Display the markup before the widget */
    echo $before_widget;
    ?>

    <section id="projects" class="pt-10 bg-blue-110" data-menu-bg="bg-blue-110" data-menu-text="navbar-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-light"><?php echo $title; ?></h2>
            <div class="row">
              Projects
            </div>
            <a href="<?php echo get_post_type_archive_link('post'); ?>" title="<?php echo $button_text; ?>" class="btn btn-lg btn-outline-secondary"><?php echo $button_text; ?></a>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end section -->

    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Udsgn_Widget_Home_Projects') ) {
  function register_udsgn_widget_home_projects() {
    register_widget( "Udsgn_Widget_Home_Projects" );
  }
  add_action( 'widgets_init', 'register_udsgn_widget_home_projects' );
}
?>
