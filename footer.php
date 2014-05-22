<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

		</footer><!-- #colophon -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
	<script async src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script async src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script async src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script async src="<?php echo get_stylesheet_directory_uri() . '/js/jquery.lazyload.min.js'; ?>"></script>
	<script async src="<?php echo get_stylesheet_directory_uri() . '/js/custom.js'; ?>"></script>
</body>
</html>