<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basic_Starter
 */
$options = get_fields('options');
?>

</div>
<!-- end of content -->
<?php if (!is_404()) : ?>
	<!-- footer -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="footer__main">
				<div class="c-socnav footer__socnav">
					<ul class="c-socnav__list">
						<?php if (!empty($options['socials'])) :
							foreach ($options['socials'] as $item) : ?>
								<li class="c-socnav__item">
									<a href="<?= esc_url($item['url']) ?>" title="<?= esc_attr($item['title']) ?>" target="_blank" class="c-socnav__link">
										<?php if ($item['icon']) : ?>
											<img class="c-socnav__icon" src="<?= esc_url($item['icon']['url']) ?>" alt="<?= esc_attr($item['icon']['alt']) ?>">
										<?php else: ?>
											<span><?= esc_html($item['title']) ?></span>
										<?php endif; ?>
									</a>
								</li>
						<?php endforeach;
						endif; ?>
					</ul>
				</div>
				<a href="<?= home_url() ?>" class="footer__logotype">
					<?php if (!empty($options['footer_logo_desc_1'])) : ?>
						<img src="<?= esc_url($options['footer_logo_desc_1']['url']) ?>" alt="<?= esc_attr($options['footer_logo_desc_1']['alt']) ?>" width="154" height="96">
					<?php endif ?>
				</a>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						// 'items_wrap' => '<ul class="%2$s">%3$s</ul>',
						'items_wrap' => '<ul class="%2$s"><li class="footer-nav__item"><a href="' . home_url() . '" class="footer-nav__link">Главная</a></li>%3$s</ul>',
						'menu_class' => 'footer-nav__list',
						'container' => 'nav',
						'container_class' => 'footer-nav footer__nav',
						'fallback_cb' => '__return_empty_string',
						'walker' => new Basic_Starter_Footer_Menu_Walker()
					)
				);
				?>
				<div class="footer-contacts footer__contacts">
					<ul class="footer-contacts__list">
						<?php if (!empty($options['footer_tel_1'])) : ?>
							<li class="footer-contacts__item">
								<a href="tel:<?php mw_tel_sanitized($options['footer_tel_1']) ?>" class="footer-contacts__link"><?= esc_html($options['footer_tel_1']) ?></a>
							</li>
						<?php endif ?>
						<li class="footer-contacts__item">
							<a href="mailto:<?php bloginfo('admin_email') ?>" class="footer-contacts__link"><?php bloginfo('admin_email') ?></a>
						</li>
						<?php if (!empty($options['city'])) : ?>
							<li class="footer-contacts__item">
								<address class="footer-contacts__link"><?= esc_html($options['city']) ?> <?= esc_html(get_field('street', 'option')) ?> <?= esc_html(get_field('building', 'option')) ?></address>
							</li>
						<?php endif ?>
					</ul>
				</div>
				<?php if (function_exists('wp_email_capture_form')) : ?>
					<div class="c-subscribe footer__subscribe">
						<span class="c-subscribe__title"><?php the_field('newsletter_heading', 'option') ?></span>
						<?= do_shortcode('[wp_email_capture_form]'); ?>
					</div>
			</div>
		<?php endif; ?>
		<div class="footer__bottom">
			<?php if (!empty($options['footer_copyright'])) : ?>
				<p class="footer__copyright"><?php the_field('footer_copyright', 'option') ?></p>
			<?php endif ?>
			<?php if (!empty($options['footer_agency']) && $options['footer_agency']['link']) : ?>
				<a href="<?= esc_url(get_field('footer_agency', 'option')['link']) ?>" class="footer__dev" target="_blank">
					<?php if ($options['footer_agency']['image']) : ?>
						<img src="<?= esc_url(get_field('footer_agency', 'option')['image']['url']) ?>" alt="<?= esc_attr(get_field('footer_agency', 'option')['image']['alt']) ?>">
					<?php endif ?>
				</a>
			<?php endif ?>
		</div>
		</div>
	</footer>
	<!-- end of footer -->
<?php endif; ?>
</div>
<!-- end of wrapper -->

<!-- menu -->
<div class="menu" id="menu">
	<div class="menu__wrap">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'items_wrap' => '<ul class="%2$s"><li class="nav__item"><a href="' . home_url() . '" class="nav__link">Главная</a></li>%3$s</ul>',
				'menu_class' => 'nav__list',
				'container' => 'nav',
				'container_class' => 'nav menu__nav',
				'fallback_cb' => '__return_empty_string',
				'walker' => new Basic_Starter_Primary_Menu_Walker()
			)
		);
		?>
		<a href="tel:<?php mw_tel_sanitized($options['footer_tel_1']) ?>" class="menu__link"><?= esc_html($options['footer_tel_1']) ?></a>
	</div>
</div>
<!-- end of menu -->

