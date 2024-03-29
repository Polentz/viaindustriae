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
                    <div class="description-header-text">
                        <p class="text-title"><?= $page->header() ?></p>
                        <p class="text"><?= $page->itemTitle() ?></p>
                    </div>
                    <div class="description-header-ui">
                        <div class="tooltip">
                            <button class="button action-button tooltip-button" data-url="<?= $page->url() ?>"><?= t('share') ?></button>
                            <span class="tooltip-text text-caption"><?= t('tooltip') ?></span>
                        </div>
                    </div>
                </div>
                <div class="description-text">
                    <?php if ($page->info()->isNotEmpty()): ?>
                        <div class="description-text-info text-caption">
                            <?= $page->info() ?>
                        </div>
                    <?php endif ?>
                    <?php if ($page->description()->isNotEmpty()) : ?>
                        <div class="description-text-copy">
                            <?= $page->description() ?>    
                        </div>    
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
            <div class="item-cover">
                <figure class="item-cover-wrapper">
                    <?php foreach ($page->gallery()->toFiles()->limit(2) as $preview) : ?>
                        <img src="<?= $preview->resize(1200, null)->url() ?>" alt="<?= $preview->alt() ?>" />
                    <?php endforeach ?>
                    <?php if ($slots->product()) : ?>
                        <?php if($page->stock() > '0') : ?>
                            <figcaption class="item-cover-caption">
                                <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                            </figcaption>
                        <?php else : ?>
                            <figcaption class="item-cover-caption">
                                <div class="button static-button"><?= t('product.sold-out') ?></div>
                            </figcaption>
                        <?php endif ?>
                    <?php endif ?>
                </figure>
            </div>
            <div class="item-info">
                <div class="item-info-wrapper">
                    <p class="text-title"><?= $page->header() ?></p>
                    <p class="text"><?= $page->title() ?></p>
                    <?php if ($slots->product()) : ?>
                        <?php if($page->stock() > '0') : ?>
                            <p class="item-price text-title">€ <?= $page->price() ?></p>
                        <?php else : ?>
                            <p class="item-stock text-title"><?= t('product.sold-out') ?></p>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

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
                        <p class="text"><?= $page->itemTitle() ?></p>
                        <?php if ($slots->product()) : ?>
                            <?php if($page->stock() > '0') : ?>
                                <p class="item-price text-title">€ <?= $page->price() ?></p>
                            <?php else : ?>
                                <p class="item-stock text-title"><?= t('product.sold-out') ?></p>
                            <?php endif ?>
                    <?php endif ?>
                    </div>
                    <div class="description-header-ui">
                        <div class="tooltip">
                            <div class="button action-button tooltip-button" data-url="<?= $page->url() ?>"><?= t('share') ?></div>
                            <span class="tooltip-text text-caption"><?= t('tooltip') ?></span>
                        </div>
                        <!-- <a class="button action-button" href="<?= $page->url() ?>" target="_blank" rel="noopener noreferrer">
                            <?= t('open') ?> 
                            <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 12.615L12.6616 0.960161M1.33836 0.61499H13V12.2698"/>
                            </svg>
                        </a> -->
                        <?php if ($slots->product()) : ?>
                            <?php if($page->stock() > '0') : ?>
                                <button class="button action-button" data-action="add-to-cart"><?= t('product.add-to-cart') ?></button>
                            <?php else : ?>
                                <div class="button static-button"><?= t('product.sold-out') ?></div>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
                
                <div class="description-text">
                    <?php if ($page->itemInfo()->isNotEmpty()): ?>
                        <div class="description-text-info text-caption">
                            <?= $page->itemInfo()->kt() ?>
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

            <div class="close-ui item-close">
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M1 1L13 13"/>
                </svg>
            </div>
        </div>
    </div>
<?php endif ?>
