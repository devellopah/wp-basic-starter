<div class="not-found" id="not-found">
  <div class="container">
    <div class="not-found__wrap">
      <picture class="not-found__icon">
        <img src="<?= esc_url(get_field('icon')['url']) ?>" alt="<?= esc_attr(get_field('icon')['alt']) ?>">
      </picture>
      <span class="not-found__heading"><?php the_field('heading') ?></span>
      <p class="not-found__description"><?php the_field('description') ?></p>
      <a href="<?= esc_url(get_field('link')['url']) ?>" class="not-found__btn btn"><?= esc_html(get_field('link')['text']) ?></a>
    </div>
    <picture class="not-found__bg">
      <img src="<?= esc_url(get_field('404', 'option')['bg_image']['url']) ?>" alt="<?= esc_attr(get_field('404', 'option')['bg_image']['alt']) ?>">
    </picture>
  </div>
</div>