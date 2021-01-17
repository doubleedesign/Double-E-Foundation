//@prepros-prepend foundation-components/foundation.core.js
//@prepros-prepend foundation-components/foundation.util.keyboard.js
//@prepros-prepend foundation-components/foundation.util.triggers.js
//@prepros-prepend foundation-components/foundation.util.mediaQuery.js
//@prepros-prepend foundation-components/foundation.util.box.js
//@prepros-prepend foundation-components/foundation.util.nest.js

//@prepros-prepend foundation-components/foundation.offCanvas.js
//@prepros-prepend foundation-components/foundation.accordionMenu.js
//@prepros-prepend foundation-components/foundation.accordion.js
//@prepros-prepend foundation-components/foundation.dropdownMenu.js

//@prepros-prepend vendor/what-input.min.js
//@prepros-prepend vendor/popper.js
//@prepros-prepend vendor/tippy.js
//@prepros-prepend vendor/fancybox.js
//@prepros-prepend vendor/owl.carousel.js

document.addEventListener('DOMContentLoaded', function() {
	"use strict";

	jQuery(document).foundation(); // Initialise Foundation

	initAnimation();
	initTippy();
	initResponsiveEmbeds();
	initMobileTopbar();

});

window.addEventListener('load', function() {
});

window.addEventListener('resize', function() {
});


/**
 * Add classes when stuff becomes visible
 * @uses inview.js
 * @uses jQuery
 * @see scss/layout/_layout-animation.scss
 */
function initAnimation() {
	jQuery('.animate').on('inview', function (event, isInView) {
		if (isInView) {
			jQuery(this).addClass('visible');
		} else {
			jQuery(this).off('inview'); // don't repeat
		}
	});
}


/**
 * Tippy tooltips
 */
function initTippy() {
	// Basic tooltips
	tippy('[data-tippy-content]', {
		// options can go here
	});

	// Profile tooltips with HTML in them
	var profileTooltips = document.querySelectorAll('.profile-tooltip');
	for (var i = 0; i < profileTooltips.length; i++) {

		// Remove click event from link
		profileTooltips[i].addEventListener('click', function (event) {
			event.preventDefault();
		});

		// Add Tippy tooltip
		tippy(profileTooltips[i], {
			content: profileTooltips[i].nextElementSibling.innerHTML,
			allowHTML: true,
			interactive: true,
			maxWidth: 300,
			arrow: true,
			placement: 'right',
			theme: 'profile-tooltip'
		});
	}
}


/**
 * Add responsive embed wrappers to YouTube and Vimeo
 * @type {NodeListOf<Element>}
 * @uses wrapThis()
 */
function initResponsiveEmbeds() {
	// Select all the embeds
	var embeds = document.querySelectorAll('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]'), i;

	// Define classes. Must be an array/object if sending multiple classes; can use a string if only sending one class
	var classes = ['responsive-embed', 'widescreen'];

	// Loop through all the embeds and run the wrapThis() function on each
	for (i = 0; i < embeds.length; i++) {
		wrapThis(embeds[i], 'div', classes);
	}
}


/**
 * Slide the mobile topbar menu
 * Remove this if mobile topbar isn't being used
 */
function initMobileTopbar() {

	jQuery('.title-bar .menu-icon').click(function () {
		jQuery('.mobile-topbar-menu').slideToggle(400);
	});
}



/**
 * Utility function to wrap an element
 * @param elementToWrap - selector of element to wrap
 * @param elementToUse - HTML tag to use for the wrapper
 * @param classes - class(es) to add; accepts string or array
 * @returns {Node | *}
 */
function wrapThis(elementToWrap, elementToUse, classes) {
	var wrapper = document.createElement(elementToUse);
	elementToWrap.parentNode.appendChild(wrapper);
	if(typeof(classes) == 'string') {
		wrapper.classList.add(classes);
	} else { // It's an array
		for (var i = 0; i < classes.length; i++) {
			wrapper.classList.add(classes[i]);
		}
	}
	return wrapper.appendChild(elementToWrap);
}