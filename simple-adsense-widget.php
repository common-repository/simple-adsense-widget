<?php
/*
Plugin Name: Simple AdSense widget
Plugin URI: https://carlconrad.net/wordpress/plugins/
Description: This plug-in is designed to help you to display AdSense banners in your widgets.
Version: 0.3.4
Author: Carl Conrad
Author URI: https://carlconrad.net
License: GPL2
Text Domain: simple-adsense-widget
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once( 'include/settings.php' );
require_once( 'include/actions.php' );
// require_once( 'include/amp.php' );
if (  get_option( 'simpleadsensewidget_adsense_id' ) ) {
	require_once( 'include/widget.php' );
}

if ( is_admin() ){
	add_action( 'admin_menu' , 'simpleadsensewidget_options_page' );
	add_action( 'admin_init' , 'simpleadsensewidget_register_settings' );
}
else {
	if (  get_option( 'simpleadsensewidget_adsense_id' ) ) {
//		add_action( 'wp_head', 'simpleadsensewidget_header_scripts' );
		add_action( 'wp_head', 'simpleadsensewidget_write_header' );
	}
	add_shortcode( 'simpleadsense' , 'simpleadsensewidget_shortcode' );
//	add_action( 'amp_post_template_head', 'simple_adsense_amp_header' );
}
