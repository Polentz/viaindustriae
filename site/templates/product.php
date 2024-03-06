<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
    <?php slot('subpage') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main content">
    <div class="item-page <?= $page->template() ?>" data-id="<?= $page->uuid() ?>" data-category="<?= $page->category() ?>">
        <div class="item-gallery">
            <div class="carousel">
                <?php foreach ($page->gallery()->toFiles() as $file) : ?>
                    <?php if ($file->isNotEmpty()) : ?>
                        <figure class="item-gallery-wrapper">
                            <img src="<?= $file->crop(1200, 850, 72)->url() ?>" alt="<?= $file->alt() ?>" />
                            <figcaption>
                                <?php if ($file->caption()->isNotEmpty()) : ?>
                                    <?= $file->caption() ?>
                                <?php endif ?>
                            </figcaption>
                        </figure>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <div class="carousel-nav"></div>
        </div>

        <div class="item-description">
            <div class="description-header">
                <div class="description-header-text">
                    <p class="text-title"><?= $page->header() ?></p>
                    <p class="text"><?= $page->title() ?></p>
                    <p class="item-price text-title">€ <?= $page->price() ?></p>
                </div>
                <div class="description-header-ui">
                    <div class="tooltip">
                        <div class="button action-button tooltip-button" data-url="<?= $page->url() ?>"><?= t('share') ?></div>
                        <span class="tooltip-text text-caption"><?= t('tooltip') ?></span>
                    </div>
                    <?php if($page->stock() > '0') : ?>
                        <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                    <?php else : ?>
                        <div class="button static-button"><?= t('product.sold-out') ?></div>
                    <?php endif ?>
                </div>
            </div>
            
            <div class="description-text">
                <?php if ($page->itemInfo()->isNotEmpty()): ?>
                    <div class="description-text-info text-caption">
                        <?= $page->itemInfo() ?>
                    </div>
                <?php endif ?>
                <?php if ($page->category()->isNotEmpty()): ?>
                    <div class="description-text-info text-caption">
                        <p>Categoria: <span><?= $page->category() ?></span></p>
                    </div>
                <?php endif ?>
                <?php if ($page->description()->isNotEmpty()) : ?>
                    <div class="description-text-copy">
                        <?= $page->description() ?>    
                    </div>    
                <?php endif ?>
            </div>
        </div>

        <a class="close-ui item-close" href="<?= $page->parent()->url() ?>">
            <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M1 1L13 13"/>
            </svg>
        </a>
    </div>
</main>

<?= snippet('about') ?>

<?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('foot') ?>