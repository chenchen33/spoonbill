<?php
/**
 * @package spoonbill
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="index-box">
	

	<!-- no .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>	
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta">
			<?php spoonbill_posted_on(); ?>
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
	</footer><!-- .entry-footer -->

</div>
</article><!-- #post-## -->