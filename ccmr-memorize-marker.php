<?php
/**
 * Plugin Name: Ccmr-memorize-marker
 * Version: 1.0.0
 * Description: Markers for memorization to blog can be attached to. 
 * Author: as_chachamaru
 * Author URI: http://memories.zal.jp/
 * Plugin URI: 
 * Text Domain: ccmr-memorize-marker
 * Domain Path: /languages
 * @package Ccmr-memorize-marker
 */
Class CCmrMemoriesMarker
{
	const markerTagFormat = 
		'<span class="ccmr-marker"><span class="ccmr-hide active"></span>%s</span>';
	
	function __construct() {
		add_action( 'init', array($this , 'add_short_code'));
		add_action( 'wp_enqueue_scripts', array($this , 'add_css'));
		add_action( 'wp_enqueue_scripts', array($this , 'add_js'));
	}

	/**
	 * Get this plugin root url
	 *
	 * @return url
	 */
	private function get_plugin_url(){
		static $ret = '';
		if('' !== $ret){
			return $ret;
		}
		$ret = plugins_url( dirname(plugin_basename( __FILE__ )) );
		return $ret;
	}

	/**
	 * Get this plugin css dir url
	 *
	 * @return url
	 */
	private function get_plugin_css_base_url(){
		return $this->get_plugin_url() . '/css/';
	}

	/**
	 * Get this plugin javascript dir url
	 *
	 * @return url
	 */
	private function get_plugin_js_base_url(){
		return $this->get_plugin_url() . '/js/';
	}

	/**
	 * Add short code
	 *
	 * @return void
	 */
	public function add_short_code(){
		add_shortcode('ccmr-marker', array($this , 'add_ccmr_marker'));
	}

	public function add_ccmr_marker($atts, $content = ''){
		return sprintf(self::markerTagFormat , $content);
	}

	/**
	 * Add css
	 *
	 * @return void
	 */
	public function add_css(){
		$url = $this->get_plugin_css_base_url() . 'ccmr-marker.css';
		wp_enqueue_style( 'ccmr-marker', $url );
	}

	/**
	 * Add javascript
	 *
	 * @return void
	 */
	public function add_js(){
		$url = $this->get_plugin_js_base_url() . 'ccmr-marker.js';
		wp_enqueue_script( 'ccmr-marker', $url , array('jquery') , null , true);
	}
}
new CCmrMemoriesMarker();