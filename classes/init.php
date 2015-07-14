<?php
/**
 * Initialize
 *
 * project	한글 맞춤법 검사기 - Korean Spell Checker!
 * version	3.0
 * Author: Sujin 수진 Choi
 * Author URI: http://www.sujinc.com/
 *
*/

if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

class KSC {
	private static $__instance;

	function __construct() {
		if ( is_admin() ) {
			add_action('init', array( KSC_MCE, 'add_button'));
			add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
		}
	}

	public function admin_enqueue_scripts() {
		wp_enqueue_style('KSC', KSC_ASSETS_URL . 'css/style.css');
	}

	/**
	 * initialize
	 *
	 * @since 3.0
	 * @access public
	 */
	public static function initialize(){
		KSC::getInstance();
	}

	/**
	 * Return Instance
	 *
	 * @since 3.0
	 * @access public
	 */
	public static function getInstance() {
		// check if instance is avaible
		if ( self::$__instance==null ) {
			// create new instance if not
			self::$__instance = new self();
		}
		return self::$__instance;
	}
}
