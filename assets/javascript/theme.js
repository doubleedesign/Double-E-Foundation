//@prepros-prepend foundation.js
//@prepros-prepend vendor/what-input.min.js

jQuery(document).ready(function() {
	
	"use strict";
	
	// Initialise Foundation
      jQuery(document).foundation();
	
	// Add Flex Video classes to YouTube and Vimeo. Thanks FoundationPress
	jQuery( 'iframe[src*="youtube.com"]').wrap("<div class='responsive-embed widescreen'/>");
	jQuery( 'iframe[src*="vimeo.com"]').wrap("<div class='responsive-embed widescreen vimeo'/>");
	
	// Slide the mobile topbar menu
	jQuery('.title-bar .menu-icon').click(function() {
		jQuery('#site-navigation').slideToggle(400);
	});
	
	// Fading dropdowns
	$(function() {
		$('body[data-whatinput="mouse"] #top-bar ul').find('ul').show().hide();
		$('#top-bar ul > li').hover(function() {
			$(this).children('ul').stop().fadeIn(300);
		}, function() {
			$(this).children('ul').stop().fadeOut('fast');
		});
	});
		
});

// Sticky Footer - thanks FoundationPress
jQuery(window).bind(' load resize orientationChange ', function () {
 	"use strict";
	
	var footer = jQuery("#footer-container");
	var pos = footer.position();
	var height = jQuery(window).height();
	height = height - pos.top;
	height = height - footer.height() -1;

	function stickyFooter() {
	 footer.css({
		 'margin-top': height + 'px'
	 });
	}

	if (height > 0) {
	 stickyFooter();
	}
});
