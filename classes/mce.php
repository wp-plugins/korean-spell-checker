<?php
/**
 * tinyMCE
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

class KSC_MCE {
	static public function add_button() {
		if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
			return false;

		if (get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", array( KSC_MCE, 'mce_external_plugins'));
			add_filter('mce_buttons', array( KSC_MCE, 'mce_buttons'));
		}
	}

	static public function mce_external_plugins($plugin_array) {
		$plugin_array['korean_spell'] = KSC_ASSETS_URL . 'script/korean-spell-checker.js';
		return $plugin_array;
	}

	public function mce_buttons($buttons) {
		array_push($buttons, "separator", "korean_spell");
		return $buttons;
	}
}
