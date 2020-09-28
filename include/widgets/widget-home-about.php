<?php
/**
 * widget-home-about.php
 *
 * Plugin Name: Udsgn_Widget_Home_About
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that controls content of "about" section on Home page.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Udsgn_Widget_Home_About extends WP_Widget {


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
      'udsgn-home-about',
      /* title */
      __( 'Home - About', 'udsgn' ),
      array(
        'classname' => 'udsgn-home-about',
        'description' => __( 'A widget that controls content of about sectoin on Home page.', 'udsgn' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => '',
        'desc' => '',
        'icon1_img' => '',
        'icon1_title' => 'Identity',
        'icon1_text' => '',
        'icon2_img' => '',
        'icon2_title' => 'Print Design',
        'icon2_text' => '',
        'icon3_img' => '',
        'icon3_title' => 'Web',
        'icon3_text' => '',
        'icon4_img' => '',
        'icon4_title' => 'Social Media',
        'icon4_text' => ''
      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
      </p>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php echo esc_html__( 'Description:', 'udsgn' ); ?></label>
          <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $instance['desc'] ); ?></textarea>
      </p>
      <h3>Icon 1</h3>
      <p>
        <label for="<?php echo $this->get_field_id( 'icon1_img' ); ?>"><?php _e( 'Icon 1 Image:', 'udsgn' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'icon1_img' ); ?>" name="<?php echo $this->get_field_name( 'icon1_img' ); ?>" type="text" value="<?php echo esc_url( $instance['icon1_img'] ); ?>" />
        <button class="upload_image_button button button-primary"><?php _e( 'Upload Image', 'udsgn' ); ?></button>
     </p>
     <p>
       <label for="<?php echo $this->get_field_id( 'icon1_title' ); ?>"><?php _e( 'Icon 1 Image:', 'udsgn' ); ?></label>
       <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon1_title' ); ?>" name="<?php echo $this->get_field_name( 'icon1_title' ); ?>" value="<?php echo esc_attr( $instance['icon1_title'] ); ?>">
     </p>
     <p>
         <label for="<?php echo esc_attr( $this->get_field_id( 'icon1_text' ) ); ?>"><?php echo esc_html__( 'Icon 1 Text:', 'udsgn' ); ?></label>
         <p><?php _e( '(Print every element on a new string)', 'udsgn' ); ?></p>
         <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon1_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon1_text' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $instance['icon1_text'] ); ?></textarea>
     </p>
     <h3>Icon 2</h3>
     <p>
       <label for="<?php echo $this->get_field_id( 'icon2_img' ); ?>"><?php _e( 'Icon 2 Image:', 'udsgn' ); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id( 'icon2_img' ); ?>" name="<?php echo $this->get_field_name( 'icon2_img' ); ?>" type="text" value="<?php echo esc_url( $instance['icon2_img'] ); ?>" />
       <button class="upload_image_button button button-primary"><?php _e( 'Upload Image', 'udsgn' ); ?></button>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'icon2_title' ); ?>"><?php _e( 'Icon 2 Image:', 'udsgn' ); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon2_title' ); ?>" name="<?php echo $this->get_field_name( 'icon2_title' ); ?>" value="<?php echo esc_attr( $instance['icon2_title'] ); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'icon2_text' ) ); ?>"><?php echo esc_html__( 'Icon 2 Text:', 'udsgn' ); ?></label>
        <p><?php _e( '(Print every element on a new string)', 'udsgn' ); ?></p>
        <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon2_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon2_text' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $instance['icon2_text'] ); ?></textarea>
    </p>
    <h3>Icon 3</h3>
    <p>
      <label for="<?php echo $this->get_field_id( 'icon3_img' ); ?>"><?php _e( 'Icon 3 Image:', 'udsgn' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'icon3_img' ); ?>" name="<?php echo $this->get_field_name( 'icon3_img' ); ?>" type="text" value="<?php echo esc_url( $instance['icon3_img'] ); ?>" />
      <button class="upload_image_button button button-primary"><?php _e( 'Upload Image', 'udsgn' ); ?></button>
   </p>
   <p>
     <label for="<?php echo $this->get_field_id( 'icon3_title' ); ?>"><?php _e( 'Icon 3 Image:', 'udsgn' ); ?></label>
     <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon3_title' ); ?>" name="<?php echo $this->get_field_name( 'icon3_title' ); ?>" value="<?php echo esc_attr( $instance['icon3_title'] ); ?>">
   </p>
   <p>
       <label for="<?php echo esc_attr( $this->get_field_id( 'icon3_text' ) ); ?>"><?php echo esc_html__( 'Icon 3 Text:', 'udsgn' ); ?></label>
       <p><?php _e( '(Print every element on a new string)', 'udsgn' ); ?></p>
       <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon3_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon3_text' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $instance['icon3_text'] ); ?></textarea>
   </p>
   <h3>Icon 4</h3>
   <p>
     <label for="<?php echo $this->get_field_id( 'icon4_img' ); ?>"><?php _e( 'Icon 4 Image:', 'udsgn' ); ?></label>
     <input class="widefat" id="<?php echo $this->get_field_id( 'icon4_img' ); ?>" name="<?php echo $this->get_field_name( 'icon4_img' ); ?>" type="text" value="<?php echo esc_url( $instance['icon4_img'] ); ?>" />
     <button class="upload_image_button button button-primary"><?php _e( 'Upload Image', 'udsgn' ); ?></button>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'icon4_title' ); ?>"><?php _e( 'Icon 4 Image:', 'udsgn' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon4_title' ); ?>" name="<?php echo $this->get_field_name( 'icon4_title' ); ?>" value="<?php echo esc_attr( $instance['icon4_title'] ); ?>">
  </p>
  <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'icon4_text' ) ); ?>"><?php echo esc_html__( 'Icon 4 Text:', 'udsgn' ); ?></label>
      <p><?php _e( '(Print every element on a new string)', 'udsgn' ); ?></p>
      <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon4_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon4_text' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $instance['icon4_text'] ); ?></textarea>
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
    $instance['desc'] = ( !empty( $new_instance['desc'] ) ) ? strip_tags( stripslashes( $new_instance['desc'] ) ) : '';
    $instance['icon1_img'] = ( !empty( $new_instance['icon1_img'] ) ) ? strip_tags( stripslashes( $new_instance['icon1_img'] ) ) : '';
    $instance['icon1_title'] = ( !empty( $new_instance['icon1_title'] ) ) ? strip_tags( stripslashes( $new_instance['icon1_title'] ) ) : '';
    $instance['icon1_text'] = ( !empty( $new_instance['icon1_text'] ) ) ? strip_tags( stripslashes( $new_instance['icon1_text'] ) ) : '';
    $instance['icon2_img'] = ( !empty( $new_instance['icon2_img'] ) ) ? strip_tags( stripslashes( $new_instance['icon2_img'] ) ) : '';
    $instance['icon2_title'] = ( !empty( $new_instance['icon2_title'] ) ) ? strip_tags( stripslashes( $new_instance['icon2_title'] ) ) : '';
    $instance['icon2_text'] = ( !empty( $new_instance['icon2_text'] ) ) ? strip_tags( stripslashes( $new_instance['icon2_text'] ) ) : '';
    $instance['icon3_img'] = ( !empty( $new_instance['icon3_img'] ) ) ? strip_tags( stripslashes( $new_instance['icon3_img'] ) ) : '';
    $instance['icon3_title'] = ( !empty( $new_instance['icon3_title'] ) ) ? strip_tags( stripslashes( $new_instance['icon3_title'] ) ) : '';
    $instance['icon3_text'] = ( !empty( $new_instance['icon3_text'] ) ) ? strip_tags( stripslashes( $new_instance['icon3_text'] ) ) : '';
    $instance['icon4_img'] = ( !empty( $new_instance['icon4_img'] ) ) ? strip_tags( stripslashes( $new_instance['icon4_img'] ) ) : '';
    $instance['icon4_title'] = ( !empty( $new_instance['icon4_title'] ) ) ? strip_tags( stripslashes( $new_instance['icon4_title'] ) ) : '';
    $instance['icon4_text'] = ( !empty( $new_instance['icon4_text'] ) ) ? strip_tags( stripslashes( $new_instance['icon4_text'] ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = $instance[ 'title' ];
    $desc = $instance[ 'desc' ];
    $desc = nl2br($desc, false);
    $desc = '<p>' . preg_replace('#(<br>[\r\n]+){2}#', '</p><p>', $desc) . '</p>';
    $icon1_img = $instance[ 'icon1_img' ];
    $icon1_title = $instance[ 'icon1_title' ];
    $icon1_text = '<li>' . str_replace( PHP_EOL, '</li><li>', $instance[ 'icon1_text' ] ) . '</li>';
    $icon2_img = $instance[ 'icon2_img' ];
    $icon2_title = $instance[ 'icon2_title' ];
    $icon2_text = '<li>' . str_replace( PHP_EOL, '</li><li>', $instance[ 'icon2_text' ] ) . '</li>';
    $icon3_img = $instance[ 'icon3_img' ];
    $icon3_title = $instance[ 'icon3_title' ];
    $icon3_text = '<li>' . str_replace( PHP_EOL, '</li><li>', $instance[ 'icon3_text' ] ) . '</li>';
    $icon4_img = $instance[ 'icon4_img' ];
    $icon4_title = $instance[ 'icon4_title' ];
    $icon4_text = '<li>' . str_replace( PHP_EOL, '</li><li>', $instance[ 'icon4_text' ] ) . '</li>';


    /* Display the markup before the widget */
    echo $before_widget;
    ?>

    <section id="about" class="pt-10" data-menu-bg="bg-light" data-menu-text="navbar-light">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-5">
            <h2><?php echo $title; ?></h2>
            <?php echo $desc; ?>
          </div> <!-- end col -->
          <div class="col-lg-7">
            <div class="row">
              <div class="col-md-6">
                <div class="media">
                  <img class="mr-3" src="<?php echo $icon1_img; ?>" alt="<?php echo $icon1_title ?>">
                  <div class="media-body">
                    <h4><?php echo $icon1_title; ?></h4>
                    <ul class="list-unstyled">
                      <?php echo $icon1_text; ?>
                    </ul>
                  </div>
                </div>
              </div> <!-- end inner col -->
              <div class="col-md-6">
                <div class="media">
                  <img class="mr-3" src="<?php echo $icon2_img; ?>" alt="<?php echo $icon2_title ?>">
                  <div class="media-body">
                    <h4><?php echo $icon2_title; ?></h4>
                    <ul class="list-unstyled">
                      <?php echo $icon2_text; ?>
                    </ul>
                  </div>
                </div>
              </div> <!-- end inner col -->
            </div> <!-- end inner row -->
            <div class="row">
              <div class="col-md-6">
                <div class="media">
                  <img class="mr-3" src="<?php echo $icon3_img; ?>" alt="<?php echo $icon3_title ?>">
                  <div class="media-body">
                    <h4><?php echo $icon3_title; ?></h4>
                    <ul class="list-unstyled">
                      <?php echo $icon3_text; ?>
                    </ul>
                  </div>
                </div>
              </div> <!-- end inner col -->
              <div class="col-md-6">
                <div class="media">
                  <img class="mr-3" src="<?php echo $icon4_img; ?>" alt="<?php echo $icon4_title ?>">
                  <div class="media-body">
                    <h4><?php echo $icon4_title; ?></h4>
                    <ul class="list-unstyled">
                      <?php echo $icon4_text; ?>
                    </ul>
                  </div>
                </div>
              </div> <!-- end inner col -->
            </div> <!-- end inner row -->
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end section -->

    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Udsgn_Widget_Home_About') ) {
  function register_udsgn_widget_home_about() {
    register_widget( "Udsgn_Widget_Home_About" );
  }
  add_action( 'widgets_init', 'register_udsgn_widget_home_about' );
}
?>
