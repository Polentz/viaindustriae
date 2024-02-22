    <footer class="footer">
        <?php if ($slots->home()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button static-button"><p>© <?= $site->title() ?> 2024</p></li>
                    </ul>
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button info-button"><p>Info</p></li>
                        <li class="button nav-button"><p>Agenda</p></li>
                        <li class="button nav-button lang-button"><a href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a></li>
                    </ul>
                </div>
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button"><a href="<?= $site->newsletter() ?>">Newletter</a></li>
                        <li class="button nav-button"><a href="<?= $site->facebook() ?>">FB</a></li>
                        <li class="button nav-button"><a href="<?= $site->instagram() ?>">IG</a></li>
                    </ul>
                </div>
            </menu>
        <?php endif ?>
        <?php if ($slots->page()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button"><p>© <?= $site->title() ?> 2024</p></li>
                    </ul>
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button"><p>Terms and Conditions</p></li>
                        <li class="button nav-button"><p>Colophon</p></li>
                    </ul>
                </div>
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button"><a href="<?= $site->newsletter() ?>">Newletter</a></li>
                        <li class="button nav-button"><a href="<?= $site->facebook() ?>">FB</a></li>
                        <li class="button nav-button"><a href="<?= $site->instagram() ?>">IG</a></li>
                    </ul>
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