<?php
/**
 * minimaluu functions and definitions
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
    $content_width = 1305;

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function minimaluu_setup() {

	// Make minimaluu available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'minimaluu', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary' => __( 'Primary Navigation', 'minimaluu' ),
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'minimaluu_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	//  Adding additional sizes for Post Thumbnails
	add_image_size( 'img-square-big', 970, 970, true );
	add_image_size( 'img-portrait-big', 970, 1293, true );
	add_image_size( 'img-landscape-big', 970, 728, true );
	add_image_size( 'img-square', 700, 700, true );
	add_image_size( 'img-portrait', 700, 933, true );
	add_image_size( 'img-landscape', 700, 525, true );

}
add_action( 'after_setup_theme', 'minimaluu_setup' );


/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function minimaluu_scripts() {
	global $wp_styles;

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads Custom minimaluu JavaScript functionality
	wp_enqueue_script( 'minimaluu-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '2014-02-20' );

	// Loads animate.css stylesheet.
	wp_enqueue_style( 'minimaluu-animate', get_template_directory_uri() . '/css/animate.min.css', array(), '2014-02-20' );

	// Loads font awesome stylesheet.
	wp_enqueue_style( 'minimaluu-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '2014-02-20' );

	// Loads main stylesheet.
	wp_enqueue_style( 'minimaluu-style', get_stylesheet_uri(), array(), '2014-02-20' );

}
add_action( 'wp_enqueue_scripts', 'minimaluu_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Creates a nicely formatted and more specific title element text
/* for output in head of document, based on current view.
/*-----------------------------------------------------------------------------------*/

function minimaluu_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'minimaluu' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'minimaluu_wp_title', 10, 2 );


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/

function minimaluu_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'minimaluu_page_menu_args' );

/*-----------------------------------------------------------------------------------*/
/* Hide Pages from Search Results
/*-----------------------------------------------------------------------------------*/

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}

	return $items;
}

/*-----------------------------------------------------------------------------------*/
/* Make new thumbnail sizes available in media library
/*-----------------------------------------------------------------------------------*/

add_filter( 'image_size_names_choose', 'minimaluu_custom_sizes' );

