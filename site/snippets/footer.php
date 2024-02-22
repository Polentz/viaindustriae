    <footer class="footer">
        <?php if ($slots->home()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button static-button">© <?= $site->title() ?> 2024</button>
                    </div>
                    <div class="main-nav-wrapper">
                        <button class="button nav-button info-button">Info</button>
                        <button class="button nav-button">Agenda</button>
                        <button class="button nav-button lang-button"><a href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a></button>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button"><a href="<?= $site->newsletter() ?>">Newletter</a></button>
                        <button class="button nav-button"><a href="<?= $site->facebook() ?>">FB</a></button>
                        <button class="button nav-button"><a href="<?= $site->instagram() ?>">IG</a></button>
                    </div>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->page()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button">© <?= $site->title() ?> 2024</button>
                    </div>
                    <div class="main-nav-wrapper">
                        <button class="button nav-button">Terms and Conditions</button>
                        <button class="button nav-button">Colophon</button>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button"><a href="<?= $site->newsletter() ?>">Newletter</a></button>
                        <button class="button nav-button"><a href="<?= $site->facebook() ?>">FB</a></button>
                        <button class="button nav-button"><a href="<?= $site->instagram() ?>">IG</a></button>
                    </div>
                </div>
            </menu>
        <?php endif ?>
    </footer>

    <?= snippet('about') ?>

    <noscript>Please turn on JS to navigate this website</noscript>
    <?= js([
        'assets/js/script.js',
        '@auto',
    ]) ?>
</body>
</html>