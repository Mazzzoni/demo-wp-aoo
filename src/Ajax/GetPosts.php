<?php
# src/Ajax/GetPosts.php

namespace App\Ajax;

use Frast\AjaxHandler;

class GetPosts extends AjaxHandler
{
	protected $dependencies = [
		'jquery',
	];

	public function getAssetSrc(): string
	{
		return get_stylesheet_directory_uri() . '/assets/js/GetPosts.js';
	}

	public function treatment(): void
	{
		// You can also access Wordpress classes like WP_Query to fetch data
		$query = new \WP_Query(); // Don't forget the "\" before WP_Query since it lives in the global namespace
		$posts = $query->get_posts();

		wp_send_json([
			'posts' => $posts,
		], 200);
	}
}