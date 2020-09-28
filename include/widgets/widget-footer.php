<?php
/**
 * widget-footer.php
 *
 * Plugin Name: Udsgn_Widget_Footer
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that controls content of footer.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Udsgn_Widget_Footer extends WP_Widget {

  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {

    parent::__construct(
      /* id */
      'udsgn-footer',
      /* title */
      __( 'Footer', 'udsgn' ),
      array(
        'classname' => 'udsgn-footer',
        'description' => __( 'A widget that controls content of footer..', 'udsgn' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => 'Order Design Today!',
        'button-text' => 'Get in touch',
        'instagram-url' => '#',
        'whatsapp-url' => '#',
        'telegram-url' => '#',
        'behance-url' => '#',

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
      <p>
        <label for="<?php echo $this->get_field_id( 'instagram-url' ); ?>"><?php _e( 'Instagram link:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram-url' ); ?>" name="<?php echo $this->get_field_name( 'instagram-url' ); ?>" value="<?php echo esc_attr( $instance['instagram-url'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'whatsapp-url' ); ?>"><?php _e( 'Whatsapp link:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'whatsapp-url' ); ?>" name="<?php echo $this->get_field_name( 'whatsapp-url' ); ?>" value="<?php echo esc_attr( $instance['whatsapp-url'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'telegram-url' ); ?>"><?php _e( 'Telegram link:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'telegram-url' ); ?>" name="<?php echo $this->get_field_name( 'telegram-url' ); ?>" value="<?php echo esc_attr( $instance['telegram-url'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'behance-url' ); ?>"><?php _e( 'Behance link:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'behance-url' ); ?>" name="<?php echo $this->get_field_name( 'behance-url' ); ?>" value="<?php echo esc_attr( $instance['behance-url'] ); ?>">
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
    $instance['instagram-url'] = ( !empty( $new_instance['instagram-url'] ) ) ? esc_url( strip_tags( stripslashes( $new_instance['instagram-url'] ) ) ) : '';
    $instance['whatsapp-url'] = ( !empty( $new_instance['whatsapp-url'] ) ) ? esc_url( strip_tags( stripslashes( $new_instance['whatsapp-url'] ) ) ) : '';
    $instance['telegram-url'] = ( !empty( $new_instance['telegram-url'] ) ) ? esc_url( strip_tags( stripslashes( $new_instance['telegram-url'] ) ) ) : '';
    $instance['behance-url'] = ( !empty( $new_instance['behance-url'] ) ) ? esc_url( strip_tags( stripslashes( $new_instance['behance-url'] ) ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = $instance[ 'title' ];
    $button_text = $instance[ 'button-text' ];
    $instagram_url = $instance['instagram-url'];
    $whatsapp_url =$instance['whatsapp-url'];
    $telegram_url = $instance['telegram-url'];
    $behance_url = $instance['behance-url'];


    /* Display the markup before the widget */
    echo $before_widget;
    ?>

    <footer class="py-10 bg-pink-20 text-center">
      <h2><?php echo $title; ?></h2>
      <a href="<?php echo esc_url( get_page_link( 13 ) ); ?>" title="Get in touch" class="btn btn-lg btn-outline-primary"><?php echo $button_text; ?></a>
      <ul class="list-inline socials">
        <li class="list-inline-item">
          <a class="instagram" href="<?php echo $instagram_url; ?>" target="_blank" title="Follow me on Instagram">
            <img src="<?php echo ICONS . '/instagram.svg'; ?>" />
          </a>
        </li>
        <li class="list-inline-item">
          <a class="whatsapp" href="<?php echo $whatsapp_url; ?>" target="_blank" title="Write me in WhatsAppp">
            <img src="<?php echo ICONS . '/whatsapp.svg'; ?>" />
          </a>
        </li>
        <li class="list-inline-item">
          <a class="telegram" href="<?php echo $telegram_url; ?>" target="_blank" title="Write me in Telegram">
            <img src="<?php echo ICONS . '/telegram.svg'; ?>" />
          </a>
        </li>
        <li class="list-inline-item">
          <a class="behance" href="<?php echo $behance_url; ?>" target="_blank" title="Follow me on Behance">
            <img src="<?php echo ICONS . '/behance.svg'; ?>" />
          </a>
        </li>
      </ul>
      <div class="copyright">
        <?php
          echo '@ ' . date("Y") . ' ' . get_bloginfo( 'name' );
        ?>
      </div>
    </footer>

    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Udsgn_Widget_Footer') ) {
  function register_udsgn_widget_home_footer() {
    register_widget( "Udsgn_Widget_Footer" );
  }
  add_action( 'widgets_init', 'register_udsgn_widget_home_footer' );
}
?>
