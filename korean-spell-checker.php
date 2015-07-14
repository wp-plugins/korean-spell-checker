<?php
/**
 * Plugin Name: 한글 맞춤법 검사기 - Korean Spell Checker!
 * Plugin URI: http://www.sujinc.com/
 * Description: 워드프레스 리치 에디터에 한글 맞춤법 검사기로 바로 가는 버튼을 삽입합니다. 이제 쪽팔리게 맞춤법 틀리지 마세요. (저도 못하지만)
 * Version: 3.0
 * Author: Sujin 수진 Choi
 * Author URI: http://www.sujinc.com/
 * License: GPLv2 or later
 * Text Domain: korean-spell-checker
 */

if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

# Definitions
if ( !defined( 'KSC_PLUGIN_NAME' ) ) {
	$basename = trim( dirname( plugin_basename( __FILE__ ) ), '/' );
	if ( !is_dir( WP_PLUGIN_DIR . '/' . $basename ) ) {
		$basename = explode( '/', $basename );
		$basename = array_pop( $basename );
	}

	define( 'KSC_PLUGIN_NAME', $basename );

	if ( !defined( 'KSC_PLUGIN_BASE' ) )
		define( 'KSC_PLUGIN_BASE', WP_PLUGIN_DIR . '/' . KSC_PLUGIN_NAME . '/' . basename(__FILE__) );

	if ( !defined( 'KSC_PLUGIN_DIR' ) )
		define( 'KSC_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . KSC_PLUGIN_NAME );

	if ( !defined( 'KSC_CLASS_DIR' ) )
		define( 'KSC_CLASS_DIR', WP_PLUGIN_DIR . '/' . KSC_PLUGIN_NAME . '/classes/' );

	if ( !defined( 'KSC_VIEW_DIR' ) )
		define( 'KSC_VIEW_DIR', WP_PLUGIN_DIR . '/' . KSC_PLUGIN_NAME . '/views/' );

	if ( !defined( 'KSC_ASSETS_URL' ) )
		define( 'KSC_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
}

# Load Classes
include_once( KSC_CLASS_DIR . 'mce.php');
include_once( KSC_CLASS_DIR . 'init.php');

KSC::initialize();
