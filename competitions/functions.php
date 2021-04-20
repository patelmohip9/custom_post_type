<?php
/**
 * competitions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package competitions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'competitions_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function competitions_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on competitions, use a find and replace
		 * to change 'competitions' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'competitions', get_template_directory() . '/languages' );

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
				'Primary' => esc_html__( 'Primary Menu', 'competitions' ),
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
				'competitions_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'competitions_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function competitions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'competitions_content_width', 640 );
}
add_action( 'after_setup_theme', 'competitions_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function competitions_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'competitions' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'competitions' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'competitions_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function competitions_scripts() {
	wp_enqueue_style( 'competitions-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'competitions-style1', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap.css', array(), _S_VERSION );
	wp_enqueue_style( 'competitions-style2', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'competitions-style3', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap-grid.css', array(), _S_VERSION );
	wp_enqueue_style( 'competitions-style4', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap-grid.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'competitions-style5', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap-grid.min.css.map', array(), _S_VERSION );
	wp_enqueue_style( 'competitions-style6', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap-grid.css.map', array(), _S_VERSION );
	wp_style_add_data( 'competitions-style', 'rtl', 'replace' );

	wp_enqueue_script( 'competitions-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'competitions-navigation0', get_template_directory_uri() . '/vendor/jquery/jquery.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'competitions-navigation3', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'competitions-navigation1', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'competitions-navigation2', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'competitions-navigation4', get_template_directory_uri() . '/js/add_entry.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'competitions-navigation5', get_template_directory_uri() . '/js/signup.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'competitions-navigation6', get_template_directory_uri() . '/js/login.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$params = array(
		'ajaxurl'		=> admin_url('admin-ajax.php'),
		'nonce'			=> wp_create_nonce("competititon_nonce")
	);
	wp_localize_script( 'competitions-navigation4','myAjax', $params );
	wp_localize_script( 'competitions-navigation5','myAjax', $params );
	wp_localize_script( 'competitions-navigation6','myAjax', $params );
}
add_action( 'wp_enqueue_scripts', 'competitions_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

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

//========================================= rewrite rule ======================================================================
/* add_action('init', 'author_rewrite_rules');
function author_rewrite_rules() {
global $wp_rewrite;
$wp_rewrite->author_base = 'people';
}
add_filter('post_rewrite_rules', '__return_empty_array');
add_filter('date_rewrite_rules', '__return_empty_array');
add_filter('comments_rewrite_rules', '__return_empty_array');
add_filter('search_rewrite_rules', '__return_empty_array');
add_filter('author_rewrite_rules', '__return_empty_array');
add_filter('page_rewrite_rules', '__return_empty_array');

add_filter('{post_type}_rewrite_rules', '__return_empty_array');
add_filter('{taxonomy}_rewrite_rules', '__return_empty_array');

function custom_rewrite_tag( $vars ) {
	add_rewrite_tag( '%competitions%', '([^&]+)');
	}
	add_action( 'init', 'custom_rewrite_tag');

	get_query_var( 'competitions', false );
	add_filter( 'template_include', 'add_competitions_to_hierarchy' );
	function add_competitions_to_hierarchy( $original_template ) {
		if ( get_query_var( 'competitions', false ) ) {
			return get_query_template( 'competitions' );
		} 
		else {
			return $original_template;
		}
	}*/

	function competitions_rewrite_rule() {
		add_rewrite_rule('^competition/([^/]*)/?', 'index.php?competition=$matches[1]?p=17', 'top');
		// flush_rewrite_rules( );
	}
	add_action('init', 'competitions_rewrite_rule', 10, 0); 

	function new_rewrite_rule() {
		add_rewrite_rule('^competitions/submit-entry/([^/]*)/?', 'index.php?competitions?submit-entry=$matches[1]?p=17', 'top');
	}
	add_action('init', 'new_rewrite_rule', 10, 0); 


//====================================================================================================================

add_action( 'wp_ajax_my_action', 'usre_entry' );
add_action( 'wp_ajax_nopriv_my_action', 'usre_entry' );
function usre_entry() {
	if(!wp_verify_nonce($_REQUEST['nonce'] , "competititon_nonce")) {
		exit(" unauthorized....!!! ");
	  }
	$data['success'] = false;
	$first_name = sanitize_text_field($_POST['first_name']);
	$last_name = sanitize_text_field($_POST['last_name']);
	$email = sanitize_email($_POST['email']);
	$phone = sanitize_text_field($_POST['phone']) ;
	$description = sanitize_text_field($_POST['description']);
	$competition = $_POST['competition'];
	$name = $first_name.$last_name;

    $args = array(
    'post_title'    => $name,
    'post_status'   => 'publish',
    'post_type'     => 'entries'
    );
	$post_id = wp_insert_post($args);
	if($post_id) {
		echo('hii');
		$data['success'] = true;

		update_field('email',$email,$post_id);
		update_field('phone',$phone,$post_id);
		update_field('description',$competition,$post_id);
		update_post_meta($post_id, "competition", $competition);
	}
	echo json_encode($data);
	wp_die();
}

add_action( 'wp_ajax_my_action_signup', 'signup' );
add_action( 'wp_ajax_nopriv_my_action_signup', 'signup' );

function signup() {
	if(!wp_verify_nonce($_REQUEST['nonce'] , "competititon_nonce")) {
		exit(" unauthorized....!!! ");
	}
	$data['success'] = false;
	$first_name = sanitize_text_field($_POST['first_name']);
	$last_name = sanitize_text_field($_POST['last_name']);
	$user_name = sanitize_text_field($_POST['user_name']);
	$email = sanitize_email($_POST['email']);
	$password =$_POST['password'];

	$userdata = array(
		'first_name'	=> $first_name,
		'last_name'		=> $last_name,
		'user_login'	=> $user_name ,
		'user_email'	=> $email,
		'user_pass'		=> $password
	);
	$user_id = wp_insert_user( $userdata ) ;
	if($user_id) {
		$data['success'] = true;
		echo $user_id;
	}
	echo json_encode($data);
}

add_action( 'wp_ajax_my_action_login', 'login' );
add_action( 'wp_ajax_nopriv_my_action_login', 'login' );

function login() {
	if(!wp_verify_nonce($_REQUEST['nonce'] , "competititon_nonce")) {
		exit(" unauthorized....!!! ");
	  }
		$user_name_l = sanitize_text_field($_POST['user_name_l']);
		$password_l =$_POST['password_l'];
		
		$creds = array(
			'user_login'	=> $user_name_l ,
			'user_password'		=> $password_l,
		);

		$user_data = wp_signon($creds,false );
		
		if ( is_wp_error( $user_data ) ) {
			$data['message'] = $user_data->get_error_message();
			$data['success'] = false;
			wp_send_json_error($data);
		}
		else {
			$data['name'] = $user_name_l;
			wp_send_json_success($data);
		}
}
add_filter( 'wp_nav_menu_objects', 'my_custom_menu_item');
function my_custom_menu_item($items) {
	$remove_childs_of = array();
    foreach($items as $index => $item) {
		if($item->title == "Login") {
            if(is_user_logged_in()) {
                $user=wp_get_current_user();
                $name=$user->display_name; // or user_login , user_firstname, user_lastname
                $items[$index]->title = "Hello, ".$name;
			}
            else {
                array_push($remove_childs_of, $item->ID);
                unset($items[$index]);
            }
        }
        if(!empty($remove_childs_of) && in_array($item->menu_item_parent, $remove_childs_of)) {
            array_push($remove_childs_of, $item->ID);
            unset($items[$index]);
        }
    }
    return $items;
}