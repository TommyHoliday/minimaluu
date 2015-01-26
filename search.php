<?php
/**
 * The template for displaying search results.
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h2 class="archive-title"><?php echo absint($wp_query->found_posts); ?> <?php printf( __( 'Search Results for &ldquo;%s&rdquo;', 'minimaluu' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</header><!--end .page-header -->

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php	get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; // end of the loop. ?>

		<?php minimaluu_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<article id="post-0" class="page no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'minimaluu' ); ?></h1>
			</header><!--end .entry-header -->
			<div class="entry-content">
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again!', 'minimaluu' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- end .entry-content -->
		</article>

	<?php endif; ?>

</div><!-- end #primary -->

<?php get_footer(); ?>