<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package spoonbill
 */
?>

	</div><!-- #content .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar('footer'); ?>

		<div class="site-info">
			<span>Copyright &copy; 2013-2014 CHEN CHEN | </span>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'spoonbill' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'spoonbill' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s', 'spoonbill' ), 'spoonbill', '<a href="http://chen-chen.me/" rel="designer">chen-chen.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
