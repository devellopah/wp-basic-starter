<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basic_Starter
 */

// global $wp;
// $currentPageUrl = home_url($wp->request);
// $language = str_contains($currentPageUrl, site_url('/en')) ? 'ru' : 'en';
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- wrapper -->
	<div class="wrapper">
		<!-- header -->
		<header id="header" class="header">
			<div class="container">
				<div class="header__wrapper">
					<a href="<?= home_url() ?>" class="header__logotype">
						<img class="default" src="<?= esc_url(get_field('header_logo_desc_1', 'option')['url']) ?>" alt="<?= esc_attr(get_field('header_logo_desc_1', 'option')['alt']) ?>" width="100" height="62">
					</a>
					<?php
					if (!is_404()) :
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'items_wrap' => '<ul class="%2$s">%3$s</ul>',
								'menu_class' => 'nav__list',
								'container' => 'nav',
								'container_class' => 'nav header__nav',
								'fallback_cb' => '__return_empty_string',
								'walker' => new Basic_Starter_Primary_Menu_Walker()
							)
						);
					?>

						<a href="tel:<?php mw_tel_sanitized(get_field('header_tel_1', 'option')) ?>" class="header__link"><?= esc_html(get_field('header_tel_1', 'option')) ?></a>

						<!-- <a href="<?= esc_url(wpm_translate_url($currentPageUrl, $language)) ?>" class="header__language">
							<?= strtoupper($language) ?>
						</a> -->

						<button class="hamburger" id="hamburger-toggle" aria-label="Меню">
							<span class="hamburger__inner"></span>
							<span class="hamburger__inner"></span>
						</button>

					<?php endif; ?>

				</div>
			</div>
		</header>
		<!-- end of header -->
		<!-- content -->
		<div class="wrapper__content">