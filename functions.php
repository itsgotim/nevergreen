<?php

function nevergreen_setup() {
	
	// Have WordPress generate a title tag
	add_theme_support( 'title-tag' );
	
	// Add support for post thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'header-menu'    => 'Main Header Nav Menu',
		'social-menu' => 'Social Links Footer Menu',
	) );
	
	// Switch default core markup to HTML5
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	// Enable support for Post Formats
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	
	// Add Featured image support
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'nevergreen_setup' );

/**** Register and enqueue styles and scripts ****/
if ( !function_exists('nevergreen_scripts') ) {
	function nevergreen_scripts() {
		wp_enqueue_style('ng-bs-css', get_template_directory_uri() . '/dist/css/bootstrap.css');
		wp_enqueue_style('ng-css', get_stylesheet_uri());
		wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/js/jquery.min.js', false, '', true);
		wp_enqueue_script('popper', get_template_directory_uri() . '/dist/js/popper.min.js', false, '', true);
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery', 'popper'), '', true);
		wp_enqueue_script('ng-js', get_template_directory_uri() . '/dist/js/nevergreen.js', false, '', true);
	}

	add_action( 'wp_enqueue_scripts', 'nevergreen_scripts' );
}

/**** Register sidebar and other widget areas ****/
function nevergreen_widgets() {
    register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'nevergreen' ),
        'id' => 'ng-blog-sidebar',
		'description' => 'The blog sidebar',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name' => __( 'Page Sidebar', 'nevergreen' ),
        'id' => 'ng-page-sidebar',
		'description' => 'The page sidebar',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );
	    register_sidebar( array(
        'name' => __( 'Footer Widget', 'nevergreen' ),
        'id' => 'ng-footer',
		'description' => '3 widget areas (col-4)',
        'before_widget' => '<div class="col-lg-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
		 register_sidebar( array(
        'name' => __( 'Front Page Features', 'nevergreen' ),
        'id' => 'ng-front-page',
		'description' => '3 widget areas (col-4)',
        'before_widget' => '<div class="col-lg-4 mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
	
}
add_action( 'widgets_init', 'nevergreen_widgets' );

/**** Bootstrap Navwalker file ****/
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**** Bootstrap gallery ****/
require get_template_directory() . '/inc/bootstrap-gallery.php';

if ( ! function_exists( 'nevergreen_post_thumbnail' ) )  {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function nevergreen_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php } else { ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		} // End is_singular().
	}
}
