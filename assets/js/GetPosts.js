// assets/js/GetPosts.js

jQuery(document).ready(function () {
	jQuery.ajax({
		url: WP_ADMIN_AJAX,
		data: {
			action: 'GetPosts',
			nonce: GetPostsNonce,
		},
		success: function (response) {
			console.log(response);
		},
	});
});