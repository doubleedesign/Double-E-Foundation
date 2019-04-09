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

3.1.2 as of 17 January, 2019.

## Foundation version?

Zurb Foundation 6.3.1 as of Double-E-Foundation 2.2 (April 26, 2017).

## Third-party libraries used

* [Zurb Foundation 6](https://foundation.zurb.com)
* [Animate.scss](https://github.com/doubleedesign/Animate.scss)
* [Hover.css](https://github.com/IanLunn/Hover)
* [Font Awesome 5](http://www.fontawesome.com/)
* [inView](https://github.com/protonet/jquery.inview)
* [Swipebox](http://brutaldesign.github.io/swipebox/)
* [Owl Carousel 2](https://owlcarousel2.github.io/OwlCarousel2/)
* [TippyJS](https://github.com/atomiks/tippyjs) (version 2, not 3)

## Recommended plugins
* [Advanced Custom Fields Pro](https://www.advancedcustomfields.com)

## Other credits

* This project started as a fork of [Ole Fredrik Lie's FoundationPress](https://github.com/olefredrik).
* Other credits for specific functions can be found in the relevant files throughout the theme.

## Licence

General Public License (GPL) v2. Foundation uses the MIT License.

## Examples of work
* [Kids Compass Paediatric Therapy Centre](https://www.kidscompass.com.au)
* [Exford Primary School](http://www.exfordps.vic.edu.au) 
* [AMR Hewitts Print Packaging](https://www.amrhewitts.com.au)
* [Calisthenics Association of Queensland Inc](https://www.calisthenicsqld.com.au)
* [Beejays Calisthenics Club](https://www.beejayscalisthenics.com.au)
* [Wyndham Business and Tourism Association](http://www.wyndhambusinessandtourism.org.au)
* [Lynriz Debutante Presentations](http://www.lynrizdebs.com.au)
* [Oliver-Ramsay Security](https://www.orsecurity.com.au)
* [Ellyn Shepherd](https://www.ellynshepherd.com.au)
* [Julia Timson Civil Celebrant](https://www.juliatimson.com.au)
* [Melton Calisthenics Club](https://www.meltoncalisthenics.org.au)
* [Doncaster Calisthenics Club](https://www.doncastercalisthenics.org.au)
* [ConnectQuest](http://www.connectquest.com.au)
* [Early Learning Childcare &amp; Kindergarten](https://www.elcck.com.au)
* [Cutting Edge Video Productions](http://www.cuttingedgevideo.com.au)
