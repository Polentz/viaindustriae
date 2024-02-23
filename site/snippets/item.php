<?php if ($slots->product()) : ?>
    <div class="item product" data-id="<?= $page->uuid() ?>" data-category="<?= $page->category() ?>">
        <figure class="item-preview">
            <?php if ($cover = $page->cover()->toFile()) : ?>
                <img class="item-cover" src="<?= $cover->resize(1200, null)->url() ?>" alt="<?= $cover->alt() ?>" />
            <?php endif ?>
            <figcaption class="item-info">
                <div class="item-info-wrapper">
                    <p class="text-title"><?= $page->author() ?></p>
                    <p class="item-title text"><?= $page->title() ?></p>
                </div>
                <div class="item-info-wrapper">
                    <?php if ($kirby->language()->code() == 'it') : ?>
                        <p class="item-price text-title"><?= $page->price() ?> €</p>
                    <?php elseif ($kirby->language()->code() == 'en') : ?>
                        <p class="item-price text-title">€ <?= $page->price() ?></p>
                    <?php endif ?>
                    <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                </div>
            </figcaption>
        </figure>

        <div class="item-page product" data-id="<?= $page->uuid() ?>" data-category="<?= $page->category() ?>" style="display: none;">
            <div class="item-gallery">
                <?php foreach ($page->gallery()->toFiles() as $file) : ?>
                    <div class="item-gallery-wrapper">
                        <img src="<?= $file->resize(1200, null)->url() ?>" alt="<?= $file->alt() ?>" />
                        <?php if ($file->caption()->isNotEmpty()) : ?>
                            <p class=""><?= $file->caption() ?></p>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>
                <div class="item-gallery-pagination text-caption">
                    1 2 3 4
                </div>
            </div>

            <div class="item-description">
                <div class="description-header">
                    <div class="description-header-info">
                        <div class="description-header-info-wrapper">
                            <p class="text-subtitle"><?= $page->author() ?></p>
                            <p class="text-title"><?= $page->title() ?></p>
                        </div>
                        <?php if ($page->info()->isNotEmpty()): ?>
                            <div class="description-header-info-wrapper text-caption"><?= $page->info() ?></div>
                        <?php endif ?>
                        <div class="description-header-info-wrapper">
                            <p class="price text-subtitle">€ <?= $page->price() ?></p>
                        </div>
                    </div>
                    <div class="description-header-ui">
                        <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_copy_clipboard2 -->
                        <div class="tooltip">
                            <div class="button action-button tooltip-button" data-url="<?= $page->url() ?>">Share</div>
                            <span class="tooltip-text text-caption">Copied to clipboard</span>
                        </div>
                        <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                    </div>
                </div>
                <div class="description-text">
                    <?= $page->description()->toBlocks() ?>        
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

<?php if ($slots->project()) : ?>
    <div class="item" data-category="<?= $page->category() ?>">
        <figure class="item-preview">
            <?php if ($cover = $page->cover()->toFile()) : ?>
                <a href="<?= $page->url() ?>"><img class="item-cover" src="<?= $cover->resize(1200, null)->url() ?>" alt="<?= $cover->alt() ?>" /></a>
            <?php endif ?>
            <figcaption class="item-info">
                <div class="item-info-wrapper">
                    <?php if ($page->itemheader()->isNotEmpty()): ?>
                        <p class="text-subtitle"><?= $page->itemheader() ?></p>
                    <?php endif ?>
                    <p class="item-title text"><a href="<?= $page->url() ?>"><?= $page->title() ?></a></p>
                </div>
                <div class="item-info-wrapper">
                    <?php if ($page->iteminfo()->isNotEmpty()): ?>
                        <p class="text-subtitle"><?= $page->iteminfo() ?></p>
                    <?php endif ?>
                </div>
            </figcaption>
        </figure>
    </div>
<?php endif ?>

<?php if ($slots->agenda()) : ?>
    <div class="item" data-category="<?= $page->category() ?>">
        <div class="item-preview">
            <?php if ($page->linkUrl()->isNotEmpty()) : ?>
                <div class="item-cover">
                    <a href="<?= $link->url() ?>"><p class="text-subtitle"><?= $page->linkText() ?></p></a>
                </div> 
            <?php else : ?>
                <div class="item-cover">
                    <p class="text-subtitle"><?= $page->linkText() ?></p>
                </div>
            <?php endif ?>
            <div class="item-info">
                <?php if ($page->itemheader()->isNotEmpty()): ?>
                    <p class="text-subtitle"><?= $page->itemheader() ?></p>
                <?php endif ?>
                <p class="text-title"><?= $page->title() ?></p>
                <?php if ($page->iteminfo()->isNotEmpty()): ?>
                    <p class="text-subtitle"><?= $page->iteminfo() ?></p>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php endif ?>
