<?php
/* Options management */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function simpleadsensewidget_options_page() {
  add_options_page( 'Simple AdSense widget' , 'Simple AdSense widget' , 'manage_options' , 'simpleadsensewidget' , 'simpleadsensewidget_options_page_html' );
}

function simpleadsensewidget_options_page_html() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'simple-adsense-widget' ) );
	}
	echo '<div class="wrap">';
	echo '<h1>'.__('Your AdSense environment','simple-adsense-widget').'</h1>';
	echo '<form method="post" action="options.php">';
	settings_fields( 'simple-adsense-widget' );
	echo '<table>';
	echo '<tr>';
	echo '<td><label for="simpleadsensewidget_adsense_id">'.__('Your AdSense ID:','simple-adsense-widget').' </td>';
	echo '<td><input name="simpleadsensewidget_adsense_id" type="text" size="25" id="simpleadsensewidget_adsense_id" value="'. esc_attr( get_option( 'simpleadsensewidget_adsense_id' ) ) .'" /></label></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><label for="simpleadsensewidget_google_analytics_id">'.__('Your Google Analytics ID:','simple-adsense-widget').' </td>';
	echo '<td><input name="simpleadsensewidget_google_analytics_id" type="text" size="25" id="simpleadsensewidget_google_analytics_id" value="'. esc_attr( get_option( 'simpleadsensewidget_google_analytics_id' ) ) .'" /></label></td>';
	echo '</tr>';
	echo '</table>';
	submit_button();
	echo '</form>';
	echo '</div>';
}

function simpleadsensewidget_register_settings() {
	register_setting( 'simple-adsense-widget', 'simpleadsensewidget_adsense_id', 'simpleadsensewidget_options_sanitize_text_field' );
	register_setting( 'simple-adsense-widget', 'simpleadsensewidget_google_analytics_id', 'simpleadsensewidget_options_sanitize_text_field' );
}

function simpleadsensewidget_options_sanitize_text_field( $input ) {
	$input = sanitize_text_field( $input );
	return $input;
}