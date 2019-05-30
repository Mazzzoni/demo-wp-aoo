<?php
namespace App\Ajax;

use Frast\AjaxHandler;

class MyAction extends AjaxHandler
{
	/** @var array I specify that my js script will need jQuery as a dependency */
	protected $dependencies = [
		'jquery',
	];

	static public function getAssetSrc(): string
	{
		return get_stylesheet_directory_uri() . '/assets/js/ajaxMyAction.js';
	}

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