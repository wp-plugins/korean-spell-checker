<?php
class sjKoreanSpellChecker {
	static $instance = false;
	private $text_domain = 'korean-spell-checker';
	private $debug = true;

	protected function __construct() {
		$this->trigger_hooks();
	}

	public static function getInstance() {
		if (!self::$instance)
			self::$instance = new self;

		return self::$instance;
	}

	private function trigger_hooks() {
		add_action('init', array(&$this, 'add_korean_spell_button'));
		add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
	}

	public function admin_enqueue_scripts() {
		wp_enqueue_style('sujin_korean_spell', plugin_dir_url( __FILE__ ) . 'style.css');
	}

	public function add_korean_spell_button() {
		if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
			return false;
		
		if (get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", array(&$this, 'mce_external_plugins'));
			add_filter('mce_buttons', array(&$this, 'mce_buttons'));
		}
	}

	public function mce_external_plugins($plugin_array) {
		$plugin_array['korean_spell'] = plugin_dir_url( __FILE__ ).'korean-spell-checker.js';
		return $plugin_array;
	}

	public function mce_buttons($buttons) {
		array_push($buttons, "separator", "korean_spell");
		return $buttons;
	}

	private function redirect($url) {
		if (!$url) $url = $_SERVER['HTTP_REFERER'];

		echo '<script>window.location="' . $url . '"</script>';
		die;
	}

	private function debug($array) {
		$style = ($this->debug == false) ? 'style="display:none;"' : '';
		echo '<pre ' . $style . '>';
		print_r($array);
		echo '</pre>';
	}
}

$sjKoreanSpellChecker = sjKoreanSpellChecker::getInstance();