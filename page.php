<?php
/**
 * The template for displaying standard pages with sidebar.
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>

	</div><!-- end #primary -->

<?php get_footer(); ?>