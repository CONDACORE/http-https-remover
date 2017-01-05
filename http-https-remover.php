<?php
/**
 * Plugin Name: HTTP / HTTPS Remover
 * Plugin URI: https://de.wordpress.org/plugins/http-https-remover/
 * Description: This Plugin removes HTTP and HTTPS protocols from all links.
 * Version: 1.2
 * Author: Marius Bolik (CONDACORE)
 * Author URI: https://condacore.com/
 * License: GPLv3
 */
 
 
#     _____ ____  _   _ _____          _____ ____  _____  ______ 
#    / ____/ __ \| \ | |  __ \   /\   / ____/ __ \|  __ \|  ____|
#   | |   | |  | |  \| | |  | | /  \ | |   | |  | | |__) | |__   
#   | |   | |  | | . ` | |  | |/ /\ \| |   | |  | |  _  /|  __|  
#   | |___| |__| | |\  | |__| / ____ \ |___| |__| | | \ \| |____ 
#    \_____\____/|_| \_|_____/_/    \_\_____\____/|_|  \_\______|
#


if (!defined('ABSPATH')) exit;
class HTTP_HTTPS_REMOVER

{
	// ###########################################
	// ##### Apply Plugin on the whole Site ######
	// ###########################################
	public function __construct()

	{
		add_action('wp_loaded', array(
			$this,
			'letsGo'
		) , 99, 1);
	}
	// #########################
	// ##### More Code... ######
	// #########################
	public function letsGo()

	{
		global $pagenow;
		ob_start(array(
			$this,
			'mainPath'
		));
	}
	public function mainPath($buffer)

	{
		$content_type = NULL;
		foreach(headers_list() as $header) {
			if (strpos(strtolower($header) , 'content-type:') === 0) {
				$pieces = explode(':', strtolower($header));
				$content_type = trim($pieces[1]);
				break;
			}
		}
		if (is_null($content_type) || substr($content_type, 0, 9) === 'text/html') {
			// ###############################
			// ##### The important Path ######
			// ###############################
			// href
			$buffer = str_replace('href=\'https://' . $_SERVER['HTTP_HOST'], 'href=\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('href="https://' . $_SERVER['HTTP_HOST'], 'href="//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('href=\'http://' . $_SERVER['HTTP_HOST'], 'href=\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('href="http://' . $_SERVER['HTTP_HOST'], 'href="//' . $_SERVER['HTTP_HOST'], $buffer);
			// src
			$buffer = str_replace('src=\'https://' . $_SERVER['HTTP_HOST'], 'src=\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('src="https://' . $_SERVER['HTTP_HOST'], 'src="//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('src=\'http://' . $_SERVER['HTTP_HOST'], 'src=\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('src="http://' . $_SERVER['HTTP_HOST'], 'src="//' . $_SERVER['HTTP_HOST'], $buffer);
			// content
			$buffer = str_replace('content=\'https://' . $_SERVER['HTTP_HOST'], 'content=\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('content="https://' . $_SERVER['HTTP_HOST'], 'content="//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('content=\'http://' . $_SERVER['HTTP_HOST'], 'content=\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('content="http://' . $_SERVER['HTTP_HOST'], 'content="//' . $_SERVER['HTTP_HOST'], $buffer);
			// url
			$buffer = str_replace('url(\'https://' . $_SERVER['HTTP_HOST'], 'url(\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('url("https://' . $_SERVER['HTTP_HOST'], 'url("//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('url(\'http://' . $_SERVER['HTTP_HOST'], 'url(\'//' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('url("http://' . $_SERVER['HTTP_HOST'], 'url("//' . $_SERVER['HTTP_HOST'], $buffer);
			// loaderUrl
			$buffer = str_replace('https:\/\/' . $_SERVER['HTTP_HOST'], '\/\/' . $_SERVER['HTTP_HOST'], $buffer);
			$buffer = str_replace('http:\/\/' . $_SERVER['HTTP_HOST'], '\/\/' . $_SERVER['HTTP_HOST'], $buffer);
			// Google URLs
			$buffer = str_replace('https://fonts.googleapis.com', '//fonts.googleapis.com', $buffer);
			$buffer = str_replace('http://fonts.googleapis.com', '//fonts.googleapis.com', $buffer);
			$buffer = str_replace('https://maps.googleapis.com', '//maps.googleapis.com', $buffer);
			$buffer = str_replace('http://maps.googleapis.com', '//maps.googleapis.com', $buffer);
			$buffer = str_replace('https://ajax.googleapis.com', '//ajax.googleapis.com', $buffer);
			$buffer = str_replace('http://ajax.googleapis.com', '//ajax.googleapis.com', $buffer);
			$buffer = str_replace('https://storage.googleapis.com', '//storage.googleapis.com', $buffer);
			$buffer = str_replace('http://storage.googleapis.com', '//storage.googleapis.com', $buffer);
			// Fix for visible links
			$buffer = str_replace('>http://' . $_SERVER['HTTP_HOST'], '>https://' . $_SERVER['HTTP_HOST'], $buffer);
		}
		return $buffer;
	}
}
new HTTP_HTTPS_REMOVER();
