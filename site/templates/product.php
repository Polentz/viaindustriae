<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('subpage') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main content">
    <div class="item-page <?= $page->template() ?>" data-id="<?= $page->uuid() ?>" data-category="<?= $page->category()->slug() ?>">
        <div class="item-gallery">
            <?php foreach ($page->gallery()->toFiles() as $file) : ?>
                <figure class="item-gallery-wrapper">
                    <img src="<?= $file->resize(1200, null)->url() ?>" alt="<?= $file->alt() ?>" />
                    <figcaption class="item-gallery-caption text-caption">
                        <?php if ($file->caption()->isNotEmpty()) : ?>
                            <?= $file->caption() ?>
                        <?php endif ?>
                        <nav class="gallery-pagination">1 2 3 4</nav>
                    </figcaption>
                </figure>
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
                        <?php if ($kirby->language()->code() == 'it') : ?>
                            <p class="price text-subtitle"><?= $page->price() ?> €</p>
                        <?php elseif ($kirby->language()->code() == 'en') : ?>
                            <p class="price text-subtitle">€ <?= $page->price() ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="description-header-ui">
                    <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_copy_clipboard2 -->
                    <div class="tooltip">
                        <div class="button action-button tooltip-button" data-url="<?= $page->url() ?>"><?= t('share') ?></div>
                        <span class="tooltip-text text-caption"><?= t('tooltip') ?></span>
                    </div>
                    <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                </div>
            </div>
            <div class="description-text">
                <?= $page->description()->toBlocks() ?>        
            </div>
        </div>
        <!-- type="button" onclick="window.history.back()" -->
        <div class="close-ui item-close">
            <a href="<?= $page->parent()->url() ?>">
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M1 1L13 13"/>
                </svg>
            </a>
        </div>
    </div>
</main>

<?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('foot') ?>