<?php
	/*  PHP Document                           */
	/*  Code to include in the index.php file  */
	


	$marquee_loop = new WP_Query(
		array(
			'post_type' => 'marquee_panel',
			'posts_per_page' => 10,
			'post_status' => 'publish'
		)
	);
	

	echo '<div class="marquee">';
		echo '<div class="marquee_data">';
			while ( $marquee_loop -> have_posts() ) : $marquee_loop -> the_post();
				$image_id = get_post_thumbnail_id( $post_id );
				$image_url_full = wp_get_attachment_image_src($image_id,'full');
				$image_url_large = wp_get_attachment_image_src($image_id,'large');
				echo '<div class="marquee_panel" data-image-full="'.$image_url_full[0].'" data-image-large="'.$image_url_large[0].'">';
					echo '<img src='.$image_url_full[0].'>';
					echo '<div class="panel_caption">';
						the_title('<h3><a href="#">','</a></h3>');
						echo '<div class="panel_content">';
							the_content();
						echo '</div>';
					echo '</div>';
				echo '</div>';
			endwhile;
		echo '</div>';
	echo '</div>';


?>

<!-- debugger
<div class="screenSize"></div>
<div class="photoWidth"></div>
<div class="autoPlay"></div>
<div class="totalPanels"></div>
<div class="currentPanel"></div>
<div class="timePassed"></div>
<div class="timeToChange"></div>
<div class="inTansition"></div> -->