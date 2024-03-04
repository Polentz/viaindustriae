<?php
/**
 * SECURITY ADVICE
 * This page contains (sensitive) user data, such as name, address, email, etc.
 * By default this page is only protected by its cryptic URL (e.g. /orders/e8vsmomjbb8vjtp5).
 * These URLs can’t be guessed but if an attacker knows the URL it has access to user data.
 * To prevent this, you might add an extra layer of security.
 * More information: https://merx.wagnerwagner.de/docs/security
 *
 * @var OrderPage $page
 * @var string $paymentMethod
 * @var string $sum
 */
?>
<?php snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('order') ?>
    <?php endslot() ?>
<?php endsnippet() ?> 

  <main class="main content order">
    <div class="order-recap">

      <div class="order-recap-wrapper">
        <h1 class="text-title">
          <?= $page->title() ?><br>          
          <?= $page->invoiceDate()->toIntlDate() ?>
        </h1>
      </div>

      <div class="order-recap-wrapper">
        <p class="text-subtitle">
          <?= $page->name() ?> <?= $page->surname() ?><br>
          <?php if ($page->organization()->isNotEmpty()): ?>
            <?= $page->organization() ?><br>
          <?php endif ?>
          <?= $page->streetAddress() ?><br>
          <?= $page->postalCode() ?> <?= $page->city() ?><br>
          <?= $page->country() ?><br>
        </p>
      </div>

      <div class="order-recap-wrapper order-recap-headline">
        <h2 class="text-title"><?= t('order.shipping-address') ?></h2>
      </div>

      <div class="order-recap-wrapper text-subtitle">
        <p class="text-subtitle">
          <?php if ($page->billingAddressIsShippingAddress()->toBool() === true): ?>
            <?= $page->name() ?> <?= $page->surname() ?><br>
            <?php if ($page->organization()->isNotEmpty()): ?>
              <?= $page->organization() ?><br>
            <?php endif; ?>
            <?= $page->streetAddress() ?><br>
            <?= $page->postalCode() ?> <?= $page->city() ?><br>
            <?= $page->country() ?>
          <?php else: ?>
            <?= $page->shippingName() ?><br>
            <?php if ($page->shippingOrganization()->isNotEmpty()): ?>
              <?= $page->shippingOrganization() ?><br>
            <?php endif; ?>
            <?= $page->shippingStreetAddress() ?><br>
            <?= $page->shippingPostalCode() ?> <?= $page->shippingCity() ?><br>
            <?= $page->shippingCountry() ?>
          <?php endif; ?>
        </p>
      </div>

      <div class="order-recap-wrapper order-recap-headline">
        <h2 class="text-title"><?= t('order.payment') ?></h2>
      </div>
      
      <div class="order-recap-wrapper text-subtitle">
        <p><?= tt('order.payment.text', compact('paymentMethod')) ?></p>
        <?php if ($page->paymentMethod()->toString() === 'prepayment'): ?>
          <?php if ($page->paymentComplete()->toBool() === true): ?>
            <p><?= tt('order.payment.text.paid.date', ['datetime' => $page->paidDate()->toIntlDate()]) ?></p>
          <?php else: ?>
            <p><?= t('order.payment.text.not-yet-paid') ?> <?= tt('order.payment.text.invoice', compact('sum')) ?></p>
            <table class="table text-title">
              <tr>
                <th><?= t('order.invoice.recipient') ?></th>
                <td><?= $site->recipient() ?></td>
              </tr>
              <tr>
                <th><?= t('order.invoice.iban') ?></th>
                <td><?= $site->iban() ?></td>
              </tr>
              <tr>
                <th><?= t('order.invoice.sum') ?></th>
                <td><?= $sum ?></td>
              </tr>
              <tr>
                <th><?= t('order.invoice.purpose') ?></th>
                <td><?= $page->title() ?></td>
              </tr>
            </table>
          <?php endif ?>
        <?php endif ?>
      </div>
    </div>

    <?php snippet('cart', ['cart' => $page->cart()]) ?>
  </main>

  <?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
  <?php endsnippet() ?>

<?php snippet('foot') ?>
