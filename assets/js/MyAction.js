// assets/js/MyAction.js

jQuery(document).ready(function () {
	// console.log(WP_ADMIN_AJAX);
	// console.log(nonceMyAction);

	jQuery.ajax({
		url: WP_ADMIN_AJAX, // This is globally available, it resolves to the admin ajax url
		method: 'POST',
		data: {
			// The action must be the same as the name of your php class
			action: 'MyAction',
			// For security reason, you must specify the nonce created for your php class
			// You can get it by suffixing "nonce" to your php class, like so
			nonce: MyActionNonce,
			// Then send whatever data you like
			username: 'Stranger',
		},
		success: function (response) {
			console.log(response);
		},
	});
});