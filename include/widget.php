<?php
/* Widget management */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class simpleadsensewidget_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 
			'classname' => 'simpleadsensewidget_widget',
			'description' => __( 'Simple AdSense widget', 'simple-adsense-widget' ),
		);
		parent::__construct( 'simpleadsensewidget_widget', __('Simple AdSense widget', 'simple-adsense-widget'), $widget_ops );
	}

	public function widget( $args, $instance ) {
		$simpleadsensewidget_adsense_id = get_option( 'simpleadsensewidget_adsense_id' );
		if ( isset( $instance[ 'data-ad-slot' ] ) ) {
			echo $args['before_widget'];
			$data_ad_slot = $instance[ 'data-ad-slot' ];
			$widget = '<ins class="adsbygoogle" style="display:block" data-ad-client="'. esc_attr( $simpleadsensewidget_adsense_id ) .'" data-ad-slot="'. $instance[ 'data-ad-slot' ] .'" data-ad-format="auto" data-full-width-responsive="true"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';
			echo $widget;
			echo $args['after_widget'];
		}
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'data-ad-slot' ] ) ) {
			$data_ad_slot = $instance[ 'data-ad-slot' ];
		}
		echo '<p><label for="'.$this->get_field_id( 'data-ad-slot' ) .'">'. __( 'data-ad-slot:', 'simple-adsense-widget' ) .'</label>';
		echo '<input class="widefat" id="'.$this->get_field_id( 'data-ad-slot' ).'" name="'. $this->get_field_name( 'data-ad-slot' ) .'" type="text" value="'. esc_attr( $data_ad_slot ) .'" /></p>';
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['data-ad-slot'] = ( ! empty( $new_instance['data-ad-slot'] ) ) ? strip_tags( $new_instance['data-ad-slot'] ) : '';
		return $instance;
	}	
}

function simpleadsensewidget_load_widget() {
	register_widget( 'simpleadsensewidget_widget' );
}
add_action( 'widgets_init', 'simpleadsensewidget_load_widget' );