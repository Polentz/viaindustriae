<div class="item" data-category="<?= $page->category()->slug() ?>">
    <figure class="item-preview">
        <?php if ($cover = $page->cover()->toFile()) : ?>
            <img class="item-cover" src="<?= $cover->resize(1200, null)->url() ?>" alt="<?= $cover->alt() ?>" />
        <?php endif ?>
        <figcaption class="item-info">
            <?php if ($page->itemheader()->isNotEmpty()): ?>
                <p class="text"><?= $page->itemheader() ?></p>
            <?php endif ?>
            <p class="text-title"><?= $page->title() ?></p>
            <?php if ($page->iteminfo()->isNotEmpty()): ?>
                <p class="text"><?= $page->iteminfo() ?></p>
            <?php endif ?>
            <?php if ($slots->book()) : ?>
                <button class="item-button"><?= $buy ?></button>
            <?php endif ?>
        </figcaption>
    </figure>

    <div class="item-page">
        <div class="gallery">
            <?php foreach ($page->gallery()->toFiles() as $file) : ?>
                <div class="gallery-wrapper">
                    <img src="<?= $file->resize(1200, null)->url() ?>" alt="<?= $file->alt() ?>" />
                    <?php if ($file->caption()->isNotEmpty()) : ?>
                        <p class=""><?= $page->caption() ?></p>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
            <div class="pagination">
                1 2 3 4
            </div>
        </div>

        <div class="description">
            <div class="description-header">
                <div class="header-info">
                    <?php if ($page->itemheader()->isNotEmpty()): ?>
                        <p class=""><?= $page->itemheader() ?></p>
                    <?php endif ?>
                    <?php if ($page->itemtitle()->isNotEmpty()): ?>
                        <p class=""><?= $page->itemtitle() ?></p>
                    <?php endif ?>
                    <?php if ($page->itemcaption()->isNotEmpty()): ?>
                        <p class=""><?= $page->itemcaption() ?></p>
                    <?php endif ?>
                    <?php if ($page->iteminfo()->isNotEmpty()): ?>
                        <p class=""><?= $page->iteminfo() ?></p>
                    <?php endif ?>
                </div>
                <div class="header-ui">
                    <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_copy_clipboard2 -->
                    <div class="tooltip">
                        <button class="button" data-url="<?= $page->url() ?>">
                            <span class="tooltiptext">Copy to clipboard</span><p>Share</p>
                        </button>
                    </div>
                    <?php if ($slots->book()) : ?>
                        <button class="button"><p><?= $buy ?></p></button>
                    <?php endif ?>
                </div>
            </div>
            <div class="description-content">
                <?= $page->blocks()->toBlocks() ?>        
            </div>
        </div>
    </div>
</div>