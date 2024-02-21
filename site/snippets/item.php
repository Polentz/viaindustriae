<div class="item" data-category="<?= $page->category()->slug() ?>">

    <?php if ($slots->product()) : ?>
        <figure class="item-preview">
            <?php if ($cover = $page->cover()->toFile()) : ?>
                <a href="<?= $page->url() ?>"><img class="item-cover" src="<?= $cover->resize(1200, null)->url() ?>" alt="<?= $cover->alt() ?>" /></a>
            <?php endif ?>
            <figcaption class="item-info">
                <div class="item-info-wrapper">
                    <p class="text-subtitle"><?= $page->author() ?></p>
                    <p class="text-title"><?= $page->title() ?></p>
                </div>
                <div class="item-info-wrapper">
                    <?php if ($kirby->language()->code() == 'it') : ?>
                        <p class="text-subtitle"><?= $page->price() ?> €</p>
                    <?php elseif ($kirby->language()->code() == 'en') : ?>
                        <p class="text-subtitle">€ <?= $page->price() ?></p>
                    <?php endif ?>
                </div>
            </figcaption>
        </figure>
    <?php endif ?>

    <?php if ($slots->project()) : ?>
        <figure class="item-preview">
            <?php if ($cover = $page->cover()->toFile()) : ?>
                <a href="<?= $page->url() ?>"><img class="item-cover" src="<?= $cover->resize(1200, null)->url() ?>" alt="<?= $cover->alt() ?>" /></a>
            <?php endif ?>
            <figcaption class="item-info">
                <div class="item-info-wrapper">
                    <?php if ($page->itemheader()->isNotEmpty()): ?>
                        <p class="text-subtitle"><?= $page->itemheader() ?></p>
                    <?php endif ?>
                    <p class="text-title"><a href="<?= $page->url() ?>"><?= $page->title() ?></a></p>
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
    <?php endif ?>
</div>