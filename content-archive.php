<?php
/**
 * The template used for displaying the Archive page content.
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- end .entry-header -->

	<div class="entry-content clearfix">
			<ul class="latest-posts-list">
				<?php wp_get_archives('type=postbypost'); ?>
			</ul><!-- end .latest-posts-list -->

	</div><!-- end .entry-content -->

</article><!-- end post-<?php the_ID(); ?> -->