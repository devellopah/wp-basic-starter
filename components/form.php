<form action="#" class="form <?= $args['namespace'] ?>-form <?= $args['namespace'] ?>__form js-form js-form-wrapper-block" data-action="application_form" novalidate>
  <div class="input-field <?= $args['namespace'] ?>-form__input js-field">
    <input type="text" class="input-field__input" name="name" placeholder="<?= esc_html(get_field('form_name_field', 'option')['placeholder']) ?>" required>
    <span class="input-field__error">
      <span><?= esc_html(get_field('form_name_field', 'option')['error_text']) ?></span>
      <svg>
        <use xlink:href="<?= THEME_URI ?>/assets/img/sprite.svg#icon-triangle-error"></use>
      </svg>
    </span>
  </div>
  <div class="input-field <?= $args['namespace'] ?>-form__input js-field">
    <input type="tel" class="input-field__input" name="tel" placeholder="<?= esc_html(get_field('form_tel_field', 'option')['placeholder']) ?>" required>
    <span class="input-field__error">
      <span><?= esc_html(get_field('form_tel_field', 'option')['error_text']) ?></span>
      <svg>
        <use xlink:href="<?= THEME_URI ?>/assets/img/sprite.svg#icon-triangle-error"></use>
      </svg>
    </span>
  </div>

  <?php if ($args['namespace'] === 'booking') : ?>
    <div class="input-field <?= $args['namespace'] ?>-form__input js-field">
      <input type="text" class="input-field__input" name="email" placeholder="<?= esc_html(get_field('form_email_field', 'option')['placeholder']) ?>" required>
      <span class="input-field__error">
        <span><?= esc_html(get_field('form_email_field', 'option')['error_text']) ?></span>
        <svg>
          <use xlink:href="<?= THEME_URI ?>/assets/img/sprite.svg#icon-triangle-error"></use>
        </svg>
      </span>
    </div>
  <?php else: ?>
    <div class="input-field <?= $args['namespace'] ?>-form__input js-field">
      <textarea class="input-field__textarea" name="message" placeholder="<?= esc_html(get_field('form_message_field', 'option')['placeholder']) ?>" required></textarea>
      <span class="input-field__error"><?= esc_html(get_field('form_message_field', 'option')['error_text']) ?></span>
    </div>
  <?php endif; ?>

  <span class="form__copyright"><span><?= esc_html(get_field('form_consent', 'option')['before_link']) ?></span> <a href="<?= esc_url(get_privacy_policy_url()) ?>"><?= esc_html(get_field('form_consent', 'option')['link_text']) ?></a>
  </span>

  <?php if ($args['namespace'] === 'booking') : ?>
    <div class="booking-form__inner">
      <button class="booking-form__btn btn btn--blue"><?= esc_html(get_field('form_submit_text', 'option')) ?></button>
      <span class="booking-form__price"><?php mw_the_tour_fee() ?></span>
    </div>
  <?php else: ?>
    <button type="submit" class="<?= $args['namespace'] ?>-form__btn btn"><?= esc_html(get_field('form_submit_text', 'option')) ?></button>
  <?php endif; ?>

</form>










<div class="not-found__wrap js-form-wrapper-block" style="padding: 0; min-height: auto;" data-message="success">
  <picture class="not-found__icon">
    <img src="<?= esc_url(get_field('form_submission_success', 'option')['image']['url']) ?>" alt="<?= esc_attr(get_field('form_submission_success', 'option')['image']['alt']) ?>">
  </picture>
  <span class="not-found__heading"><?= esc_html(get_field('form_submission_success', 'option')['heading']) ?></span>
  <p class="not-found__description"><?= wp_kses_post(get_field('form_submission_success', 'option')['description']) ?></p>

  <?php if ($args['namespace'] === 'application') : ?>
    <button class="not-found__btn btn js-btn-success"><?= esc_html(get_field('form_submission_success', 'option')['btn_text']) ?></button>
  <?php endif ?>

</div>

<div class="not-found__wrap js-form-wrapper-block" style="padding: 0; min-height: auto;" data-message="fail">
  <picture class="not-found__icon">
    <img src="<?= esc_url(get_field('form_submission_fail', 'option')['image']['url']) ?>" alt="<?= esc_attr(get_field('form_submission_fail', 'option')['image']['alt']) ?>">
  </picture>
  <span class="not-found__heading"><?= esc_html(get_field('form_submission_fail', 'option')['heading']) ?></span>
  <p class="not-found__description"><?= wp_kses_post(get_field('form_submission_fail', 'option')['description']) ?></p>

  <button class="not-found__btn btn js-form-revealer"><?= esc_html(get_field('form_submission_fail', 'option')['btn_text']) ?></button>
</div>