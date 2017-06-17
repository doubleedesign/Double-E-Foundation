<?php
/* Template name: Style guide */
/**
 * The template for displaying the style guide for development purposes
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.2.1
 */

 get_header(); ?>

 <?php get_template_part('template-parts/featured-image-banner'); ?>

 <div id="page" class="styleguide row">

	 <?php while ( have_posts() ) : the_post(); ?>
       <main <?php post_class('small-12 columns') ?> id="post-<?php the_ID(); ?>">
       
           <header>
               <h1 class="entry-title">
                    <?php
				   		$visual_page_title = get_post_meta( $post->ID, 'doublee_visual-page-title-entry', true ); 
				   		if (!empty($visual_page_title)) {
							echo $visual_page_title. ' Heading 1';
						} else {
							echo get_the_title() . ' Heading 1';
						}
				   	?>
               </h1>
           </header>
           
           <div class="entry-content">
           
           		<section>
           			<h2>Key settings</h2>
           			
           			<ul id="fonts">
						<li class="heading"><strong>Heading Font: </strong></li>
						<li class="body"><strong>Body Font: </strong></li>
					</ul>
         	
         			<ul id="breakpoints">
         				<li class="medium"><strong>Medium breakpoint:</strong> </li>
         				<li class="large"><strong>Large breakpoint:</strong> </li>
         				<li class="xlarge"><strong>XLarge breakpoint:</strong> </li>
         				<li class="xxlarge"><strong>XXLarge breakpoint:</strong> </li>
         			</ul>
         			
         			<ul id="grid">
         				<li class="maxwidth"><strong>Max row width:</strong> </li>
         				<li class="small-gutter"><strong>Default gutters:</strong> </li>
         				<li class="medium-gutter"><strong>Gutters on medium:</strong> </li>
         				<li class="large-gutter"><strong>Gutters on large:</strong> </li>
         				<li class="xlarge-gutter"><strong>Gutters on xlarge:</strong> </li>
         				<li class="xxlarge-gutter"><strong>Gutters on xxlarge:</strong> </li>
         				<li><small>Note: If any of the gutter values are empty, they have not been specified for this viewport size and the previous setting will be used.</small></li>
         			</ul>
          		
          			<ul id="colors" class="row">
						<li class="primary small-12 medium-6 columns">Primary colour</li>
						<li class="secondary small-12 medium-6 columns">Secondary colour</li>
						<li class="success small-4 columns">Success colour</li>
						<li class="warning small-4 columns">Warning colour</li>
						<li class="alert small-4 columns">Alert colour</li>
						<li class="accent small-6 columns">Accent colour</li>
						<li class="body small-6 columns">Body text colour</li>
					</ul>

           		</section>
           
           		<section>
					<h2>Heading 2</h2>

					<p>This is some body text. <strong>Hi there, I'm some strong text,</strong> and <em>I'm some emphasised text</em>. Lorem ipsum <a href="#">this here is a link</a> dolor sit amet, consectetur adipiscing elit. Vivamus consectetur faucibus orci vel commodo. Ut a orci dolor. Vivamus suscipit dictum erat, at mollis quam mattis quis. Cras fringilla enim massa, a placerat ex feugiat gravida. Nunc euismod ipsum ut ornare lobortis. Aliquam et dui ligula. Etiam a maximus leo, sit amet rutrum odio.</p>

					<h3>Heading 3</h3>

					<p>Aenean convallis tellus urna, nec scelerisque sem tincidunt eget. Nullam aliquam id nisl ac viverra. Etiam vitae mi fringilla, pharetra enim ac, maximus eros. Morbi sit amet euismod sapien, tincidunt vulputate ipsum. Nunc eros dolor, congue non nibh ut, fermentum laoreet turpis. Morbi a faucibus justo.</p>

					<p>Maecenas placerat felis vitae diam aliquam, vel fringilla turpis dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur metus ipsum, tempus vel blandit quis, viverra eget nisi. In eget pretium orci. Suspendisse egestas quam varius sem vulputate laoreet. Aenean eu risus at est iaculis luctus. Fusce dapibus diam at tempus laoreet. Sed vel imperdiet nisl. </p>

					<h4>Heading 4</h4>

					<p>Suspendisse feugiat, massa ut hendrerit lacinia, odio risus consectetur urna, at tincidunt ligula ex vitae neque. Suspendisse a diam a urna vestibulum porttitor vitae ut neque. Suspendisse potenti. Nullam nec eros malesuada, euismod felis sit amet, egestas elit. Maecenas quis volutpat quam, eu malesuada justo. Sed turpis est, sagittis eu aliquam in, efficitur nec nisl. Duis mauris lectus, laoreet et bibendum quis, ultrices ac quam. Integer sed ornare odio.</p>
				</section>

				<section>
					<h2>Lists</h2>

					<h3>Unordered list</h3>

					<ul>
						<li>Donec molestie ex tellus</li>
						<li>Nunc aliquam</li>
						<li>Mauris fringilla vulputate tempus</li>
						<li>Etiam lobortis orci a fermentum euismod</li>
						<li>Integer ultrices</li>
					</ul>

					<h3>Ordered list</h3>

					<ol>
						<li>Donec molestie ex tellus</li>
						<li>Nunc aliquam</li>
						<li>Mauris fringilla vulputate tempus</li>
						<li>Etiam lobortis orci a fermentum euismod</li>
						<li>Integer ultrices</li>
					</ol>
				</section>
				
				<section>
					<h2>Buttons</h2>

					<a class="button" href="#">Button</a>
					<a class="alert button" href="#">Alert Button</a>
					<a class="success button" href="#">Success Button</a>
					
			   </section>
			   
			   <section>

					<h2>Pagination</h2>
					<ul class="pagination" role="navigation" aria-label="Pagination">
						<li class="disabled">Previous <span class="show-for-sr">page</span></li>
						<li class="current"><span class="show-for-sr">You're on page</span> 1</li>
						<li><a href="#0" aria-label="Page 2">2</a></li>
						<li><a href="#0" aria-label="Page 3">3</a></li>
						<li><a href="#0" aria-label="Page 4">4</a></li>
						<li class="ellipsis" aria-hidden="true"></li>
						<li><a href="#0" aria-label="Page 12">12</a></li>
						<li><a href="#0" aria-label="Page 13">13</a></li>
						<li><a href="#0" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
					</ul>
				</section>

				<section>
					<h2>Forms</h2>
					<form>
						  <label>Input Label
							<input type="text" placeholder=".small-12.columns" aria-describedby="exampleHelpText">
						  </label>
						  <p class="help-text" id="exampleHelpText">Here's how you use this input field!</p>
						  <label>
							How many puppies?
							<input type="number" value="100">
						  </label>
						  <label>
							What books did you read over summer break?
							<textarea placeholder="None"></textarea>
						  </label>
						  <label>Select Menu
							<select>
							  <option value="husker">Husker</option>
							  <option value="starbuck">Starbuck</option>
							  <option value="hotdog">Hot Dog</option>
							  <option value="apollo">Apollo</option>
							</select>
						  </label>
						  <div class="row">
							<fieldset class="large-6 columns">
							  <legend>Choose Your Favorite</legend>
							  <input type="radio" name="pokemon" value="Red" id="pokemonRed" required><label for="pokemonRed">Red</label>
							  <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
							  <input type="radio" name="pokemon" value="Yellow" id="pokemonYellow"><label for="pokemonYellow">Yellow</label>
							</fieldset>
							<fieldset class="large-6 columns">
							  <legend>Check these out</legend>
							  <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
							  <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
							  <input id="checkbox3" type="checkbox"><label for="checkbox3">Checkbox 3</label>
							</fieldset>
						  </div>
						  <div class="row">
							<div class="small-3 columns">
							  <label for="middle-label" class="text-right middle">Label</label>
							</div>
							<div class="small-9 columns">
							  <input type="text" id="middle-label" placeholder="Right- and middle-aligned text input">
							</div>
						  </div>
						  <div class="input-group">
							<span class="input-group-label">$</span>
							<input class="input-group-field" type="url">
							<div class="input-group-button">
							  <input type="submit" class="button" value="Submit">
							</div>
						  </div>
					</form>
				</section>
				
				<section>
					<h2>Tables</h2>
				
					<table>
					  <thead>
						<tr>
						  <th width="200">Table Header</th>
						  <th>Table Header</th>
						  <th width="150">Table Header</th>
						  <th width="150">Table Header</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>Content Goes Here</td>
						  <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
						  <td>Content Goes Here</td>
						  <td>Content Goes Here</td>
						</tr>
						<tr>
						  <td>Content Goes Here</td>
						  <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
						  <td>Content Goes Here</td>
						  <td>Content Goes Here</td>
						</tr>
						<tr>
						  <td>Content Goes Here</td>
						  <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
						  <td>Content Goes Here</td>
						  <td>Content Goes Here</td>
						</tr>
					  </tbody>
					</table>

				</section>

				<section>
					<h2>Messages</h2>

					<div class="callout primary">
						<h4>This is a primary callout</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus consectetur faucibus orci vel commodo. Ut a orci dolor. Vivamus suscipit dictum erat, at mollis quam mattis quis.</p>
						<a href="#">This is a link inside a callout</a>
					</div>

					<div class="callout secondary">
						<h4>This is a secondary callout</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus consectetur faucibus orci vel commodo. Ut a orci dolor. Vivamus suscipit dictum erat, at mollis quam mattis quis.</p>
						<a href="#">This is a link inside a callout</a>
					</div>

					<div class="callout success">
						<h4>This is a success callout</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus consectetur faucibus orci vel commodo. Ut a orci dolor. Vivamus suscipit dictum erat, at mollis quam mattis quis.</p>
						<a href="#">This is a link inside a callout</a>
					</div>

					<div class="callout warning">
						<h4>This is a warning callout</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus consectetur faucibus orci vel commodo. Ut a orci dolor. Vivamus suscipit dictum erat, at mollis quam mattis quis.</p>
						<a href="#">This is a link inside a callout</a>
					</div>

					<div class="callout alert">
						<h4>This is an alert/error callout</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus consectetur faucibus orci vel commodo. Ut a orci dolor. Vivamus suscipit dictum erat, at mollis quam mattis quis.</p>
						<a href="#">This is a link inside a callout</a>
					</div>
           
           		</section>

           </div>

       </main>
     <?php endwhile;?>
    
     <?php get_sidebar(); ?>

 </div>

 <?php get_footer(); ?>