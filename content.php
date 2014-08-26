<?php
/**
 * @package spoonbill
 * this is the index content file
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="index-box">
	<?php 
		if (has_post_thumbnail()) {
		    echo '<div class="small-index-thumbnail clear">';
		    echo '<a href="' . get_permalink() . '" title="' . __('Click to read ', 'spoonbill') . get_the_title() . '" rel="bookmark">';
		    echo the_post_thumbnail('index-thumb');
		    echo '</a>';
		    echo '</div>';
		}
	?>

	<header class="entry-header">

		<?php
			if(is_sticky()){
				echo '<i class="fa fa-anchor sticky-post"></i>';
			}
		?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta">
			<?php spoonbill_posted_on(); ?>

			<?php
			    /* translators: used between list items, there is a space after the comma */
			    $category_list = get_the_category_list( __( ', ', 'spoonbill' ) );

			    if ( spoonbill_categorized_blog() ) {
			        echo '<span class="category-list">' . $category_list . '</span>';
			    }

			?>


			<?php 
			    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
			        echo '<span class="comments-link">';
			        comments_popup_link( __( 'Leave a comment', 'spoonbill' ), __( '1 Comment', 'spoonbill' ), __( '% Comments', 'spoonbill' ) );
			        echo '</span>';
			    }
			?>
			<?php edit_post_link( __( 'Edit', 'spoonbill' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->

		<?php endif; ?>
	</header><!-- .entry-header -->



	<?php 
		if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { 
		    echo '<div class="entry-content">';
		    the_content( __( '', 'spoonbill' ) );
		    echo '</div>';
		} else { ?>
		    <div class="entry-content">
		    <?php the_excerpt(); ?>
		    </div><!-- .entry-content -->
		<?php } 
	?>		    
	

	<footer class="entry-footer continue-reading">
	    <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'spoonbill') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-right"></i></a>'; ?>
	</footer><!-- .entry-footer -->

</div>
</article><!-- #post-## -->