<?php
/* Resulting actions */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function simpleadsensewidget_header_scripts() {
	wp_enqueue_script('adsbygoogle','//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',TRUE);
	if (  $simpleadsensewidget_google_analytics_id = get_option( 'simpleadsensewidget_google_analytics_id' ) )
		echo '<script type="text/javascript">window.google_analytics_uacct = "'. esc_attr( $simpleadsensewidget_google_analytics_id ) .'";</script>';
	return;
}

function simpleadsensewidget_write_header() {
	$simpleadsensewidget_adsense_id = get_option( 'simpleadsensewidget_adsense_id' );
	echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';
	echo '<script>(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: "'. esc_attr( $simpleadsensewidget_adsense_id ) .'",enable_page_level_ads: true});</script>';
	if (  $simpleadsensewidget_google_analytics_id = get_option( 'simpleadsensewidget_google_analytics_id' ) )
		echo '<script type="text/javascript">window.google_analytics_uacct = "'. esc_attr( $simpleadsensewidget_google_analytics_id ) .'";</script>';
	return;
}

function simpleadsensewidget_shortcode( $atts ) {
	if (  $simpleadsensewidget_adsense_id = get_option( 'simpleadsensewidget_adsense_id' ) ) {
		$a = shortcode_atts( array(
			'data-ad-slot' => ''
			), $atts );
		$html = '<ins class="adsbygoogle" style="display:block" data-ad-client="'. esc_attr( $simpleadsensewidget_adsense_id ) .'" data-ad-slot="'. $a['data-ad-slot'] .'" data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';
	}
	return $html;
}
