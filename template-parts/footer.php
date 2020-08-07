<?php

namespace ideasonpurpose;

$menu_locations = get_nav_menu_locations();
$menus = [];
$menu_key = 'menu-footer';
if (array_key_exists($menu_key, $menu_locations) && $menu_locations[$menu_key] !== 0) {
    $menu_id = intval($menu_locations[$menu_key]);
    $menus[$menu_key] = wp_nav_menu([
        'menu' => $menu_id,
        'menu_class' => 'footer__menu',
        'items_wrap' => '<ul class="%2$s">%3$s</ul>' . "\n",
        'container' => '',
        'echo' => false,
    ]);
}
?>

<!-- START template-parts/footer.php -->

<footer class="footer">
  <div class="wrapper">
    <div class="row">
      <div class="col-12">
        <h2>Footer</h2>

        <nav>
        <?php if (array_key_exists($menu_key, $menus)): ?>
            <?= $menus[$menu_key] ?>
        <?php endif; ?>
        </nav>
      </div>
    </div>
  </div>
</footer>

<!-- END template-parts/components/pagination.php -->
