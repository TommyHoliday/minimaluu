<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h1 class="entry-title tlt"><?php the_title(); ?></a></h1>

	<div class="entry-content cf">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'minimaluu' ), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required()) : ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<nav id="nav-single" class="clearfix">
			<div class="nav-next"><?php next_post_link( '%link', ( '<span>' . __( 'Next', 'minimaluu' ) . '</span>' ) ); ?></div>
			<div class="nav-previous"><?php previous_post_link( '%link', ( '<span>' . __( 'Previous', 'minimaluu' ) . '</span>' ) ); ?></div>
		</nav><!-- #nav-single -->
		<div class="clearfix"></div>
		<div class="entry-details">
			<div class="entry-author">
				<?php
					printf( __( '<a href="%1$s" title="%2$s">%3$s</a>', 'minimaluu' ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					sprintf( esc_attr__( 'All posts by %s', 'minimaluu' ), get_the_author() ),
					get_the_author() );
				?>
			</div><!-- end .entry-author -->
			<div class="entry-date">
				<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
			</div><!-- end .entry-date -->
			<?php if ( comments_open() ) : ?>
				<div class="entry-comments">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'comment 0', 'minimaluu' ) . '</span>', __( 'comment 1', 'minimaluu' ), __( 'comments %', 'minimaluu' ) ); ?>
				</div><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<div class="entry-cats"><?php the_category(', '); ?></div>
			<?php $tags_list = get_the_tag_list();
			if ( $tags_list ): ?>
			<div class="entry-tags"><?php the_tags('<ul><li>',', ','</li></ul>'); ?></div>
			<?php endif; // get_the_tag_list() ?>
		</div><!--end .entry-details -->
	</header><!--end .entry-header -->

		<?php if ( get_the_author_meta( 'description' )) : // If a user filled out their author bio ?>
		<div class="author-wrap cf">
			<div class="author-info">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'minimaluu_author_bio_avatar_size', 70 ) ); ?>
				<h6><?php printf( __( 'Posted by %s', 'minimaluu' ), "<a href='" .  esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) . "' title='" . esc_attr( get_the_author() ) . "' rel='author'>" . get_the_author() . "</a>" ); ?></h6 >
				<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
			</div><!-- end .author-info -->
		</div><!-- end .author-wrap -->
	<?php endif; ?>

</article><!-- end .post-<?php the_ID(); ?> -->