<?php
/**
 * Quantum-core functions and definitions
 *
 * @package Quantum-core
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'quantum_core_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function quantum_core_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Quantum-core, use a find and replace
	 * to change 'quantum-core' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'quantum-core', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'quantum-core' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'quantum_core_custom_background_args', array(
		'default-color' => '303030',
		'default-image' => '',
	) ) );
}
endif; // quantum_core_setup
add_action( 'after_setup_theme', 'quantum_core_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function quantum_core_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'quantum-core' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'quantum_core_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function quantum_core_scripts() {

	global $wp_scripts;

	wp_register_script('html5_shiv','https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js','','',false);
    wp_register_script('respond','https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js','','',false);

    $wp_scripts->add_data('html5_shiv','conditional','lt IE9');
    $wp_scripts->add_data('respond','conditional','lt IE9');

    wp_enqueue_style( 'quantum-core-resetcss',get_template_directory_uri(). '/css/reset.css' );

	wp_enqueue_style( 'quantum-core-style', get_stylesheet_uri() );

	wp_enqueue_style( 'quantum-core-purecss',get_template_directory_uri(). '/css/pure-min.css' );

	wp_enqueue_style( 'quantum-core-purecgrid',get_template_directory_uri(). '/css/grids-responsive-min.css' );

	wp_enqueue_style( 'quantum-core-fontawesome','//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'quantum-core-modernizrjs', get_template_directory_uri() . '/js/modernizr.js', array( ), '49127', true );

	wp_enqueue_script( 'quantum-core-jrespondjs', get_template_directory_uri() . '/js/jRespond.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'quantum-core-jpaneljs', get_template_directory_uri() . '/js/jquery.jpanelmenu.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'quantum-core-jquery.matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '', true );

	wp_enqueue_script( 'quantum-core-themejs', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'quantum_core_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 *Loading Google Fonts
 */
function theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Pompiere, translate this to 'off'. Do not translate
    * into your own language.
    */
    
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $dosis = _x( 'on', 'Dosis font: on or off', 'theme-slug' );

    $pompiere = _x( 'on', 'Pompiere font: on or off', 'theme-slug' );

    $loved_by_the_king = _x( 'on', 'Loved by the king font: on or off', 'theme-slug' );

    $ubuntu_condensed = _x( 'on', 'Ubuntu condensed font: on or off', 'theme-slug' );
 
    if ( 'off' !== $pompiere || 'off' !== $loved_by_the_king || 'off' !== $ubuntu_condensed || 'off' !== $dosis) {
        $font_families = array();
 
        if ( 'off' !== $pompiere ) {
            $font_families[] = 'Pompiere:400,700,400italic';
        }
 		if ( 'off' !== $dosis) {
            $font_families[] = 'Dosis:400,700,400italic';
        }
        if ( 'off' !== $loved_by_the_king ) {
            $font_families[] = 'Loved by the King:700italic,400,800,600';
        }

        if ( 'off' !== $ubuntu_condensed ) {
            $font_families[] = 'Ubuntu Condensed:400,700,400italic';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}
function theme_slug_scripts_styles() {
    wp_enqueue_style( 'theme-slug-fonts', theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_scripts_styles' );
function new_excerpt_more( $more ) {
	return ' .... <a class="button-read-more pure-button " href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function quantum_core_add_editor_styles() {
    add_editor_style( get_template_directory_uri(). '/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'quantum_core_add_editor_styles' );