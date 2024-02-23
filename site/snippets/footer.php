<?= snippet('about') ?>
    
<footer class="footer">
    <?php if ($slots->home()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <div class="button static-button">© <?= $site->title() ?> 2024</div>
                </div>
                <div class="main-nav-wrapper">
                    <a class="button nav-button info-button">Info</a>
                    <a class="button nav-button">Agenda</a>
                    <a class="button nav-button lang-button" href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a>
                </div>
            </div>
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <a class="button nav-button" href="<?= $site->newsletter() ?>" target="_blank" rel="noopener noreferrer">Newletter</a>
                    <a class="button nav-button" href="<?= $site->facebook() ?>" target="_blank" rel="noopener noreferrer">FB</a>
                    <a class="button nav-button" href="<?= $site->instagram() ?>" target="_blank" rel="noopener noreferrer">IG</a>
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
                    <a class="button nav-button">Terms and Conditions</a>
                    <a class="button nav-button">Colophon</a>
                </div>
            </div>
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <a class="button nav-button" href="<?= $site->newsletter() ?>" target="_blank" rel="noopener noreferrer">Newletter</a>
                    <a class="button nav-button" href="<?= $site->facebook() ?>" target="_blank" rel="noopener noreferrer">FB</a>
                    <a class="button nav-button" href="<?= $site->instagram() ?>" target="_blank" rel="noopener noreferrer">IG</a>
                </div>
            </div>
        </menu>
    <?php endif ?>
</footer>