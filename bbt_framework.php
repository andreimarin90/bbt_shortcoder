<?php
/**
 * Plugin Name: BBT Framework
 * Plugin URI: http://bigbangthemes.com/
 * Description: BBTFramework plugin part (registers custom post types, shortcodes and other features of the theme required to be in a plugin)
 * Version: 1.1
 * Author: BigBangThemes
 * Author URI: http://bigbangthemes.com/
 * License: GPL2
 */
use Abraham\TwitterOAuth\TwitterOAuth;
define("BBT_PL_DIR", plugin_dir_path( __FILE__ ));
if(!class_exists('BBT_Custom_Posts')){
	require_once BBT_PL_DIR . 'custom_posts.php';
	add_action('after_setup_theme','bbt_custom_posts_plugin');
	function bbt_custom_posts_plugin(){
		BBT_Custom_Posts::init();
	}
}

if(!class_exists('BBT_Shortcoder')){
	require_once BBT_PL_DIR . 'bbt_shortcoder.php';
	add_action('after_setup_theme','bbt_shortcoder_plugin');
	function bbt_shortcoder_plugin(){
		BBT_Shortcoder::init();
	}
}

if(!function_exists('getConnectionWithAccessToken')){
	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		require BBT_PL_DIR . 'twitteroauth/autoload.php';
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
}