## Hi there!

<p>This is a starter WordPress theme that uses the Zurb Foundation 6 front-end framework.</p>

<p>This project started as a fork of <a href="https://github.com/olefredrik">Ole Fredrik Lie's FoundationPress</a> but has taken on a life of its own.</p>

<p><strong>Demo:</strong> <a href="http://foundation.doublee-dev.com.au">foundation.doublee-dev.com.au</a></p>

## Features 

<ul>
	<li><strong>Style Guide page template</strong> containing core elements such as headings, paragraphs, lists, tables, forms, callouts/messages, buttons and pagination. I use this template to set up all of my core styling at once, early in the theme development process.</li>
	<li>Uses Foundation's <strong>Flexbox</strong> grid and utilises flexbox throughout.</li>
	<li>Handy template development functions:
		<ul>
			<li><strong>Content splitter:</strong> Allows you to use the 'read more' tag in the WordPress editor to split the content into an array and output each section in different places in a template.</li>
			<li><strong>Gallery / content splitter: </strong> Enables you to separate out galleries inserted in the WordPress editor to display them separately in the template.</li>
			<li><strong>Featured image banner with basic image size checker</strong> that will check if a featured image has been set and whether or not it meets dimension requirements before being displayed; if it does not exist or meet requirements, the same checks will be run on the parent page and its image used if it meets requirements; if there is no parent page or requirements are ot met, a default image is used.</li>
			<li><strong>Dynamic featured image banner</strong> that loads different sized images (as CSS backgrounds) according to the viewport size; if a page's image doesn't meet size requirements, the parent image will be used, and if there is no parent or that image isn't large enough either, a default image will be used.</li>
			<li><strong>Visual page title meta field</strong> to use a more descriptive title (e.g. for SEO purposes) as the main heading on a page without needing to change the page name that's used on menus.</li>
		</ul>
	</li>
	<li>Some WooCommerce functions I commonly use. Add to or remove these as needed. <em>To use, you will need to uncomment the call to functions/woocommerce.php the file in functions.php</em></li>
	<li>Additional WooCommerce functions for if you are using it to display products but aren't using eCommerce functionality. <em>Uncomment functions/woocommerce-catagloue.php to use</em>.</li>
</ul>

## To-do list ##

<ul>
	<li>Add breadcrumbs</li>
	<li>Add icons to the excerpt cards for more post formats</li>
	<li>Add and style WooCommerce test content</li>
	<li>Improve the banner image checker, particularly the fallbacks</li>
</ul>

## What version are ya up to?

<p>2..3.0 as of June 18, 2017.</p>

## Foundation version?

<p>Zurb Foundation 6.3.1 as of Double-E-Foundation 2.2 (April 26, 2017).</p>

## Licence

<p>General Public License (GPL) v2. Foundation uses the MIT License.</p>

## Examples of work
<ul>
	<li><a href="http://www.wyndhambusinessandtourism.org.au">Wyndham Business and Tourism Association</a></li>
	<li><a href="http://www.lynrizdebs.com.au">Lynriz Debutante Presentations</a></li>
	<li><a href="http://www.davrose.com.au">Davrose Homes</a> <em>- an example of using WooCommerce for a non-eCommerce product catalogue</em></li>
	<li><a href="https://www.lovetease.com.au">Love TEAse</a> <em>- WooCommerce store</em></li>
	<li><a href="http://www.cuttingedgevideo.com.au">Cutting Edge Video Productions</a></li>
	<li><a href="http://www.bhwcc.org.au">Box Hill Wesley Calisthenics Club</a></li>
	<li><a href="http://www.volairecalisthenics.com.au">Volaire Calisthenics College</a></li>
</ul>