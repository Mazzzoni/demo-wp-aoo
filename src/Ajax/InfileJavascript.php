<?php
# src/Ajax/InfileJavascript.php

namespace App\Ajax;

use Frast\AjaxHandler;

/**
 * I wouldn't recommend doing it this way because javascript should
 * stay in your javascripts, this can become quite a mess, and you can't
 * minify your js this way.
 * Depending on your editor you won't have auto-completion aswell.
 * 
 * I don't recommend this way of doing, use it only if you really want it
 */
class InfileJavascript extends AjaxHandler
{
	public function getAssetSrc(): string
	{
		return ''; // Return an empty string to use infile javascript instead
	}

	public function treatment(): void
	{
		wp_send_json([
			'message' => "Hello infile javascript",
		], 200);
	}

	/**
	 * You can return your javascript from here if wou want to substitute a js file
	 */
	public function javascript(): string
	{
		return "<script>
			console.log('This is injected from src/Ajax/InfileJavascript.php');

			jQuery(document).ready(function () {
				jQuery.ajax({
					url: WP_ADMIN_AJAX,
					method: 'POST',
					data: {
						action: 'InfileJavascript',
						nonce: nonceInfileJavascript,
					},
					success: function (response) {
						console.log(response);
					},
				});
			});
		</script>";
	}
}