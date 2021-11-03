<?php
/**
 * SWD functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SWD
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'swd_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function swd_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SWD, use a find and replace
		 * to change 'swd' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'swd', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'swd' ),
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
				'swd_custom_background_args',
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
add_action( 'after_setup_theme', 'swd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function swd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'swd_content_width', 640 );
}
add_action( 'after_setup_theme', 'swd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function swd_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'swd' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'swd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'swd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function swd_scripts() {
	wp_enqueue_style( 'swd-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'swd-style', 'rtl', 'replace' );

	wp_enqueue_script( 'swd-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'ajax', get_template_directory_uri() . '/assets/js/ajax.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'swd_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**/

/* var dump
 *****************************************/
function dump ($arg){
    echo '<pre>';
    var_dump($arg);
    echo '</pre>';
}
/**/


//ajax products filter
add_action('wp_ajax_refresh_products_filter', 'refresh_products_filter');
add_action('wp_ajax_nopriv_refresh_products_filter', 'refresh_products_filter');
function refresh_products_filter(){

    $search_string = isset($_POST["search_string"]) ? $_POST["search_string"] : null;

    $args = array(
        'limit' => 5,
        'like_name' => $search_string,
        'return' => 'ids',
    );
    $ids_by_name = wc_get_products( $args );

    $termIds = get_terms([
        'name__like' => $search_string,
        'fields' => 'ids'
    ]);
    $ids_by_category_query = array(
        'limit' => 5,
        'post_type' => 'product',
        //'category' => 'misc',
        //'return' => 'ids',
        'fields'        => 'ids',
        'tax_query'             => array(
            array(
                'taxonomy'      => 'product_cat',
                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms'         => $termIds,
                'operator'      => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
                'compare' => 'LIKE'
            ),
        )
    );
    $ids_by_category = get_posts($ids_by_category_query);
    if($search_string === ''){
        echo false;
    } elseif($ids_by_name || $ids_by_category){
        $products_ids_string = implode(",", $ids_by_name) . "," . implode(",", $ids_by_category);
        echo '<div>' . do_shortcode('[products ids=' . $products_ids_string . ']') . '</div>';
    }else{
        echo false;
    }

    wp_die();
}
/**/


/* wc_get_products filter by like name
-----------------------------------*/
add_filter( 'woocommerce_product_data_store_cpt_get_products_query', 'handle_custom_query_var', 10, 2 );
function handle_custom_query_var( $query, $query_vars ) {
    if ( isset( $query_vars['like_name'] ) && ! empty( $query_vars['like_name'] ) ) {
        $query['s'] = esc_attr( $query_vars['like_name'] );
    }
    return $query;
}

/*---------------------------------*/



//wc add to cart ajax
add_action('wp_ajax_return_cart', 'return_cart');
add_action('wp_ajax_nopriv_return_cart', 'return_cart');
function return_cart(){
//    global $woocommerce;
//    $woocommerce->cart->add_to_cart( $product_id = 31, $quantity = 100, $variation_id = 0, $variation = array(), $cart_item_data = array() );
    echo do_shortcode('[woocommerce_cart]');
    wp_die();
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );
/**/


function add_cors_http_header(){
    header("Access-Control-Allow-Origin: http://swd:3000");
}
add_action('init','add_cors_http_header');
/**/


/*Cart Quantity fields
--------------------------*/
// Minimum CSS to remove +/- default buttons on input field type number
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
        .quantity input::-webkit-outer-spin-button,
        .quantity input::-webkit-inner-spin-button {
            display: none;
            margin: 0;
        }
        .quantity input.qty {
            appearance: textfield;
            -webkit-appearance: none;
            -moz-appearance: textfield;
        }
    </style>
    <?php
}

add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
        jQuery( function( $ ) {
            if ( ! String.prototype.getDecimals ) {
                String.prototype.getDecimals = function() {
                    var num = this,
                        match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                    if ( ! match ) {
                        return 0;
                    }
                    return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
                }
            }
            // Quantity "plus" and "minus" buttons
            $( document.body ).on( 'click', '.plus, .minus', function() {
                var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                    currentVal  = parseFloat( $qty.val() ),
                    max         = parseFloat( $qty.attr( 'max' ) ),
                    min         = parseFloat( $qty.attr( 'min' ) ),
                    step        = $qty.attr( 'step' );

                // Format values
                if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
                if ( max === '' || max === 'NaN' ) max = '';
                if ( min === '' || min === 'NaN' ) min = 0;
                if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

                // Change the value
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( currentVal >= max ) ) {
                        $qty.val( max );
                    } else {
                        $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                    }
                } else {
                    if ( min && ( currentVal <= min ) ) {
                        $qty.val( min );
                    } else if ( currentVal > 0 ) {
                        $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                    }
                }

                // Trigger change event
                $qty.trigger( 'change' );
            });
        });
    </script>
    <?php
}
/*-----------------------------------------*/


