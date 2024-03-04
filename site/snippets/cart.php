<?php
  $shippingPrice = 0;
  foreach ($cart->filter('template', 'shipping') as $shippingItem) {
      $shippingPrice += $shippingItem['price'];
  }
?>

<div class="cart">
  <div class="cart-header">
      <div class="main-menu">
          <div class="main-nav-wrapper">
              <h1 class="button static-button">Viaindustriae</h1>
              <div class="button static-button">Publishing</div>
          </div>
      </div>
  </div>
  <div class="cart-content">
    <div class="cart-content-wrapper">
        <ul class="cart-items">
            <li class="cart-item text-title"><?= t('cart.product') ?></li>
            <li class="cart-item text-title"><?= t('cart.quantity') ?></li>
            <li class="cart-item text-title"><?= t('cart.price') ?></li>
        </ul>
        <?php foreach ($cart->filter('template', '!=', 'shipping') as $item) : ?>
            <ul class="cart-items">
              <li class="cart-item text-subtitle">
                <?php if ($productPage = page($item['id'])) : ?>
                  <a href="<?= $productPage->url() ?>" target="_blank" rel="noopener noreferrer"><?= $item['title'] ?></a>
                <?php else : ?>
                  <?= $item['title'] ?>
                <?php endif ?>
              </li>
              <li class="cart-item text-subtitle"><?= $item['quantity'] ?></li>
              <li class="cart-item text-subtitle"><?= $item['price'] ?> Euro</li>
            </ul>
        <?php endforeach ?>
    </div>
    <div class="cart-content-wrapper">
        <div class="cart-sum">
            <p class="text-title"><?= t('cart.shipping') ?></p>
            <p class="text-subtitle"><?= $shippingPrice === 0 ? t('cart.free-shipping') : $shippingPrice ?> Euro</p>
        </div>
        <div class="cart-sum">
            <p class="text-title"><?= t('cart.sum') ?></p>
            <p class="text-subtitle"><?= $cart->getSum() ?> Euro</p>
        </div>
    </div>
  </div>  
</div>