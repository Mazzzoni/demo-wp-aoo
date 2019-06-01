<?php
# src/Ajax/MyAction.php

namespace App\Ajax;

use Frast\AjaxHandler;

class MyAction extends AjaxHandler
{
	/** @var array I specify that my js script will need jQuery as a dependency */
	protected $dependencies = [
		'jquery',
	];

	/**
	 * Based on the return value, it will enable or not the ajax action
	 */
	public function conditions(): bool
	{
		// You can also access Wordpress functions from here
		$canLoad = is_home();

		return $canLoad;
	}

	/**
	 * Return the path of the javascript file binded to the action
	 */
	public function getAssetSrc(): string
	{
		return get_stylesheet_directory_uri() . '/assets/js/ajaxMyAction.js';
	}

	/**
	 * How the action is going to handle the requests
	 */
	public function treatment(): void
	{
		// Do your stuff here, don't forget to sanitize user inputs in real case scenario
		$username = $_POST['username'];

		// JSON Response sent back
		wp_send_json([
			'message' => "Hello {$username} !",
		], 200);
	}
}