<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SWD
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,400&display=swap" rel="stylesheet">
    <script type='text/javascript'>
        /* <![CDATA[ */
        var ajaxUrl = {"url":`http://${window.location.hostname}/wp-admin/admin-ajax.php`};
        /* ]]> */
    </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class('wrapper'); ?>>
<?php wp_body_open(); ?>
<aside class="main-sidebar">
	<span class="main-sidebar__logo">
		<img src="<?php echo get_template_directory_uri() . '/img/logoSWD.png' ?>" alt="logo">
	</span>
	<?php
	$swd_description = get_bloginfo( 'description', 'display' );
	if ( $swd_description || is_customize_preview() ) :
	?>
		<p class="site-description"><?php echo $swd_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
	<?php endif; ?>
	<div class="main-sidebar__menu">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'	 => 'main-sidebar__list'
				)
			);
		?>
	</div>
</aside>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'swd' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="top-header box">
			<div class="top-header__left">
				<?php get_template_part('component-phones');?>
				<div class="top-header__links">
					<a class="top-header__link" href="">office@dveriswd.com</a>
					<?php get_template_part('component-socials');?>
				</div>
			</div>
			<div class="top-header__right">
				<div class="lang"><?php echo do_shortcode('[google-translator]'); ?></div>
				<div class="location"><img class="location_marker" src="/wp-content/themes/swd/img/marker.svg" alt="geo marker" /> Санкт-Петербург</div>
				<div class="login-buttons">
					<button>Стать дилером</button>
					<button>Войти</button>
				</div>
			</div>
		</div>
		<div class="main-header box">
			<div class="mobile-logo">
				<?php
			the_custom_logo();
			?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'swd' ); ?></button>
				<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				)
				);
				?>
			</nav><!-- #site-navigation -->
			<div class="main-header__right">
				<div class="search search-toggle"><img class="location_marker" src="/wp-content/themes/swd/img/search.svg" alt="search image" />Поиск...</div>
				<a class="header-cart" href=""><img class="header-cart__image" src="/wp-content/themes/swd/img/cart.svg" alt="cart"></a>
				<a class="header-compare" href=""><img class="header-compare__image" src="/wp-content/themes/swd/img/compare.svg" alt="cart"></a>
				<div class="hidden-search">
                    <input class="hidden-search__input" type="text" value="" placeholder="Я хочу купить..." />
                    <button class="search-close search-toggle"><img class="hidden-search__close-image" src="/wp-content/themes/swd/img/close.svg" alt="close search" />Закрыть поиск</button>
                </div>
			</div>
		</div>
        <div class="site-header__search-result box"></div>
	</header><!-- #masthead -->