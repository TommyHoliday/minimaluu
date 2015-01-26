<?php
/**
 * The Footer widget areas.
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
?>

<?php
	/* Check if any of the footer widget areas have widgets.
	 *
	 * If none of the footer widget areas have widgets, let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer-sidebar-1' )
		&& ! is_active_sidebar( 'footer-sidebar-2' )
		&& ! is_active_sidebar( 'footer-sidebar-3' )
		&& ! is_active_sidebar( 'footer-sidebar-4' )
		)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="footer-sidebar-wrap" class="clearfix">
	<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
		<div id="footer-sidebar-one" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
		<div id="footer-sidebar-two" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
		<div id="footer-sidebar-three" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
		<div id="footer-sidebar-four" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
</div><!-- end .footerwidget-wrap -->