/*
 * SimpleModal Contact Form
 * http://www.ericmmartin.com/projects/simplemodal/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2010 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: contact.js 254 2010-07-23 05:14:44Z emartin24 $
 */

var $po = jQuery.noConflict();

jQuery(function ($po) {
	var contact = {
		message: null,
		init: function () {
			$po('#contact-form input.contact, #contact-form a.contact').click(function (e) {
				e.preventDefault();

				// load the contact form using ajax
				$po.get("data/contact.php", function(data){
					// create a modal dialog with the data
					$po(data).modal({
						closeHTML: "<a href='#' title='Close' class='modal-close'>x</a>",
						position: ["15%",],
						overlayId: 'contact-overlay',
						containerId: 'contact-container',
						onOpen: contact.open,
						onShow: contact.show,
						onClose: contact.close
					});
				});
			});
		},
		open: function (dialog) {
			// add padding to the buttons in firefox/mozilla
			if ($po.browser.mozilla) {
				$po('#contact-container .contact-button').css({
					'padding-bottom': '2px'
				});
			}
			// input field font size
			if ($po.browser.safari) {
				$po('#contact-container .contact-input').css({
					'font-size': '.9em'
				});
			}

			// dynamically determine height
			var h = 280;
			if ($po('#contact-subject').length) {
				h += 26;
			}
			if ($po('#contact-cc').length) {
				h += 22;
			}

			var title = $po('#contact-container .contact-title').html();
			$po('#contact-container .contact-title').html('Loading...');
			dialog.overlay.fadeIn(200, function () {
				dialog.container.fadeIn(200, function () {
					dialog.data.fadeIn(200, function () {
						$po('#contact-container .contact-content').animate({
							height: h
						}, function () {
							$po('#contact-container .contact-title').html(title);
							$po('#contact-container form').fadeIn(200, function () {
								$po('#contact-container #contact-name').focus();

								$po('#contact-container .contact-cc').click(function () {
									var cc = $po('#contact-container #contact-cc');
									cc.is(':checked') ? cc.attr('checked', '') : cc.attr('checked', 'checked');
								});

								// fix png's for IE 6
								if ($po.browser.msie && $po.browser.version < 7) {
									$po('#contact-container .contact-button').each(function () {
										if ($po(this).css('backgroundImage').match(/^url[("']+(.*\.png)[)"']+$/i)) {
											var src = RegExp.$1;
											$po(this).css({
												backgroundImage: 'none',
												filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="' +  src + '", sizingMethod="crop")'
											});
										}
									});
								}
							});
						});
					});
				});
			});
		},
		show: function (dialog) {
			$po('#contact-container .contact-send').click(function (e) {
				e.preventDefault();
				// validate form
				if (contact.validate()) {
					var msg = $po('#contact-container .contact-message');
					msg.fadeOut(function () {
						msg.removeClass('contact-error').empty();
					});
					$po('#contact-container .contact-title').html('Sending...');
					$po('#contact-container form').fadeOut(200);
					$po('#contact-container .contact-content').animate({
						height: '80px'
					}, function () {
						$po('#contact-container .contact-loading').fadeIn(200, function () {
							$po.ajax({
								url: 'data/contact.php',
								data: $po('#contact-container form').serialize() + '&action=send',
								type: 'post',
								cache: false,
								dataType: 'html',
								success: function (data) {
									$po('#contact-container .contact-loading').fadeOut(200, function () {
										$po('#contact-container .contact-title').html('Thank you!');
										msg.html(data).fadeIn(200);
									});
								},
								error: contact.error
							});
						});
					});
				}
				else {
					if ($po('#contact-container .contact-message:visible').length > 0) {
						var msg = $po('#contact-container .contact-message div');
						msg.fadeOut(200, function () {
							msg.empty();
							contact.showError();
							msg.fadeIn(200);
						});
					}
					else {
						$po('#contact-container .contact-message').animate({
							height: '30px'
						}, contact.showError);
					}
					
				}
			});
		},
		close: function (dialog) {
			$po('#contact-container .contact-message').fadeOut();
			$po('#contact-container .contact-title').html('Goodbye...');
			$po('#contact-container form').fadeOut(200);
			$po('#contact-container .contact-content').animate({
				height: 40
			}, function () {
				dialog.data.fadeOut(200, function () {
					dialog.container.fadeOut(200, function () {
						dialog.overlay.fadeOut(200, function () {
							$po.modal.close();
						});
					});
				});
			});
		},
		error: function (xhr) {
			alert(xhr.statusText);
		},
		validate: function () {
			contact.message = '';
			if (!$po('#contact-container #contact-name').val()) {
				contact.message += 'Name is required. ';
			}
			
			if (!$po('#contact-container #contact-phone').val()) {
				contact.message += 'Phone is required. ';
			}

/*			var email = $po('#contact-container #contact-email').val();
			if (!email) {
				contact.message += 'Email is required. ';
			}
			else {
				if (!contact.validateEmail(email)) {
					contact.message += 'Email is invalid. ';
				}
			}*/

			if (!$po('#contact-container #contact-message').val()) {
				contact.message += 'Message is required.';
			}

			if (contact.message.length > 0) {
				return false;
			}
			else {
				return true;
			}
		},
		validateEmail: function (email) {
			var at = email.lastIndexOf("@");

			// Make sure the at (@) sybmol exists and  
			// it is not the first or last character
			if (at < 1 || (at + 1) === email.length)
				return false;

			// Make sure there aren't multiple periods together
			if (/(\.{2,})/.test(email))
				return false;

			// Break up the local and domain portions
			var local = email.substring(0, at);
			var domain = email.substring(at + 1);

			// Check lengths
			if (local.length < 1 || local.length > 64 || domain.length < 4 || domain.length > 255)
				return false;

			// Make sure local and domain don't start with or end with a period
			if (/(^\.|\.$)/.test(local) || /(^\.|\.$)/.test(domain))
				return false;

			// Check for quoted-string addresses
			// Since almost anything is allowed in a quoted-string address,
			// we're just going to let them go through
			

			// Make sure domain contains only valid characters and at least one period
			if (!/^[-a-zA-Z0-9\.]*$/.test(domain) || domain.indexOf(".") === -1)
				return false;	

			return true;
		},
		showError: function () {
			$po('#contact-container .contact-message')
				.html($po('<div class="contact-error"></div>').append(contact.message))
				.fadeIn(200);
		}
	};

	contact.init();

});