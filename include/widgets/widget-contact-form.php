<?php
/**
 * widget-contact-form.php
 *
 * Plugin Name: Udsgn_Widget_Contact_Form
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that controls content of "Form" section on "Contact" page.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Udsgn_Widget_Contact_Form extends WP_Widget {

  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {

    parent::__construct(
      /* id */
      'udsgn-contact-form',
      /* title */
      __( 'Contact - Form', 'udsgn' ),
      array(
        'classname' => 'udsgn-contact-form',
        'description' => __( 'A widget that controls content of "Form" section on "Contact" page.', 'udsgn' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => 'Contact me via my Email',
        'subtitle' => "I'll get back to you in a business day!",
        'error_title' => "Oh no!",
        'error_text' => "Sorry, it seems you filled something wrong.",
        'warning_title' => "Oh no!",
        'warning_text' => "It seems there was a problem with sending your email.",
        'success_title' => "Thank you, %s!",
        'success_text' => "Your message has been successfully sent. I'll get back to you in a business day!",
        'name_label' => 'Name',
        'name_placeholder' => 'Jorn Doe',
        'email_label' => 'Email',
        'email_placeholder' => 'your@email.com',
        'subject_label' => 'Subject',
        'subject_placeholder' => 'Want to order website design',
        'text_label' => 'Your Message',
        'button_text' => 'Submit',
        'error_name' => 'Please enter your name',
        'error_email' => 'Please enter your email',
        'error_email_valid' => 'Please enter a valid email address',
        'error_subject' => 'Please enter the subject',
        'error_message' => 'Please enter your message',
        'error_length' => 'At least {0} characters!'

      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" value="<?php echo esc_attr( $instance['subtitle'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'name_label' ); ?>"><?php _e( 'Name Field Label:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'name_label' ); ?>" name="<?php echo $this->get_field_name( 'name_label' ); ?>" value="<?php echo esc_attr( $instance['name_label'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'name_placeholder' ); ?>"><?php _e( 'Name Field Placeholder:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'name_placeholder' ); ?>" name="<?php echo $this->get_field_name( 'name_placeholder' ); ?>" value="<?php echo esc_attr( $instance['name_placeholder'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'email_label' ); ?>"><?php _e( 'Email Field Label:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email_label' ); ?>" name="<?php echo $this->get_field_name( 'email_label' ); ?>" value="<?php echo esc_attr( $instance['email_label'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'email_placeholder' ); ?>"><?php _e( 'Email Field Placeholder:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email_placeholder' ); ?>" name="<?php echo $this->get_field_name( 'email_placeholder' ); ?>" value="<?php echo esc_attr( $instance['email_placeholder'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'subject_label' ); ?>"><?php _e( 'Subject Field Label:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'subject_label' ); ?>" name="<?php echo $this->get_field_name( 'subject_label' ); ?>" value="<?php echo esc_attr( $instance['subject_label'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'subject_placeholder' ); ?>"><?php _e( 'Subject Field Placeholder:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'subject_placeholder' ); ?>" name="<?php echo $this->get_field_name( 'subject_placeholder' ); ?>" value="<?php echo esc_attr( $instance['subject_placeholder'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'text_label' ); ?>"><?php _e( 'Text Field Label:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'text_label' ); ?>" name="<?php echo $this->get_field_name( 'text_label' ); ?>" value="<?php echo esc_attr( $instance['text_label'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo esc_attr( $instance['button_text'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'error_title' ); ?>"><?php _e( 'Error Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error_title' ); ?>" name="<?php echo $this->get_field_name( 'error_title' ); ?>" value="<?php echo esc_attr( $instance['error_title'] ); ?>">
      </p>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'error_text' ) ); ?>"><?php echo esc_html__( 'Error Text:', 'udsgn' ); ?></label>
          <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'error_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'error_text' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $instance['error_text'] ); ?></textarea>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'warning_title' ); ?>"><?php _e( 'Warning Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'warning_title' ); ?>" name="<?php echo $this->get_field_name( 'warning_title' ); ?>" value="<?php echo esc_attr( $instance['warning_title'] ); ?>">
      </p>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'warning_text' ) ); ?>"><?php echo esc_html__( 'Warning Text:', 'udsgn' ); ?></label>
          <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'warning_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'warning_text' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $instance['warning_text'] ); ?></textarea>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'success_title' ); ?>"><?php _e( 'Success Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'success_title' ); ?>" name="<?php echo $this->get_field_name( 'success_title' ); ?>" value="<?php echo esc_attr( $instance['success_title'] ); ?>">
      </p>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'success_text' ) ); ?>"><?php echo esc_html__( 'Success Text:', 'udsgn' ); ?></label>
          <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'success_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'success_text' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $instance['success_text'] ); ?></textarea>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'error_name' ); ?>"><?php _e( 'Error Name:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error_name' ); ?>" name="<?php echo $this->get_field_name( 'error_name' ); ?>" value="<?php echo esc_attr( $instance['error_name'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'error_email' ); ?>"><?php _e( 'Error Email:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error_email' ); ?>" name="<?php echo $this->get_field_name( 'error_email' ); ?>" value="<?php echo esc_attr( $instance['error_email'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'error_email_valid' ); ?>"><?php _e( 'Error Invalid Email:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error_email_valid' ); ?>" name="<?php echo $this->get_field_name( 'error_email_valid' ); ?>" value="<?php echo esc_attr( $instance['error_email_valid'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'error_subject' ); ?>"><?php _e( 'Error Subject:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error_subject' ); ?>" name="<?php echo $this->get_field_name( 'error_subject' ); ?>" value="<?php echo esc_attr( $instance['error_subject'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'error_message' ); ?>"><?php _e( 'Error Message:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error_message' ); ?>" name="<?php echo $this->get_field_name( 'error_message' ); ?>" value="<?php echo esc_attr( $instance['error_message'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'error_length' ); ?>"><?php _e( 'Error Short Length:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'error_length' ); ?>" name="<?php echo $this->get_field_name( 'error_length' ); ?>" value="<?php echo esc_attr( $instance['error_length'] ); ?>">
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
    $instance['subtitle'] = ( !empty( $new_instance['subtitle'] ) ) ? strip_tags( stripslashes( $new_instance['subtitle'] ) ) : '';
    $instance['error_title'] = ( !empty( $new_instance['error_title'] ) ) ? strip_tags( stripslashes( $new_instance['error_title'] ) ) : '';
    $instance['error_text'] = ( !empty( $new_instance['error_text'] ) ) ? strip_tags( stripslashes( $new_instance['error_text'] ) ) : '';
    $instance['warning_title'] = ( !empty( $new_instance['warning_title'] ) ) ? strip_tags( stripslashes( $new_instance['warning_title'] ) ) : '';
    $instance['warning_text'] = ( !empty( $new_instance['warning_text'] ) ) ? strip_tags( stripslashes( $new_instance['warning_text'] ) ) : '';
    $instance['success_title'] = ( !empty( $new_instance['success_title'] ) ) ? strip_tags( stripslashes( $new_instance['success_title'] ) ) : '';
    $instance['success_text'] = ( !empty( $new_instance['success_text'] ) ) ? strip_tags( stripslashes( $new_instance['success_text'] ) ) : '';
    $instance['name_label'] = ( !empty( $new_instance['name_label'] ) ) ? strip_tags( stripslashes( $new_instance['name_label'] ) ) : '';
    $instance['name_placeholder'] = ( !empty( $new_instance['name_placeholder'] ) ) ? strip_tags( stripslashes( $new_instance['name_placeholder'] ) ) : '';
    $instance['email_label'] = ( !empty( $new_instance['email_label'] ) ) ? strip_tags( stripslashes( $new_instance['email_label'] ) ) : '';
    $instance['email_placeholder'] = ( !empty( $new_instance['email_placeholder'] ) ) ? strip_tags( stripslashes( $new_instance['email_placeholder'] ) ) : '';
    $instance['subject_label'] = ( !empty( $new_instance['subject_label'] ) ) ? strip_tags( stripslashes( $new_instance['subject_label'] ) ) : '';
    $instance['subject_placeholder'] = ( !empty( $new_instance['subject_placeholder'] ) ) ? strip_tags( stripslashes( $new_instance['subject_placeholder'] ) ) : '';
    $instance['text_label'] = ( !empty( $new_instance['text_label'] ) ) ? strip_tags( stripslashes( $new_instance['text_label'] ) ) : '';
    $instance['button_text'] = ( !empty( $new_instance['button_text'] ) ) ? strip_tags( stripslashes( $new_instance['button_text'] ) ) : '';
    $instance['error_name'] = ( !empty( $new_instance['error_name'] ) ) ? strip_tags( stripslashes( $new_instance['error_name'] ) ) : '';
    $instance['error_email'] = ( !empty( $new_instance['error_email'] ) ) ? strip_tags( stripslashes( $new_instance['error_email'] ) ) : '';
    $instance['error_email_valid'] = ( !empty( $new_instance['error_email_valid'] ) ) ? strip_tags( stripslashes( $new_instance['error_email_valid'] ) ) : '';
    $instance['error_subject'] = ( !empty( $new_instance['error_subject'] ) ) ? strip_tags( stripslashes( $new_instance['error_subject'] ) ) : '';
    $instance['error_message'] = ( !empty( $new_instance['error_message'] ) ) ? strip_tags( stripslashes( $new_instance['error_message'] ) ) : '';
    $instance['error_length'] = ( !empty( $new_instance['error_length'] ) ) ? strip_tags( stripslashes( $new_instance['error_length'] ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {

    extract( $args );

    $title = $instance[ 'title' ];
    $subtitle = $instance['subtitle'];
    $error_title = $instance['error_title'];
    $error_text = $instance['error_text'];
    $warning_title = $instance['warning_title'];
    $warning_text = $instance['warning_text'];
    $success_title = $instance['success_title'];
    $success_text = $instance['success_text'];
    $name_label = $instance['name_label'];
    $name_placeholder = $instance['name_placeholder'];
    $email_label = $instance['email_label'];
    $email_placeholder = $instance['email_placeholder'];
    $subject_label = $instance['subject_label'];
    $subject_placeholder = $instance['subject_placeholder'];
    $text_label = $instance['text_label'];
    $button_text = $instance['button_text'];
    $error_name = $instance['error_name'];
    $error_email = $instance['error_email'];
    $error_email_valid = $instance['error_email_valid'];
    $error_subject = $instance['error_subject'];
    $error_message = $instance['error_message'];
    $error_length = $instance['error_length'];

    $errors = array();
    $isError = false;

    /* Get the posted values and validate them */
    if ( isset( $_POST[ 'is-submitted' ] ) ) {
      $name = $_POST[ 'cName' ];
      $email = $_POST[ 'cEmail' ];
      $subject = $_POST[ 'cSubject' ];
      $message = $_POST[ 'cMessage' ];

      /* Check the name */
      if ( ! udsgn_validate_length( $name, 2 ) ) {
        $isError = true;
        $errors[ 'errorName' ] = $error_name;
      }

      /* Check email */
      if ( ! is_email( $email ) ) {
        $isError = true;
        $errors[ 'errorEmail' ] = $error_email;
      }

      /* Check the subject */
      if ( ! udsgn_validate_length( $subject, 2 ) ) {
        $isError = true;
        $errors[ 'errorSubject' ] = $error_subject;
      }

      /* Check the message */
      if ( ! udsgn_validate_length( $message, 2 ) ) {
        $isError = true;
        $errors[ 'errorMessage' ] = $error_message;
      }

      if (! $isError ) {
        /* Get admin email */
        $emailReceiver = get_option( 'admin_email' );

        $emailSubject = sprintf( '%1s - %2s', $name, $subject );
        $emailBody = sprintf( __( 'You have been contacted by %s. Their message is:', 'udsgn' ), $name ) . PHP_EOL . PHP_EOL;
        $emailBody .= $message . PHP_EOL . PHP_EOL;
        $emailBody .= sprintf( __( 'You can contact %1$s via email at %2$s', 'udsgn' ), $name, $email ) .PHP_EOL . PHP_EOL;

        $emailHeaders[] = "Reply-To: $email" . PHP_EOL;

        $emailIsSent = wp_mail ( $emailReceiver, $emailSubject, $emailBody, $emailHeaders );
      }
    }

    /* Display the markup before the widget */
    echo $before_widget;
    ?>

    <section id="form" class="pt-10 pb-5 bg-blue-110 text-light" data-menu-bg="bg-blue-110" data-menu-text="navbar-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <h3 class=""><?php echo $title; ?></h3>
            <p class="mb-2"><?php echo $subtitle; ?></p>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <?php if ( isset( $emailIsSent ) && $emailIsSent && isset($name) ) : ?>
              <div class="alert alert-light-theme alert-success" role="alert">
                <h3><?php printf( $success_title, $name ); ?></h3>
                <div>
                  <?php echo $success_text; ?>
                </div>
              </div>
            <?php elseif ( isset( $emailIsSent) && ! $emailIsSent ) : ?>
              <div class="alert alert-light-theme alert-warning" role="alert">
                <h3><?php echo $warning_title; ?></h3>
                <div>
                  <?php echo $warning_text; ?>
                </div>
              </div>
            <?php elseif ( isset( $isError ) && $isError ) : ?>
              <div class="alert alert-light-theme alert-danger" role="alert">
                <h3><?php echo $error_title; ?></h3>
                <div>
                  <?php echo $error_text; ?>
                </div>
              </div>
            <?php endif; ?>
            <form class="contact-form" action="<?php the_permalink(); ?>#form" method="post" name="contact-form" novalidate>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="contact-name"><?php echo $name_label; ?></label>
                  <input type="text" name="cName" class="form-control<?php if( isset( $errors[ 'errorName' ] ) ) echo ' is-invalid';?>" id="contact-name" placeholder="<?php echo $name_placeholder ?>" value="<?php if ( isset( $_POST[ 'cName' ] ) ) echo $_POST[ 'cName' ]; ?>" data-error-required="<?php echo $error_name; ?>" data-error-length="<?php echo $error_length; ?>"/>
                  <div class="invalid-feedback">
                    <?php if( isset( $errors[ 'errorName' ] ) ) echo $errors[ 'errorName' ]; ?>
                  </div>
                </div>
                <div class="form-group col-lg-6">
                  <label for="contact-email"><?php echo $email_label; ?></label>
                  <input type="email" name="cEmail" class="form-control<?php if( isset( $errors[ 'errorEmail' ] ) ) echo ' is-invalid';?>" id="contact-email" placeholder="<?php echo $email_placeholder ?>" value="<?php if ( isset( $_POST[ 'cEmail' ] ) ) echo $_POST[ 'cEmail' ]; ?>"  data-error-required="<?php echo $error_email; ?>" data-error-valid="<?php echo $error_email_valid; ?>"/>
                  <div class="invalid-feedback">
                    <?php if( isset( $errors[ 'errorEmail' ] ) ) echo $errors[ 'errorEmail' ]; ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="contact-subject"><?php echo $subject_label; ?></label>
                <input type="text" name="cSubject" class="form-control<?php if( isset( $errors[ 'errorSubject' ] ) ) echo ' is-invalid';?>" id="contact-subject" placeholder="<?php echo $subject_placeholder ?>" value="<?php if ( isset( $_POST[ 'cSubject' ] ) ) echo $_POST[ 'cSubject' ]; ?>"  data-error-required="<?php echo $error_subject; ?>" data-error-length="<?php echo $error_length; ?>"/>
                <div class="invalid-feedback">
                  <?php if( isset( $errors[ 'errorSubject' ] ) ) echo $errors[ 'errorSubject' ]; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="contact-message"><?php echo $text_label; ?></label>
                <textarea name="cMessage" class="form-control<?php if( isset( $errors[ 'errorSubject' ] ) ) echo ' is-invalid';?>" id="contact-message" rows="3" data-error-required="<?php echo $error_message; ?>" data-error-length="<?php echo $error_length; ?>"><?php if ( isset( $_POST[ 'cMessage' ] ) ) echo $_POST[ 'cMessage' ]; ?></textarea>
                <div class="invalid-feedback">
                  <?php if( isset( $errors[ 'errorMessage' ] ) ) echo $errors[ 'errorMessage' ]; ?>
                </div>
              </div>
              <input type="hidden" name="is-submitted" id="is-submitted" value="true" />
              <button type="submit" class="btn btn-outline-secondary"><?php echo $button_text; ?></button>
            </form> <!-- end form -->
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end section -->

    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Udsgn_Widget_Contact_Form') ) {
  function register_udsgn_widget_contact_form() {
    register_widget( "Udsgn_Widget_Contact_Form" );
  }
  add_action( 'widgets_init', 'register_udsgn_widget_contact_form' );
}
?>
