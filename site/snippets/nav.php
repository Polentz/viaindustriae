<nav class="nav">
    <?php if ($slots->homeNav()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <button class="nav-button"><a href=""><?= $site->title() ?></a></button>
                    <button class="nav-button"><a href="">Publishing</a></button>
                </div>
            </div>
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <button class="nav-button"><a href=""><?= $site->title() ?></a></button>
                    <button class="nav-button"><a href="">Projects</a></button>
                </div>
            </div>
        </menu>
    <?php endif ?>
    <?php if ($slots->pageNav()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <button class="nav-button"><a href=""><?= $site->title() ?></a></button>
                <button class="nav-button"><a href="">Publishing</a></button>
            </div>
            <div class="main-nav">
                <button class="nav-button"><a href=""><?= $site->title() ?></a></button>
                <button class="nav-button"><a href="">Projects</a></button>
            </div>
        </menu>
        <menu class="hinner-menu">
            <ul class="inner-nav">
                <li class=""></li>
            </ul>
        </menu>
    <?php endif ?>
    <?php if ($slots->footerNav()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <div class="main-nav-wrapper">
                    <button class="nav-button">© <?= $site->title() ?> 2024</button>
                </div>
                <div class="main-nav-wrapper">
                    <button class="nav-button">Info</button>
                    <button class="nav-button">Agenda</button>
                    <button class="nav-button"><?= $languageString ?></button>
                </div>
            </div>
            <div class="main-nav">
                <button class="nav-button"><a href="">Newletter</a></button>
                <button class="nav-button"><a href="">FB</a></button>
                <button class="nav-button"><a href="">IG</a></button>
            </div>
        </menu>
    <?php endif ?>
</nav>