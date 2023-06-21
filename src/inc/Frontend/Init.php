<?php


/**
 * Plugin Name: CookieCons by STechBD.Net
 * Plugin URI: https://project.stechbd.net/cookiecons/
 * Description: Socialite is a powerful WordPress plugin that allows users to integrate social media login.
 * Version: 1.0.0
 * Version Code: 1
 * Author: S Technologies Limited
 * Author URI: https://www.stechbd.net
 * Author Email: product@stechbd.net
 * Created: June 17, 2023
 * Updated: June 21, 2023
 */


namespace STechBD\CookieCons\Frontend;

/**
 * The admin panel class file.
 */
class Init
{
	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));

		new Notice();
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue_scripts(): void
	{
		wp_enqueue_style('stechbd-cookiecons-style', ST_COOKIECONS_CSS . 'stechbd-cookiecons.css');
		wp_enqueue_script('stechbd-cookiecons-script', ST_COOKIECONS_JS . 'stechbd-cookiecons.js', array('jquery'), '1.0', true);
	}
}
