<div
  class="field"
    data-name="<?= $field['name'] ?>"
    <?php if (array_key_exists('when', $field)) : ?>
      data-when='<?= json_encode($field['when']) ?>'
    <?php endif ?>
    data-type="<?= $field['type'] ?>"
  >

  <label for="<?= $field['name'] ?>" class="text-title">
    <?= $field['label'] ?>
    <?php if ($field['required']): ?>
      <abbr title="<?= I18n::translate('field.required') ?>">*</abbr>
    <?php endif ?>
  </label>

  <select id="<?= $field['name'] ?>" name="<?= $field['name'] ?>" data-action="<?= $field['name'] ?>"
    <?= Html::attr([
      'type' => $field['type'],
      'name' => $field['name'],
      'id' => $field['name'],
      'required' => $field['required'] ?? null,
      'value' => isset($field['default']) ? $field['default'] : null,
      'autocomplete' => isset($field['autocomplete']) ? $field['autocomplete'] : null,
      'data-action'  => $field['name'],
    ]) ?>
    >
    <option value="" selected disabled hidden>Scegli...</option>
    <?php foreach ($field['options'] as $value) : ?>
      <option value="<?= $value['value'] ?>"><?= $value['value'] ?></option>
    <?php endforeach ?>
  </select>

  <?php if (isset($field['help'])): ?>
    <div class="text-caption">
      <?= $field['help'] ?>
    </div>
  <?php endif ?>
</div>