function minimaluu_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'minimaluu-recent-thumbnail' => __('Recent Post Thumbs', 'minimaluu' ),
    ) );
}


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function minimaluu_customize_css() {
    ?>
         <style type="text/css">
			 <?php if ( 'fixed' === get_theme_mod( 'sidebar_fixed' ) ) { ?> @media screen and (min-width: 1200px) {
				 #site-nav { position: fixed; top: 0; left: 0; right: 0; display: block !important; z-index: 10000;}
				 #masthead {margin-top: 54px;}
				 .admin-bar #site-nav { top: 32px;}
				 .admin-bar #masthead {margin-top: 84px;}
			}
			<?php } ?>
			<?php if ( get_theme_mod( 'hide_tagline' ) != '' ) { ?>
				#site-title h2.site-description {display: none;}
				#site-about {padding-top: 25px;}
				@media screen and (min-width: 767px) {
					#site-about {padding-top: 40px;}
				}
			<?php } ?>
			a {color: <?php echo get_theme_mod('link_color'); ?>;}
			#site-about a#about-btn, #site-about a#close-btn, #infinite-handle span {border-bottom: 2px solid <?php echo get_theme_mod('link_color'); ?>;}
			#site-about a#about-btn:hover, #site-about a#close-btn:hover, #infinite-handle span:hover { color: <?php echo get_theme_mod('linkhover_color'); ?>; border-bottom: 2px solid <?php echo get_theme_mod('linkhover_color'); ?>;}
			.entry-header h2.entry-title a:hover, .entry-details a:hover, #comments a:hover, .author-info h6 a:hover, .post .entry-content a:hover, .page .entry-content a:hover, .about-introtext a:hover,.about-full a:hover,.textwidget a:hover,.single-post .author-info p.author-description a:hover {color: <?php echo get_theme_mod('linkhover_color'); ?>;}
			#colophon { background: <?php echo get_theme_mod('footerbg_color'); ?>;}
			<?php if ( 'dark' === get_theme_mod( 'img_hovers' ) ) { ?> @media screen and (min-width: 1200px) {
				 .site-content .post:hover .entry-thumbnail {background: #000;}
				 .search-results .site-content .page:hover .entry-thumbnail {background: #000;}
				 .site-content .post:hover .entry-thumbnail a.thumb-img {opacity: 0.7;}
				 .search-results .site-content .page:hover .entry-thumbnail a.thumb-img {opacity: 0.7;}
				 .entry-header h2.entry-title a, .entry-details, .entry-details a, .entry-details a:hover {color: rgba(255, 255, 255, 0.9);}
				 .list-view .entry-header h2.entry-title a, .list-view .entry-details, .list-view .entry-details a, .list-view .entry-details a:hover { color: #000;}
				 .entry-header h2.entry-title a:hover {color: #fff;}
				 .single-post .entry-details, .single-post .entry-details a {color: #000;}
				 .single-post .entry-details a:hover, .list-view .entry-header h2.entry-title a:hover {color: #999;}
			}
			<?php } ?>
         </style>
    <?php
}
add_action( 'wp_head', 'minimaluu_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Sets the post excerpt length to 15 characters.
/*-----------------------------------------------------------------------------------*/

function minimaluu_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'minimaluu_excerpt_length' );


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

add_filter('use_default_gallery_style', '__return_false');


if ( ! function_exists( 'minimaluu_comment' ) ) :
/*-----------------------------------------------------------------------------------*/
/* Comments template minimaluu_comment
/*-----------------------------------------------------------------------------------*/
function minimaluu_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 35 ); ?>
			</div>

			<div class="comment-details cf">
				<div class="comment-author">
					<?php printf( __( ' %s ', 'minimaluu' ), sprintf( ' %s ', get_comment_author_link() ) ); ?>
				</div><!-- end .comment-author -->
				<ul class="comment-meta">
					<li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date */
							printf( __( '%1$s', 'minimaluu' ),
							get_comment_date());
						?></a>
					</li>
					<?php if ( comments_open () ) : ?>
					<li class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'minimaluu' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></li>
					<?php endif; ?>
					<?php edit_comment_link( __( 'Edit', 'minimaluu' ));?>
				</ul><!-- end .comment-meta -->

			</div><!-- end .comment-details -->

				<div class="comment-text">
					<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'minimaluu' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->

		</article><!-- end .comment -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php _e( '<span>Pingback:</span>', 'minimaluu' ); ?> <?php comment_author_link(); ?></p>
		<p class="pingback-edit"><?php edit_comment_link( __('Edit', 'minimaluu'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function minimaluu_widgets_init() {

	register_sidebar( array (
		'name' => __( 'About Header Widget Area', 'minimaluu' ),
		'id' => 'sidebar-about',
		'description' => __( 'Widget to add an intro text on the home page.', 'minimaluu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 1', 'minimaluu' ),
		'id' => 'footer-sidebar-1',
		'description' => __( 'Widgets will appear in the first footer column.', 'minimaluu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 2', 'minimaluu' ),
		'id' => 'footer-sidebar-2',
		'description' => __( 'Widgets will appear in the second footer column.', 'minimaluu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 3', 'minimaluu' ),
		'id' => 'footer-sidebar-3',
		'description' => __( 'Widgets will appear in the third footer column.', 'minimaluu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 4', 'minimaluu' ),
		'id' => 'footer-sidebar-4',
		'description' => __( 'Widgets will appear in the fourth footer column.', 'minimaluu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'minimaluu_widgets_init' );


/*-----------------------------------------------------------------------------------*/
/* Display navigation or ajax load more posts when applicable
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'minimaluu_content_nav' ) ) :

	function minimaluu_content_nav( $nav_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="nav-wrap">
				<?php if ($nav_id == 'nav-ajax') : ?>
				<nav id="<?php echo $nav_id; ?>" class="cf">
					<div class="nav-more"><?php next_posts_link( __( '<span>Load more</span>', 'minimaluu'  ) ); ?></div>
					<svg id="load-animation" width="20" height="20" viewbox="0 0 40 40">
	 			 		<polygon points="0 0 0 40 40 40 40 0" class="rect" />
					</svg>
				</nav>
				<?php else : ?>
				<nav id="<?php echo $nav_id; ?>" class="cf">
					<div class="nav-previous"><?php next_posts_link( __( '<span>Older</span>', 'minimaluu'  ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( '<span>Newer</span>', 'minimaluu' ) ); ?></div>
				</nav>
				<?php endif; ?>
			</div><!-- end .nav-wrap -->
		<?php endif;
	}

endif; // minimaluu_content_nav


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function minimaluu_body_class( $classes ) {

	if (  '1-column' == get_theme_mod( 'grid' ) )
		$classes[] = 'one-column';

	if (  '2-column' == get_theme_mod( 'grid' ) )
		$classes[] = 'two-column';

	if (  '3-column' == get_theme_mod( 'grid' ) )
		$classes[] = 'three-column';

	if (  '4-column' == get_theme_mod( 'grid' ) )
		$classes[] = 'four-column';

	if (  '5-column' == get_theme_mod( 'grid' ) )
		$classes[] = 'five-column';

	if (  'landscape' == get_theme_mod( 'thumbnailformat' ) )
		$classes[] = 'landscape';

	if (  'portrait' == get_theme_mod( 'thumbnailformat' ) )
		$classes[] = 'portrait';

	if (  'square' == get_theme_mod( 'thumbnailformat' ) )
		$classes[] = 'square';

	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'fullwidth';

	return $classes;
}
add_filter( 'body_class', 'minimaluu_body_class' );


/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';



