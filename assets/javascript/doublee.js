$(document).ready(function() {
	
	"use strict";
	
	// Initialise Foundation
    jQuery(document).foundation();
	
	// Add Flex Video classes to YouTube and Vimeo. Thanks FoundationPress
	jQuery( 'iframe[src*="youtube.com"]').wrap("<div class='flex-video widescreen'/>");
	jQuery( 'iframe[src*="vimeo.com"]').wrap("<div class='flex-video widescreen vimeo'/>");
	
	// Add slide animation to topbar dropdown menu
	$('#site-navigation ul li.is-dropdown-submenu-parent').hover(function() {
		$(this).children('ul.dropdown.menu').animate({
			height: 'toggle'
		}, 400);
	});
		
});

// Sticky Footer - thanks FoundationPress
$(window).bind(' load resize orientationChange ', function () {
 	"use strict";
	
	var footer = $("#footer-container");
	var pos = footer.position();
	var height = $(window).height();
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