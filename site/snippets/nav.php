<nav class="nav">
    <?php if ($slots->home()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <ul class="main-nav-wrapper">
                    <li class="button nav-button static-button"><h1><?= $site->title() ?></h1></li>
                    <?php foreach ($pages->template('publishing') as $page) : ?>
                        <li class="button nav-button"><a href="<?= $page->url() ?>"><?= $page->title() ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="main-nav">
                <ul class="main-nav-wrapper">
                    <li class="button nav-button static-button"><h1><?= $site->title() ?></h1></li>
                    <li class="button nav-button"><a href="">Projects</a></li>
                </ul>
            </div>
        </menu>
    <?php endif ?>
    <?php if ($slots->page()) : ?>
        <menu class="main-menu">
            <div class="main-nav">
                <ul class="main-nav-wrapper">
                    <li class="button nav-button"><h1><a href="<?= page('home')->url() ?>"><?= $site->title() ?></a></h1></li>
                    <!-- add listed when I am ready -->
                    <?php foreach($pages->template(['publishing', 'projects']) as $page) : ?>
                        <li class="button nav-button <?= e($page->isOpen(), '--current') ?>"><p><?= $page->title() ?></p></li>
                    <?php endforeach ?> 
                    <!-- elimnare questo -->
                    <li class="button nav-button"><a href="">Projects</a></li>
                </ul>
                <ul class="main-nav-wrapper">
                    <li class="button nav-button info-button"><p>Info</p></li>
                    <li class="button nav-button"><p>Agenda</p></li>
                </ul>
            </div>
            <div class="main-nav">
                <ul class="main-nav-wrapper">
                    <li class="button nav-button cart-button"><p href=""><?= $cart ?></p></li>
                    <li class="button nav-button lang-button"><a href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a></li>                    
                </ul>
            </div>
        </menu>
        <menu class="hinner-menu">
            <div class="inner-nav">
                <ul class="inner-nav-wrapper">
                    <!-- https://webdesign.tutsplus.com/how-to-build-a-search-bar-with-javascript--cms-107227t -->
                    <li class="button serach-bar"><?= $search ?></li>
                    <?php foreach ($page->children()->listed() as $item) : ?>
                        <li class="button"><p><?= $item->category() ?></p></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </menu>
    <?php endif ?>
</nav>