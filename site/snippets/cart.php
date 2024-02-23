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
          <div class="close-ui cart-close">
              <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 1L1 13M1 1L13 13"/>
              </svg>
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
              <li class="cart-item text-subtitle"><?= $item['price'] ?></li>
            </ul>
        <?php endforeach ?>
    </div>
    <div class="cart-content-wrapper">
        <div class="cart-sum">
            <p class="text-title"><?= t('cart.shipping') ?></p>
            <p class="text-subtitle"><?= $shippingPrice === 0 ? t('cart.free-shipping') : $shippingPrice ?></p>
        </div>
        <div class="cart-sum">
            <p class="text-title"><?= t('cart.sum') ?></p>
            <p class="text-subtitle"><?= $cart->getSum() ?></p>
        </div>
    </div>
    <div class="cart-content-wrapper">
      <a href="" class="button checkout-button"><?= t('cart.to-checkout') ?></a>
    </div>
  </div>  
</div>