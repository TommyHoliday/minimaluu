<?php
/**
 * The template for displaying the footer.
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
?>
</div><!-- end #main-wrap -->
</div><!-- end #container -->
<footer id="colophon" class="site-footer cf">

	<?php get_sidebar( 'footer' ); ?>

	<div id="site-info">

		<?php if ( is_active_sidebar( 'footer-sidebar-social' ) ) : ?>
			<div id="sidebar-footer-social" class="widget-area">
				<?php dynamic_sidebar( 'footer-sidebar-social' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

		<ul class="credit" role="contentinfo">
			<li class="wp-credit">
			<?php if ( get_theme_mod( 'footer_text' ) ) : ?>
				<?php echo wp_kses_post( get_theme_mod( 'footer_text' ) ); ?>
			<?php endif; ?>
			</li>
		</ul><!-- end .credit -->

	</div><!-- end #site-info -->

</footer><!-- end #colophon -->


<?php wp_footer(); ?>


</body>
</html>