<?php if (!empty($options['form_consent'])) : ?>
	<div class="modal" id="modal-application">
		<div class="modal__wrap">
			<button class="modal__close-btn modal__close" aria-label="Закрыть">
				<svg>
					<use xlink:href="<?= THEME_URI ?>/assets/img/sprite.svg#icon-close"></use>
				</svg>
			</button>
			<div class="application modal__application js-form-wrapper">
				<div class="application__wrap">
					<?= get_template_part('components/form', null, ['namespace' => 'application']) ?>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- popups -->
<?php if (!empty($options['submit_success'])) : ?>
	<div class="popup js-popup" id="popup-application-success">
		<div class="popup__wrap">
			<div class="popup__wrapper">
				<picture class="popup__icon">
					<img src="<?= esc_url(get_field('submit_success', 'option')['image']['url']) ?>" alt="<?= esc_attr(get_field('submit_success', 'option')['image']['alt']) ?>">
				</picture>
				<span class="popup__title"><?= esc_html(get_field('submit_success', 'option')['heading']) ?></span>
				<span class="popup__description"><?= wp_kses_post(get_field('submit_success', 'option')['description']) ?></span>
				<button class="popup__btn btn js-popup-closer"><?= esc_html(get_field('submit_success', 'option')['btn_text']) ?></button>
			</div>
		</div>
	</div>
<?php endif ?>


<?php if (!empty($options['submit_fail'])) : ?>
	<div class="popup js-popup" id="popup-application-fail">
		<div class="popup__wrap">
			<div class="popup__wrapper">
				<picture class="popup__icon">
					<img src="<?= esc_url(get_field('submit_fail', 'option')['image']['url']) ?>" alt="<?= esc_attr(get_field('submit_fail', 'option')['image']['alt']) ?>">
				</picture>
				<span class="popup__title"><?= esc_html(get_field('submit_fail', 'option')['heading']) ?></span>
				<span class="popup__description"><?= wp_kses_post(get_field('submit_fail', 'option')['description']) ?></span>
				<button class="popup__btn btn js-popup-closer"><?= esc_html(get_field('submit_fail', 'option')['btn_text']) ?></button>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- end of popups -->

<?php if (function_exists('wp_email_capture_form')) : ?>
	<div class="popup" id="popup-subscribe-error" data-placeholder_email="<?= the_field('newsletter_placeholder_email', 'option') ?>" data-error_user="<?= the_field('newsletter_error_user', 'option') ?>" data-error_email="<?= the_field('newsletter_error_email', 'option') ?>">
		<div class="popup__wrap">
			<div class="popup__wrapper">
				<picture class="popup__icon">
					<img src="<?= THEME_URI ?>/assets/img/icon-error.svg" alt="">
				</picture>
				<span class="popup__title"><?= the_field('newsletter_error_heading', 'option') ?></span>
				<span class="popup__description js-newsletter-error"></span>
				<button id="to-newsletter-scroller" class="popup__btn btn"><?= the_field('newsletter_error_btn_text', 'option') ?></button>
			</div>
		</div>
	</div>

	<script>
		(function($) {
			$body = $(document.body)
			$newsletterModal = $body.find('#popup-subscribe-error')
			$error = $body.find('.wp-email-capture-error')
			if ($error.length) {
				console.log('error', $error.text())
				$errorText = $error.text()
				if ($errorText.toLowerCase().includes('email')) {
					$errorText = $newsletterModal.data('error_email')
				} else if ($errorText.toLowerCase().includes('user')) {
					$errorText = $newsletterModal.data('error_user')
				}

				$body.addClass('scroll-disabled')
				$newsletterModal.addClass('is--active')
				$body.find('.js-newsletter-error').text($errorText)
				$error.remove()

				$('#to-newsletter-scroller').on('click', function() {
					$body.removeClass('scroll-disabled')
					$newsletterModal.removeClass('is--active')

					$('#wp_email_capture_2')[0].scrollIntoView({
						behavior: 'instant'
					})
				})
			}
			$form = $('[name=wp_email_capture_display]')
			$form.addClass('c-subscribe__form').wrapInner('<div class="c-subscribe__inner"></div>')
			$form.find('br').remove()
			$form.find('.wp-email-capture-email-label').remove()
			$form.find('.wp-email-capture-email-input').addClass('c-subscribe__input').prop('placeholder', $newsletterModal.data('placeholder_email'))
			$form.find('.wp-email-capture-name').hide()
			$form.find('[type=submit]').replaceWith('<button name="Submit" type="submit" class="wp-email-capture-submit wp-email-capture-widget-worldwide c-subscribe__btn" aria-label="Отправить"> <svg><use xlink: href = "<?= THEME_URI ?>/assets/img/sprite.svg#icon-plus" > < /use> </svg> </button>')
		})(jQuery)
	</script>

<?php endif ?>

<?php wp_footer(); ?>

</body>

</html>