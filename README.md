## Hi there!

This is a starter WordPress theme that uses the Zurb Foundation 6 front-end framework.

__Demo:__ Updated demo coming soon.

## Features 

* Style Guide page template</strong> containing core elements such as headings, paragraphs, lists, tables, forms, callouts/messages, buttons and pagination. I use this template to set up all of my core styling at once, early in the theme development process.
* Uses Foundation's <strong>Flexbox</strong> grid and utilises flexbox throughout.
* Handy template development functions:
    * __Content splitter:__ Allows you to use the 'read more' tag in the WordPress editor to split the content into an array and output each section in different places in a template.
	* __Gallery / content splitter:__ Enables you to separate out galleries inserted in the WordPress editor to display them separately in the template.
	* __Featured image banner with basic image size checker__ that will check if a featured image has been set and whether or not it meets dimension requirements before being displayed; if it does not exist or meet requirements, the same checks will be run on the parent page and its image used if it meets requirements; if there is no parent page or requirements are ot met, a default image is used.
	* __Dynamic featured image banner (work in progress)__ that loads different sized images (as CSS backgrounds) according to the viewport size; if a page's image doesn't meet size requirements, the parent image will be used, and if there is no parent or that image isn't large enough either, a default image will be used.
	* __Automatic featured image:__ If no image is set, use the first attachment. Uncomment the function in `functions/media.php` to use.
	* Some __WooCommerce functions__ I commonly use. Add to or remove these as needed. _To use, you will need to uncomment the call to functions/woocommerce.php the file in functions.php._
	* Additional WooCommerce functions for if you are using it to display products but aren't using eCommerce functionality (e.g. product catalogue). _Uncomment functions/woocommerce-catagloue.php to use_.
	
## What version are ya up to?

3.0 as of 11 April, 2018.

### Version 3.0 - April 2018

I have decided to bump the version from 2.4 to 3.0 due to the significant volume of improvements made, both large and small:
* Added and implemented some new PHP functions for theme development
* Improved some existing PHP functions (e.g. the custom excerpt function now takes a word count parameter)
* Improved in-file documentation using PHPDoc comments for PHP and JavaScript
* Converted much JS to vanilla instead of using jQuery where I don't really need to
* Added InView.js and basic CSS and JS setup for using it for layout animation 
* Moved some template parts into new separate folders - `layout` and `excerpts`
* Added options for how to display excerpts - `excerpt-card.php` or `excerpt-list.php`, to be called by `get_template_part` as desired
* Added mixins:
    * Lead paragraph
    * Block colours on :before and :after
    * Play button overlay
    * Pseudo-heading (e.g. Apply the styles for a H3 to a H2 for visual design reasons)
    * Go another step up a type scale
* Updated Font Awesome to version 5 (free edition, but Pro can easily be added if you have a licence)
* Removed customiser option to select offcanvas or mobile topbar for the mobile menu, as this is a design decision that should be implemented in code once and the unneeded markup and files removed on each site
* Removed metabox for the visual page title, in favour of going back to using an ACF field for this as it's more flexible and provides a more consistent interface when other ACF fields are used
* Readme now written in proper markdown 

## Foundation version?

Zurb Foundation 6.3.1 as of Double-E-Foundation 2.2 (April 26, 2017).

## To-do list ##

* Write Wiki page on how to choose which mobile menu to use and what to remove for simplicity
* Add breadcrumbs
* Add support (including templates) for more post formats
* Add icons to the excerpt cards for additional post formats
* Improve the banner image checker, particularly the fallbacks
* Fix the third-level menus in the top bar
* Add default comment styling
* Test and improve default WooCommerce styling
* Learn and implement Foundation 7

## Third-party libraries used

* [Zurb Foundation 6](https://foundation.zurb.com)
* [Animate.scss](https://github.com/doubleedesign/Animate.scss)
* [Hover.css](https://github.com/IanLunn/Hover)
* [Font Awesome 5](http://www.fontawesome.com/)
* [inView](https://github.com/protonet/jquery.inview)
* [Swipebox](http://brutaldesign.github.io/swipebox/)
* [Owl Carousel 2](https://owlcarousel2.github.io/OwlCarousel2/)

## Recommended plugins
* [Advanced Custom Fields](https://www.advancedcustomfields.com)

## Other credits

* This project started as a fork of [Ole Fredrik Lie's FoundationPress](https://github.com/olefredrik).
* Other credits for specific functions can be found in the relevant files throughout the theme.

## Licence

General Public License (GPL) v2. Foundation uses the MIT License.

## Examples of work
* [Kids Compass Paediatric Therapy Centre](https://www.kidscompass.com.au)
* [Exford Primary School](http://www.exfordps.vic.edu.au) 
* [Wyndham Business and Tourism Association](http://www.wyndhambusinessandtourism.org.au)
* [Lynriz Debutante Presentations](http://www.lynrizdebs.com.au)
* [Oliver-Ramsay Security](https://www.orsecurity.com.au)
* [ConnectQuest](http://www.connectquest.com.au)
* [Early Learning Childcare &amp; Kindergarten](https://www.elcck.com.au)
* [Cutting Edge Video Productions](http://www.cuttingedgevideo.com.au)
* [Davrose Homes](http://www.davrose.com.au)
