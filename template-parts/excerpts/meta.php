<?php
// Meta/labels for posts
if($type == 'post') { ?>
	<div class="meta row">
		<div class="small-12 columns">
			<?php
				if ($format == 'video') {
					echo '<span class="secondary label"><i class="far fa-play-circle"></i></span>';
				} else {
					echo '<span class="secondary label"><i class="far fa-newspaper"></i></span>';
				}
				echo '<span class="secondary label"><a href="/category/'. $category[0]->slug .'">' . $category[0]->name . '</a></span>';
			?>
		</div>
	</div>
<?php } ?>