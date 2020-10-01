<?php
/**
 * widget-home-header.php
 *
 * Plugin Name: Udsgn_Widget_Home_Header
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that controls content of header on Home page.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Udsgn_Widget_Home_Header extends WP_Widget {


   public function scripts( ) {
     wp_enqueue_script( 'media-upload' );
     wp_enqueue_media();
     wp_enqueue_script('our_admin', JS . '/admin.js', array('jquery'));
   }

  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {

    // Add Widget scripts
     add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct(
      /* id */
      'udsgn-home-header',
      /* title */
      __( 'Home - Header', 'udsgn' ),
      array(
        'classname' => 'udsgn-home-header',
        'description' => __( 'A widget that controls content of header on Home page.', 'udsgn' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => 'Julia',
        'lead' => 'Designer',
        'image' => ''
      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'udsgn' ); ?></label>
          <p><?php _e( '(Print on a new string to create a new line)', 'udsgn' ); ?></p>
          <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $instance['title'] ); ?></textarea>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'lead' ); ?>"><?php _e( 'Lead:', 'udsgn' ); ?></label>
        <p><?php _e( '(Use [b]...[/b] to highlight the text. Ex. This is [b]highlighted[/b] text.)', 'udsn' ); ?></p>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'lead' ); ?>" name="<?php echo $this->get_field_name( 'lead' ); ?>" value="<?php echo esc_attr( $instance['lead'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:', 'udsgn' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $instance['image'] ); ?>" />
        <button class="upload_image_button button button-primary"><?php _e( 'Upload Image', 'udsgn' ); ?></button>
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
    $instance['lead'] = ( !empty( $new_instance['lead'] ) ) ? strip_tags( stripslashes( $new_instance['lead'] ) ) : '';
    $instance['image'] = ( !empty( $new_instance['image'] ) ) ? strip_tags( stripslashes( $new_instance['image'] ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = str_replace( PHP_EOL, '<br />', $instance[ 'title' ] );
    $title_inline = str_replace( PHP_EOL, ' ', $instance[ 'title' ] );
    $lead = str_replace( '[b]', '<strong class="text-primary">', $instance[ 'lead' ] );
    $lead = str_replace( '[/b]', '</strong>', $lead );


    /* Display the markup before the widget */
    echo $before_widget;
    ?>

    <section id="header-title" class="d-flex align-items-center navbar-space section-fullscreen" data-menu-bg="bg-light" data-menu-text="navbar-light">
      <div class="container pt-10">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 text-center text-lg-left">

            <h1 class="display-1"><?php echo $title; ?></h1>
            <div class="lead">
              <?php echo $lead; ?>
            </div>
          </div>
          <div class="col-lg-6">
            <img data-src="<?php echo $instance[ 'image' ]; ?>" alt="<?php echo $title_inline; ?>" class="img-fluid lazy shadow rounded-lg image" />
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end section -->

    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Udsgn_Widget_Home_Header') ) {
  function register_udsgn_widget_home_header() {
    register_widget( "Udsgn_Widget_Home_Header" );
  }
  add_action( 'widgets_init', 'register_udsgn_widget_home_header' );
}
?>
