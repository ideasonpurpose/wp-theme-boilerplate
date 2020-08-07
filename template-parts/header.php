<?php

namespace ideasonpurpose;

$menu_locations = get_nav_menu_locations();
$menus = [];
$menu_key = 'menu-main';
if (array_key_exists($menu_key, $menu_locations) && $menu_locations[$menu_key] !== 0) {
    $menu_id = intval($menu_locations[$menu_key]);
    $menus[$menu_key] = wp_nav_menu([
        'menu' => $menu_id,
        'menu_class' => 'header__menu-list',
        'items_wrap' => '<ul class="%2$s">%3$s</ul>' . "\n",
        'container' => '',
        'echo' => false,
    ]);
}
?>

<!-- START template-parts/header.php -->

<header class="header">
  <nav class="header__container wrapper">
    <div class="header__bar">
      <a class="header__logo" href="<?= bloginfo('url') ?>">
        <?php echo file_get_contents(get_template_directory_uri() . "/dist/images/svg/site-logo.svg"); ?>
      </a>

      <button type="button" class="header__menu-button js-toggle-menu">
        <span class="header__menu-button-lines"></span>
        <span class="a11y">Toggle main menu</span>
      </button>
    </div>

    <div class="header__menu">
      <?php get_template_part('template-parts/components/search-form', 'header'); ?>

      <?php if (array_key_exists($menu_key, $menus)): ?>
      <?= $menus[$menu_key] ?>
      <?php endif; ?>
    </div>
  </nav>
</header>

<!-- END template-parts/header.php -->
