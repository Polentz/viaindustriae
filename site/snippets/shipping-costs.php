<?php 
$items = $site->find('shipping')->shippingSettings()->toStructure()
?>

<form method="" class="shipping-form" id="shipping-form" action="">
  <h2 class="field text-title">Calcola le spese di spedizione</h2>
    <div class="field" data-name="zone" data-type="select">
      <label for="zone" class="text-title">Scegli la destinazione <abbr title="<?= I18n::translate('field.required') ?>">*</abbr>
      </label>
      <select class="select start" data-action="zone" id="zone" name="zone" required="true">
        <option value="" selected disabled hidden>Scegli...</option>
        <?php foreach ($kirby->option('zone') as $value) : ?>
          <option value="<?= $value ?>"><?= $value ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="field conditional radio-wrapper" data-name="shippingOptions" data-type="select" data-condition="Italy">
      <label for="shippingOptions" class="text-title">Scegli un'opzione <abbr title="<?= I18n::translate('field.required') ?>">*</abbr>
      </label>
      <!-- <select class="select" data-action="shippingOptions" id="shippingOptions" name="shippingOptions" required="true">
          <option value="" selected disabled hidden>Scegli...</option>
          <?php foreach ($kirby->option('shippingOptions') as $value) : ?>
            <option value="<?= $value ?>"><?= $value ?></option>
          <?php endforeach ?>
      </select> -->
      
        <?php foreach ($kirby->option('shippingOptions') as $value) : ?>
          <div class="field text-subtitle" data-type="radio" data-action="shippingOptions">
            <input
              <?= Html::attr([
                'type' => 'radio',
                'name' => 'shippingOptions',
                'id' => $value,
                'value' => $value,
                'disabled' => false,
                'required' => true,
              ]) ?>
            >
            <label for="shippingOptions">
              <?= $value ?>
            </label>
          </div>
        <?php endforeach ?>
    </div>


          <!-- <select class="select" data-action="shippingOptions" id="shippingOptions" name="shippingOptions" required="true">
        <option value="" selected disabled hidden>Scegli...</option>
        <?php foreach ($items as $item) : ?>
          <option value="<?= $item->shippingOptions() ?>"><?= $item->shippingOptions() ?></option>
        <?php endforeach ?>
      </select> -->

    <div class="field conditional" data-name="country" data-type="select" data-condition="Europe">
      <label for="country" class="text-title">Scegli un Paese <abbr title="<?= I18n::translate('field.required') ?>">*</abbr>
      </label>
      <select class="select" data-action="country" id="country" name="country" required="true" required="true">
        <option value="" selected disabled hidden>Scegli...</option>
        <?php foreach ($kirby->option('country') as $value) : ?>
          <option value="<?= $value ?>"><?= $value ?></option>
        <?php endforeach ?>
      </select>
    </div>
</form>

