<?php
/**
 * The main template file.
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */

get_header(); ?>


<div id="primary" class="site-content cf" role="main">

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- end #primary -->

		<?php if (true == get_theme_mod( 'ajax_load' )){
			minimaluu_content_nav( 'nav-ajax' );
		} else {
			minimaluu_content_nav( 'nav-below' );
		} ?>

<?php get_footer(); ?>