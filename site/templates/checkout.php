<?php
/**
 * Shows a form to collect user data and payment information.
 * The form is build using the personalData section of the order blueprint.
 * See site/controllers/checkout.php for more information.
 * Each field type has a own snippet (e.g. snippet('fields/text') - /site/snippets/fields/text.php).
 * If no suitable snippet is found, fields/text snippet is used.
 *
 * @var array $fields
 * @var mixed $message
 */
?>

<?php snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('order') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php if ($message): ?>
  <div class="global-message"><?= $message ?></div>
<?php endif ?>

<main class="main content checkout">
  <div class="checkout-form-wrapper">
    <form method="post" class="checkout-form" id="checkout-form" action="/api/shop/checkout">
      <?php foreach ($fields as $field) : ?>
        <?= snippet(['fields/' . $field['type'], 'fields/text'], compact('field')) ?>
      <?php endforeach ?>
      <?= snippet('payment-methods') ?>
      <button type="submit" class="button action-button"><?= t('product.add-to-cart') ?></button>
    </form>
  </div>
  <div class="cart" id="cart" data-variant="checkout"></div>
</main>

<?= snippet('about') ?>

<?php snippet('footer', slots: true) ?>
  <?php slot('page') ?>
  <?php endslot() ?>
<?php endsnippet() ?>

<?= snippet('foot') ?>