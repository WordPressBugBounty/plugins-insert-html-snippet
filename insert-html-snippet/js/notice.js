	jQuery(document).ready(function() {
		jQuery('#xyz_ihs_system_notice_area').animate({
			opacity : 'show',
			height : 'show'
		}, 500);

		jQuery(document).on(
			'click',
			'#xyz_ihs_system_notice_area_dismiss',
			function () {
			jQuery('#xyz_ihs_system_notice_area').animate({
				opacity : 'hide',
				height : 'hide'
			}, 500);
			}
		  );
		jQuery('.xyz_ihs_up_button').on('click', function (e) {
			e.stopPropagation();
			var $button = jQuery(this);
			var $menu = jQuery('.xyz_ihs_menu_links');
			var isOpen = $menu.is(':visible');
			$menu.slideToggle(200);
			jQuery('body').toggleClass('xyz-ihs-menu-open', !isOpen);
			$button.attr('aria-expanded', !isOpen);
			$menu.attr('aria-hidden', isOpen);
		});
		jQuery(document).on('click', function (e) {
			if (!jQuery(e.target).closest('.xyz_ihs_quick_links').length) {
				jQuery('.xyz_ihs_menu_links').slideUp(150).attr('aria-hidden', true);
				jQuery('body').removeClass('xyz-ihs-menu-open');
				jQuery('.xyz_ihs_up_button').attr('aria-expanded', false);
			}
		});
		let ihs_deactivateURL = '';

		jQuery(document).on('click', '.xyz-ihs-deactivate-link', function(e) {
			e.preventDefault();
			ihs_deactivateURL = jQuery(this).attr('href');
			jQuery('#xyz-ihs-modal').fadeIn();
		});
		jQuery('#xyz-ihs-proceed-deactivate').on('click', function() {
			window.location.href = ihs_deactivateURL;
		});
		jQuery('#xyz-ihs-cancel-deactivate').on('click', function() {
			jQuery('#xyz-ihs-modal').fadeOut();
		});
	});
