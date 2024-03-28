<?php
/**
 * Snippet for standard, single-line input field.
 * Fallback for fields with no own snippet.
 *
 * @author Tobias Wolf
 * @see https://getkirby.com/docs/reference/panel/fields/text
 * @see https://github.com/getkirby/kirby/blob/main/panel/src/components/Forms/Field/TextField.vue
 * @var array $field
 *  Example:
 *  array(15) {
 *    ["autofocus"]  => bool(false)
 *    ["counter"] => bool(true)
 *    ["default"]=> string(16) "mail@example.com"
 *    ["disabled"] => bool(false)
 *    ["label"] => string(4) "Name"
 *    ["name"] => string(12) "shippingname"
 *    ["required"] => bool(true)
 *    ["saveable"] => bool(true)
 *    ["signature"]  => string(32) "267fa7b7de75f1834bd505210dfb5227"
 *    ["spellcheck"] => bool(false)
 *    ["strict"] => bool(true)
 *    ["translate"] => bool(false)
 *    ["type"] => string(4) "text"
 *    ["validate"] => array(1) {
 *      ["minLength"] => int(3)
 *      ["maxLength"] => int(160)
 *    }
 *    ["when"] => array(1) {
 *      ["billingAddressIsShippingAddress"] => bool(false)
 *    }
 *    ["width"]      => string(3) "1/1"
 *  }
 */
?>
<div class="field radio-wrapper" data-name="<?= $field['name'] ?>" data-action="update-shipping" data-type="<?= $field['type'] ?>"
  <?php if (array_key_exists('when', $field)) : ?>
    data-when='<?= json_encode($field['when']) ?>'
  <?php endif ?>
>

  <h2 class="radio-title text-title">
    <?= $field['label'] ?>
    <?php if ($field['required']): ?>
      <abbr title="<?= I18n::translate('field.required') ?>">*</abbr>
    <?php endif ?>
  </h2>

  <?php foreach ($field['options'] as $option) : ?>
    <div class="field text-subtitle shipping">
    <input data-price="<?= $option['value'] ?>"
      <?= Html::attr([
        'type' => $field['type'],
        'name' => $field['name'],
        'id' => $option['value'],
        'value' => $option['value'],
      ]) ?>
    >

    <label for="<?= $option['value'] ?>">
      <?= $option['value'] ?> € <span><?= $option['text'] ?></span>
    </label>

    <?php if (isset($option['help'])): ?>
      <div class="text-caption">
        <?= $field['help'] ?>
      </div>
    <?php endif ?>
  </div>
  <?php endforeach ?>
</div>
