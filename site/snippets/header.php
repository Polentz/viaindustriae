<header class="header">
    <nav class="nav">
        <?php if ($slots->home()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button static-button"><h1><?= $site->title() ?></h1></li>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <li class="button nav-button"><a href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button static-button"><h1><?= $site->title() ?></h1></li>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <li class="button nav-button"><a href="<?= $projects->url() ?>"><?= $projects->title() ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->page()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button"><h1><a href="<?= page('home')->url() ?>"><?= $site->title() ?></a></h1></li>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <?php if ($publishing->isOpen()) : ?>
                                <li class="button nav-button --current"><p><?= $publishing->title() ?></p></li>
                            <?php else : ?>
                                <li class="button nav-button"><a href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <?php if ($projects->isOpen()) : ?>
                                <li class="button nav-button --current"><p><?= $projects->title() ?></p></li>
                            <?php else : ?>
                                <li class="button nav-button"><a href="<?= $projects->url() ?>"><?= $projects->title() ?></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button info-button"><p>Info</p></li>
                        <li class="button nav-button"><p>Agenda</p></li>
                    </ul>
                </div>
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button cart-button"><p><?= $cart ?></p></li>
                        <li class="button nav-button lang-button --current"><a href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a></li>                    
                    </ul>
                </div>
            </menu>
            <menu class="hinner-menu">
                <div class="inner-nav">
                    <ul class="inner-nav-wrapper">
                        <!-- https://webdesign.tutsplus.com/how-to-build-a-search-bar-with-javascript--cms-107227t -->
                        <li class="button serach-bar"><p><?= $search ?></p></li>
                        <li class="button category-button --current"><p><?= $all ?></p></li>
                        <?php foreach ($page->children()->listed()->pluck('category', null, true) as $page) : ?>
                            <li class="button category-button"><p><?= $page->category() ?></p></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->subpage()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button"><h1><a href="<?= page('home')->url() ?>"><?= $site->title() ?></a></h1></li>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <?php if ($publishing->isOpen()) : ?>
                                <li class="button nav-button --current"><p><?= $publishing->title() ?></p></li>
                            <?php else : ?>
                                <li class="button nav-button"><a href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <?php if ($projects->isOpen()) : ?>
                                <li class="button nav-button --current"><p><?= $projects->title() ?></p></li>
                            <?php else : ?>
                                <li class="button nav-button"><a href="<?= $projects->url() ?>"><?= $projects->title() ?></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button info-button"><p>Info</p></li>
                        <li class="button nav-button"><p>Agenda</p></li>
                    </ul>
                </div>
                <div class="main-nav">
                    <ul class="main-nav-wrapper">
                        <li class="button nav-button cart-button"><p><?= $cart ?></p></li>
                        <li class="button nav-button lang-button --current"><a href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a></li>                    
                    </ul>
                </div>
            </menu>
            <menu class="hinner-menu">
                <div class="inner-nav">
                    <ul class="inner-nav-wrapper">
                        <!-- https://webdesign.tutsplus.com/how-to-build-a-search-bar-with-javascript--cms-107227t -->
                        <li class="button serach-bar"><p><?= $search ?></p></li>
                        <li class="button category-button"><a href="<?= $page->parent()->url() ?>"><?= $all ?></a></li>
                        <?php foreach ($page->siblings()->listed()->pluck('category', null, true) as $sibling) : ?>
                            <?php if ($sibling->category() == $page->category()) : ?>
                                <li class="button category-button --current"><p><?= $sibling->category() ?></p></li>
                            <?php else : ?>
                                <li class="button category-button"><p><?= $sibling->category() ?></p></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
            </menu>
        <?php endif ?>
    </nav>
</header>