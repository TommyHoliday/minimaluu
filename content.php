<?php
/**
 * The default template for displaying content
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (has_post_thumbnail() ) : ?>
	<div class="entry-thumbnail cf">

		<?php if ('square' == get_theme_mod( 'thumbnailformat' ) && '1-column' == get_theme_mod( 'grid' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>"class="thumb-img"><?php the_post_thumbnail('img-square-big'); ?></a>
		<?php elseif ('square' == get_theme_mod( 'thumbnailformat' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>"class="thumb-img"><?php the_post_thumbnail('img-square'); ?></a>
			<?php elseif ('portrait' == get_theme_mod( 'thumbnailformat' ) && '1-column' == get_theme_mod( 'grid' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>"class="thumb-img"><?php the_post_thumbnail('img-portrait-big'); ?></a>
		<?php elseif ('portrait' == get_theme_mod( 'thumbnailformat' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>"class="thumb-img"><?php the_post_thumbnail('img-portrait'); ?></a>
		<?php elseif ('landscape' == get_theme_mod( 'thumbnailformat' ) && '1-column' == get_theme_mod( 'grid' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="thumb-img"><?php the_post_thumbnail('img-landscape-big'); ?></a>
			<?php elseif ('landscape' == get_theme_mod( 'thumbnailformat' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="thumb-img"><?php the_post_thumbnail('img-landscape'); ?></a>
		<?php endif; ?>

		<div class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="entry-content cf">
				<?php the_excerpt(); ?>
			</div><!-- end .entry-content -->
		</div><!-- end .entry-header -->

	</div><!-- end .entry-thumbnail -->

	<?php else : ?>

	<div class="entry-thumbnail cf">
		<?php if ('square' == get_theme_mod( 'thumbnailformat' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="thumb-img"><img src="<?php echo get_template_directory_uri(); ?>/images/default-square.png" alt="<?php the_title(); ?>" /></a>
		<?php elseif ('portrait' == get_theme_mod( 'thumbnailformat' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="thumb-img"><img src="<?php echo get_template_directory_uri(); ?>/images/default-portrait.png" alt="<?php the_title(); ?>" /></a>
		<?php elseif ('landscape' == get_theme_mod( 'thumbnailformat' )) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="thumb-img"><img src="<?php echo get_template_directory_uri(); ?>/images/default-landscape.png" alt="<?php the_title(); ?>" /></a>
		<?php endif; ?>

		<div class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimaluu' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="entry-content cf">
				<?php the_excerpt(); ?>
			</div><!-- end .entry-content -->
		</div><!-- end .entry-header -->
	</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

</article><!-- end post -<?php the_ID(); ?> -->