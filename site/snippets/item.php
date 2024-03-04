<?php if ($slots->agenda()) : ?>

<div class="item" data-category="<?= $page->category() ?>">
    <div class="item-preview">
        <div class="item-cover">
            <div class="item-cover-headline">
                <h2><?= $page->quoteText() ?></h2>
            </div>
        </div>
        <div class="item-info">
            <div class="item-info-wrapper">
                <p class="text-title"><?= $page->header() ?></p>
                <p class="text"><?= $page->title() ?></p>
                <p class="text-title"><?= $page->eventDate() ?></p>
            </div>
        </div>
    </div>
    <div class="item-page" data-category="<?= $page->category() ?>">
        <div class="item-gallery">
            <?php foreach ($page->gallery()->toFiles() as $file) : ?>
                <figure class="item-gallery-wrapper">
                    <img src="<?= $file->resize(1200, null)->url() ?>" alt="<?= $file->alt() ?>" />
                    <figcaption class="item-gallery-caption text-caption">
                        <?php if ($file->caption()->isNotEmpty()) : ?>
                            <?= $file->caption() ?>
                        <?php endif ?>
                    </figcaption>
                </figure>
            <?php endforeach ?>
        </div>
        <div class="item-description">
            <div class="description-header">
                <div class="description-header-info">
                    <div class="description-header-info-wrapper">
                        <p class="text-title"><?= $page->header() ?></p>
                        <p class="text"><?= $page->title() ?></p>
                    </div>
                    <?php if ($page->info()->isNotEmpty()): ?>
                        <div class="description-header-info-wrapper text-caption">
                            <?= $page->info() ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="description-header-ui">
                    <div class="tooltip">
                        <div class="button action-button tooltip-button" data-url="<?= $page->url() ?>"><?= t('share') ?></div>
                        <span class="tooltip-text text-caption"><?= t('tooltip') ?></span>
                    </div>
                </div>
            </div>
            <div class="description-text">
                <?php if ($page->description()->isNotEmpty()) : ?>
                    <?= $page->description() ?>        
                <?php endif ?>
            </div>
        </div>
        <div class="close-ui item-close">
            <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M1 1L13 13"/>
            </svg>
        </div>
    </div>
</div>

<?php else : ?>

<div class="item <?= $page->template() ?>" data-id="<?= $page->uuid() ?>" data-category="<?= $page->category() ?>">
    <div class="item-preview">
        <figure class="item-cover">
            <?php $cover = $page->cover()->toFile() ?>
            <img src="<?= $cover->resize(1200, null)->url() ?>" alt="<?= $cover->alt() ?>" />
            <?php if ($slots->product()) : ?>
                <figcaption class="item-cover-caption">
                    <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                </figcaption>
            <?php endif ?>
        </figure>
        <div class="item-info">
            <div class="item-info-wrapper">
                <p class="text-title"><?= $page->header() ?></p>
                <p class="text"><?= $page->title() ?></p>
                <?php if ($slots->product()) : ?>
                    <?php if ($kirby->language()->code() == 'it') : ?>
                        <p class="item-price text-title"><?= $page->price() ?> Euro</p>
                    <?php elseif ($kirby->language()->code() == 'en') : ?>
                        <p class="item-price text-title">Euro <?= $page->price() ?></p>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="item-page <?= $page->template() ?>" data-id="<?= $page->uuid() ?>" data-category="<?= $page->category() ?>">
        <div class="item-gallery">
            <?php foreach ($page->gallery()->toFiles() as $file) : ?>
                <figure class="item-gallery-wrapper">
                    <img src="<?= $file->resize(1200, null)->url() ?>" alt="<?= $file->alt() ?>" />
                    <figcaption class="item-gallery-caption text-caption">
                        <?php if ($file->caption()->isNotEmpty()) : ?>
                            <?= $file->caption() ?>
                        <?php endif ?>
                    </figcaption>
                </figure>
            <?php endforeach ?>
        </div>
        <div class="item-description">
            <div class="description-header">
                <div class="description-header-info">
                    <div class="description-header-info-wrapper">
                        <p class="text-title"><?= $page->header() ?></p>
                        <p class="text"><?= $page->title() ?></p>
                    </div>
                    <?php if ($page->info()->isNotEmpty()): ?>
                        <div class="description-header-info-wrapper text-caption">
                            <?= $page->info() ?>
                        </div>
                    <?php endif ?>
                    <?php if ($slots->product()) : ?>
                        <div class="description-header-info-wrapper">
                            <?php if ($kirby->language()->code() == 'it') : ?>
                            <p class="price text"><?= $page->price() ?> Euro</p>
                            <?php elseif ($kirby->language()->code() == 'en') : ?>
                                <p class="price text">Euro <?= $page->price() ?></p>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="description-header-ui">
                    <div class="tooltip">
                        <div class="button action-button tooltip-button" data-url="<?= $page->url() ?>"><?= t('share') ?></div>
                        <span class="tooltip-text text-caption"><?= t('tooltip') ?></span>
                    </div>
                    <?php if ($slots->product()) : ?>
                        <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                    <?php endif ?>

                </div>
            </div>
            <div class="description-text">
                <?php if ($page->description()->isNotEmpty()) : ?>
                    <?= $page->description() ?>        
                <?php endif ?>
            </div>
        </div>
        <div class="close-ui item-close">
            <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M1 1L13 13"/>
            </svg>
        </div>
    </div>
</div>

<?php endif ?>
