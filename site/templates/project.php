<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('subpage') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main content">
    <div class="item-page" data-category="<?= $page->category()->slug() ?>">
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
                </div>
                <div class="description-header-ui">
                    <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_copy_clipboard2 -->
                    <div class="tooltip">
                        <div class="button action-button tooltip-button" data-url="<?= $page->url() ?>"><?= t('share') ?></div>
                        <span class="tooltip-text text-subtitle"><?= t('tooltip') ?></span>
                    </div>
                </div>
            </div>
            <div class="description-text-subtitle">
                <?= $page->blocks()->toBlocks() ?>        
            </div>
        </div>
        <div class="item-close" type="button" onclick="window.history.back()">
            <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M1 1L13 13"/>
            </svg>
        </div>
    </div>
</main>

<?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('foot') ?>