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
 * Created: June 15, 2023
 * Updated: June 16, 2023
 */


namespace STechBD\CookieCons\Admin;

/**
 * The admin page class file.
 */
class Settings
{
	/**
	 * Settings page.
	 * @return void
	 */
	public function settings_page(): void
	{
		require_once ST_COOKIECONS_ADMIN . 'View/Settings.php';
	}

	/**
	 * Form handler.
	 * @return void
	 */
	public function form_handler(): void
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitNotice']))
		{
			if(!wp_verify_nonce($_POST['_wpnonce'], 'stechbd-cookiecons'))
			{
				wp_die('<h1>CookieCons by STechBD.Net</h1><p>Access denied for security reasons.</p>', 'CookieCons Error');
			}

			if(!current_user_can('manage_options'))
			{
				wp_die('<h1>CookieCons by STechBD.Net</h1><p>Access denied for security reasons.</p>', 'CookieCons Error');
			}

			$notice = get_option('stechbd_cookiecons_notice');
			$noticeVal = wp_unslash($_POST['notice']);

			if(!empty($noticeVal))
			{
				if($notice === $noticeVal)
				{
					add_settings_error('stechbd-cookiecons', 'error', 'Same notice already exists!');
				}
				else
				{
					update_option('stechbd_cookiecons_notice', $noticeVal);
					add_settings_error('stechbd-cookiecons', 'success', 'Notice updated successfully!', 'updated');
				}
			}
			else
			{
				add_settings_error('stechbd-cookiecons', 'error', 'Please insert a value!');
			}
		}
	}
}