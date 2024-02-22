<div class="contact-block">
    <?php if ($block->title()->isNotEmpty()) : ?>
        <div class="contact-block-title text-title">
            <?= $block->title()->kt() ?>
        </div>
    <?php endif ?>
    <?php if ($block->text()->isNotEmpty()) : ?>
        <div class="contact-block-text text-subtitle">
            <?= $block->text()->kt() ?>
        </div>
    <?php endif ?>
</div>