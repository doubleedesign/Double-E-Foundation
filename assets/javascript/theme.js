//@prepros-prepend foundation.js
//@prepros-prepend vendor/what-input.min.js
//@prepros-prepend vendor/swipebox.js
//@prepros-prepend vendor/tippy.js

// If using Owl Carousel, prepend that too (or enqueue it in functions/setup/enqueue-scripts.php)
// InView is enqueued separately, due to issues in IE < Edge (so it's not used in those browsers by default)
// Loads ALL of the Foundation JS by default. When practical, prepend only the components actually needed to reduce file size and load time.

/*=======================================
	FUNCTIONS
=======================================*/
/**
 * Wrap an element
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
};


/**
 * Multi-column long lists
 * Adds .dual-column class to the specified list element (ul or ol) when they have more than the specified number of list items
 * @param selectedList - selector of lists to run the function on. Expects an array (i.e. use querySelectorAll)
 * @param lengthToBreakAt - how many list items there should be before adding dual-column class
 * @see scss/components/_typography.scss
 */
function multiColumnList(selectedList, lengthToBreakAt) {
	var selector = selectedList;
	for (var i = 0; i < selector.length; i++) {
		var listItems = selector[i].querySelectorAll('li');
		// If there's more than the specified number of list items, apply dual-column class to the list
		if(listItems.length > lengthToBreakAt) {
			selector[i].classList.add('dual-column');
			// If there isn't, apply .single-column class to the list's parent
		} else {
			var selectorParent = selector[i].parentNode;
			selectorParent.classList.add('single-column');
		}
	}
}


/*=======================================
	ON DOCUMENT READY
=======================================*/
document.addEventListener('DOMContentLoaded', function() {
	
	"use strict";

	/**
	 * Initialise Foundation
	 * @uses jQuery
	 */
	jQuery(document).foundation();


	/**
	 * Add responsive embed wrappers to YouTube and Vimeo
	 * @type {NodeListOf<Element>}
	 * @uses wrapThis()
	 */
		// Select all the embeds
	var embeds = document.querySelectorAll('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]'), i;
	// Define classes. Must be an array/object if sending multiple classes; can use a string if only sending one class
	var classes = ['responsive-embed', 'widescreen'];
	// Loop through all the embeds and run the wrapThis() function on each
	for (i = 0; i < embeds.length; i++) {
		wrapThis(embeds[i], 'div', classes);
	}


	/**
	 * Add classes when stuff becomes visible
	 * Note: inview does not load in IE because the animations are too jittery. No animation for you, IE users.
	 * .layout-animations-supported is added to the body of non-IE browsers.
	 * @uses inview.js
	 * @uses jQuery
	 * @see scss/layout/_layout-animation.scss
	 */
	jQuery('.layout-animations-supported .animate').on('inview', function(event, isInView) {
		if (isInView) {
			jQuery(this).addClass('visible');
			jQuery(this).removeClass('not-yet-visible');
		} else {
			jQuery(this).off('inview'); // don't repeat
		}
	});

		/**
	 * Remove animation classes in IE
	 */
	if(document.body.classList.contains('ie')) {

		var animated = document.getElementsByClassName('.animate');
		var notYetVisible = document.getElementsByClassName('.not-yet-visible');

		var i = 0;
		if (animated.length > 0) {
			for (i = 0; i < animated.length; i++) {
				animated[i].classList.remove('animated');
			}
		}
		if (notYetVisible.length > 0) {
			for (i = 0; i < notYetVisible.length; i++) {
				notYetVisible[i].classList.remove('not-yet-visible');
			}
		}
	}


	/**
	 * Smooth scrolling for same-page anchor links
	 * Vanilla version, only works on good browsers
	 */
	document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
		anchor.addEventListener('click', function(e) {
			e.preventDefault();
			document.querySelector(this.getAttribute('href')).scrollIntoView({
				behavior: 'smooth'
			});
		});
	});


	/**
	 * Slide the mobile topbar menu
	 * Remove this if mobile topbar isn't being used
	 */
	jQuery('.title-bar .menu-icon').click(function() {
		jQuery('#site-navigation').slideToggle(400);
	});


	/**
	 * Owl Carousel image carousels
	 * @uses jQuery
	 */
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 0,
		nav: false,
		items: 1,
		autoplay: true,
		animateOut: 'fadeOut'
	})
	/* WooCommerce example
	jQuery('.woocommerce-product-gallery__wrapper.owl-carousel').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		lazyLoad: true,
		autoplay: true,
		responsive:{
			0:{
				items: 2,
				slideBy: 2,
				dotsEach: 2,
			},
			640:{
				items: 4,
				slideBy: 4,
				dotsEach: 4,
			},
		}
	})
	*/

	/**
	 * Swipebox image lightbox
	 * http://brutaldesign.github.io/swipebox/
	 * @uses jQuery
	 */
	if ($('.gallery').length) {
		// Add swipebox class to gallery links
		$('.gallery a').each(function() {
			$(this).attr('rel', 'gallery');
			$(this).addClass('swipebox');
		});
		// Options
		$('.swipebox' ).swipebox({
			useCSS : true, // false will force the use of jQuery for animations
			useSVG : true, // false to force the use of png for buttons
			initialIndexOnArray : 0, // which image index to init when a array is passed
			hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
			removeBarsOnMobile : false, // false will show top bar on mobile devices
			hideBarsDelay : 3000, // delay before hiding bars on desktop
			videoMaxWidth : 1140, // video max width
			beforeOpen: function() {}, // called before opening
			afterOpen: null, // called after opening
			afterClose: function() {}, // called after closing
			loopAtEnd: true // true will return to the first image after the last image is reached
		});
	}

});

/*=======================================
	ON WINDOW LOAD
=======================================*/
window.addEventListener('load', function() {
	// Do stuff here
});

/*=======================================
	ON WINDOW RESIZE
=======================================*/
window.addEventListener('resize', function() {
	// Do stuff here
});
