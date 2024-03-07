<footer class="footer">
    <?php if ($slots->home()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <div class="button static-button">© <?= $site->title() ?> 2024</div>
                </div>
                <div class="main-nav-wrapper">
                    <button class="button nav-button info-button">Info</button>
                    <?php foreach ($site->children()->filterby('template', 'agenda') as $agenda) : ?>
                        <?php if ($agenda->isOpen()) : ?>
                            <p class="button nav-button --current"><?= $agenda->title() ?></p>
                        <?php else : ?>
                            <a class="button nav-button " href="<?= $agenda->url() ?>"><?= $agenda->title() ?></a>
                        <?php endif ?>
                    <?php endforeach ?>
                    <a class="button nav-button lang-button" href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a>
                </div>
            </div>
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <?php if ($site->newsletter()->isNotEmpty()) : ?>
                        <a class="button nav-button" href="<?= $site->newsletter() ?>" target="_blank" rel="noopener noreferrer">Newletter</a>
                    <?php endif ?>
                    <?php if ($site->facebook()->isNotEmpty()) : ?>
                        <a class="button nav-button" href="<?= $site->facebook() ?>" target="_blank" rel="noopener noreferrer">FB</a>
                    <?php endif ?>
                    <?php if ($site->instagram()->isNotEmpty()) : ?>
                        <a class="button nav-button" href="<?= $site->instagram() ?>" target="_blank" rel="noopener noreferrer">IG</a>
                    <?php endif ?>
                </div>
            </div>
        </menu>
    <?php endif ?>

    <?php if ($slots->page()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <div class="button static-button">© <?= $site->title() ?> 2024</div>
                </div>
                <div class="main-nav-wrapper">
                    <a class="button nav-button"><?= t('footer.tac') ?></a>
                    <a class="button nav-button"><?= t('footer.colophon') ?></a>
                </div>
            </div>
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <?php if ($site->newsletter()->isNotEmpty()) : ?>
                        <a class="button nav-button" href="<?= $site->newsletter() ?>" target="_blank" rel="noopener noreferrer">Newletter</a>
                    <?php endif ?>
                    <?php if ($site->facebook()->isNotEmpty()) : ?>
                        <a class="button nav-button" href="<?= $site->facebook() ?>" target="_blank" rel="noopener noreferrer">FB</a>
                    <?php endif ?>
                    <?php if ($site->instagram()->isNotEmpty()) : ?>
                        <a class="button nav-button" href="<?= $site->instagram() ?>" target="_blank" rel="noopener noreferrer">IG</a>
                    <?php endif ?>
                </div>
            </div>
        </menu>
    <?php endif ?>
</footer>