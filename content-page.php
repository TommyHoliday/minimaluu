<?php
/**
 * The template used for displaying page content.
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( !is_front_page() ) : ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- end .entry-header -->
	<?php endif; ?>

	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div><!-- end .entry-content -->

</article><!-- end post-<?php the_ID(); ?> -->