<?php
/**
 * AltumTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AltumTheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function altumtheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on AltumTheme, use a find and replace
		* to change 'altumtheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'altumtheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Header', 'altumtheme' ),
			'menu-2' => esc_html__( 'Footer', 'altumtheme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'altumtheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'altumtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function altumtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'altumtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'altumtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function altumtheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'altumtheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'altumtheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'altumtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function altumtheme_scripts() {
	wp_enqueue_style( 'altumtheme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'altumtheme-style', 'rtl', 'replace' );
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('fontAwesomeCSS', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'altumtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.0, true);
    wp_enqueue_script('fontAwesome', 'https://kit.fontawesome.com/24bc428ad4.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'altumtheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** Custom Post Types */
function altum_post_types() {

	// Speakers Post Type
    register_post_type('speaker', array(
        'public' => true,
        'labels' => array( 
            'name' => 'Speakers',
            'add_new_item' => 'Add New Speaker',
            'edit_item' => 'Edit Speaker',
            'all_items' => 'All Speakers',
            'singular_name' => 'Speaker',
        ),
        'menu_icon' => 'dashicons-megaphone', // googled "wordpress dashicons"
        'rewrite' => array('slug' => 'speakers'),
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));

}

add_action('init', 'altum_post_types');

/** Custom image sizes */

add_image_size( 'country-of-origin', 8, 8, true );
add_image_size( 'single-speaker', 250, 300, true );
add_image_size( 'speakers-card', 180, 180, true );

/** Custom Taxonomies */

// Position Taxonomy for Speakers Custom Post Type
function speakersPositionTaxonomy() {
    $args = array(
        'label'        => __( 'Position', 'textdomain' ),
        'rewrite'      => false,
        'hierarchical' => true
    );
    
    register_taxonomy( 'position', 'speaker', $args );
}
add_action( 'init', 'speakersPositionTaxonomy', 0 );

// Position Taxonomy for Speakers Custom Post Type
function speakersCountryTaxonomy() {
    $args = array(
        'label'        => __( 'Country', 'textdomain' ),
        'rewrite'      => false,
        'hierarchical' => true
    );
    
    register_taxonomy( 'country', 'speaker', $args );
}
add_action( 'init', 'speakersCountryTaxonomy', 0 );