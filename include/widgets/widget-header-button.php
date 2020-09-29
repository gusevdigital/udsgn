<?php
/**
 * widget-header-button.php
 *
 * Plugin Name: Udsgn_Widget_Header_Button
 * Plugin URI: http://gusevdigital.com
 * Description: A widget that controls content of button in Header.
 * Version: 1.0
 * Author: Denis Gusev
 * Author URI: http://gusevdigital.com
*/

class Udsgn_Widget_Header_Button extends WP_Widget {

  /* Widget name, description, class name. */
  /* Initialize the widget. */
  public function __construct() {

    parent::__construct(
      /* id */
      'udsgn-header-button',
      /* title */
      __( 'Header - Button', 'udsgn' ),
      array(
        'classname' => 'udsgn-header-button',
        'description' => __( 'A widget that controls the button in the Header.', 'udsgn' )
      )
    );
  }

  /* Generate the back-end layout for the widget. */
  /* Check this layout out on the Widgets page */
  public function form( $instance ) {
      /* Defaults */
      $defaults = array(
        'title' => 'Get Pricelist',
        'link' => '#'
      );

      $instance = wp_parse_args ( (array) $instance, $defaults );?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:', 'udsgn' ); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo esc_attr( $instance['link'] ); ?>">
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
    $instance['link'] = ( !empty( $new_instance['link'] ) ) ?  esc_url( strip_tags( stripslashes( $new_instance['link'] ) ) ) : '';

    return $instance;
  }

  /* Output the content of the widget */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = $instance[ 'title' ];
    $link = $instance[ 'link' ];


    /* Display the markup before the widget */
    echo $before_widget;
    ?>

    <a role="button" target="_blank" class="btn btn-sm btn-secondary" title="<?php echo $title; ?>" href="<?php echo $link; ?>"><?php echo $title; ?></a>

    <?php

    echo $after_widget;
  }
}


/* Register the widget and load it */
if( class_exists('Udsgn_Widget_Header_Button') ) {
  function register_udsgn_widget_header_button() {
    register_widget( "Udsgn_Widget_Header_Button" );
  }
  add_action( 'widgets_init', 'register_udsgn_widget_header_button' );
}
?>
