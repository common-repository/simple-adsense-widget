<?php
/* AMP management */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function simple_adsense_amp_display_above( $adsense_slot ) {
	if (  $simpleadsensewidget_adsense_id = get_option( 'simpleadsensewidget_adsense_id' ) )
		echo '<amp-ad layout="fixed-height" height=100 type="adsense" data-ad-client="'. esc_attr( $simpleadsensewidget_adsense_id ) .'" data-ad-slot="'. esc_attr( $adsense_slot ) .'"></amp-ad>';
	return;
}

function simple_adsense_amp_display_below( $adsense_slot ) {
	if (  $simpleadsensewidget_adsense_id = get_option( 'simpleadsensewidget_adsense_id' ) )
		echo '<amp-ad layout="responsive" width=300 height=250 type="adsense" data-ad-client="'. esc_attr( $simpleadsensewidget_adsense_id ) .'" data-ad-slot="'. esc_attr( $adsense_slot ) .'"></amp-ad>';
	return;
}

function simple_adsense_amp_header() {
	echo '<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>';
	return;
}