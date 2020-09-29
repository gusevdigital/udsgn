<?php
/**
 * widget-contact-contacts.php
 *
 * Plugin Name: Udsgn_Widget_Contact_Contacts
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that controls content of "Contacts" section on "Contact" page.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Udsgn_Widget_Contact_Contacts extends WP_Widget {

  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {

    parent::__construct(
      /* id */
      'udsgn-contact-contacts',
      /* title */
      __( 'Contact - Contacts', 'udsgn' ),
      array(
        'classname' => 'udsgn-contact-contacts',
        'description' => __( 'A widget that controls content of "Contacts" section on "Contact" page.', 'udsgn' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => 'Contact me via my Email',
        'email' => 'ulia@u-dsgn.ru'
      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>">
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
    $instance['email'] = ( !empty( $new_instance['email'] ) ) ? sanitize_email( strip_tags( stripslashes( $new_instance['email'] ) ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = $instance[ 'title' ];
    $email = $instance[ 'email' ];


    /* Display the markup before the widget */
    echo $before_widget;
    ?>

    <section id="contacts" class="pt-10 pb-5" data-menu-bg="bg-light" data-menu-text="navbar-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <h3><?php echo $title; ?></h3>
            <div class="contacts-list">
              <div class="contacts-item">
                <img src="<?php echo ICONS . "/email-pink.svg"; ?>">
                <a href="mailto:<?php echo $email; ?>" title="Write me via email"><?php echo $email; ?></a>
              </div>
            </div> <!-- end contact-list -->
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end section -->

    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Udsgn_Widget_Contact_Contacts') ) {
  function register_udsgn_widget_contact_contacts() {
    register_widget( "Udsgn_Widget_Contact_Contacts" );
  }
  add_action( 'widgets_init', 'register_udsgn_widget_contact_contacts' );
}
?>
