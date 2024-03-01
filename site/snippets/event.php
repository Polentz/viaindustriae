<div class="item <?= $page->template() ?>" data-id="<?= $page->uuid() ?>" data-category="<?= $page->category() ?>">
    <div class="item-preview">
        <div class="item-cover">
            <?= $page->quoteText() ?>
        </div>
        <div class="item-info">
            <div class="item-info-wrapper">
                <p class="text-title"><?= $page->header() ?></p>
                <p class="text"><?= $page->title() ?></p>
                <p class="text-title"><?= $page->eventDate() ?></p>
            </div>
        </div>
    </div>
</div>