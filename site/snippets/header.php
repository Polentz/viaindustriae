<header class="header">
    <nav class="nav">
        <?php if ($slots->home()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <h1 class="button static-button"><?= $site->title() ?></h1>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <a class="button nav-button" href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <h1 class="button static-button"><?= $site->title() ?></h1>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <a class="button nav-button" href="<?= $projects->url() ?>"><?= $projects->title() ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->page()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <a class="button nav-button" href="<?= page('home')->url() ?>"><?= $site->title() ?></a>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <?php if ($publishing->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $publishing->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <?php if ($projects->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $projects->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $projects->url() ?>"><?= $projects->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="main-nav-wrapper">
                        <a class="button nav-button info-button">Info</a>
                        <a class="button nav-button">Agenda</a>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">                        
                        <details class="details-cart">
                            <summary class="button nav-button cart-button" data-action="toggle-cart">
                                <p><?= $cart ?> <span class="cart-count"></span></p>
                            </summary>
                            <div class="cart" id="cart"></div>
                        </details>
                        <a class="button nav-button lang-button" href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a>                    
                    </div>
                </div>
            </menu>
            <menu class="hinner-menu">
                <div class="inner-nav">
                    <div class="inner-nav-wrapper">
                        <!-- https://webdesign.tutsplus.com/how-to-build-a-search-bar-with-javascript--cms-107227t -->
                        <div class="button serach-bar"><?= $search ?></div>
                        <div class="button no-category-button --current"><?= $all ?></div>
                        <?php foreach ($page->children()->listed()->pluck('category', null, true) as $page) : ?>
                            <div class="button category-button" data-category="<?= $page->category() ?>"><?= $page->category() ?></div>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->subpage()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <a class="button nav-button" href="<?= page('home')->url() ?>"><?= $site->title() ?></a>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <?php if ($publishing->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $publishing->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <?php if ($projects->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $projects->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $projects->url() ?>"><?= $projects->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="main-nav-wrapper">
                        <a class="button nav-button info-button">Info</a>
                        <a class="button nav-button">Agenda</a>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">                        
                        <details class="details-cart">
                            <summary class="button nav-button cart-button" data-action="toggle-cart">
                                <p><?= $cart ?> <span class="cart-count"></span></p>
                            </summary>
                            <div class="cart" id="cart"></div>
                        </details>
                        <a class="button nav-button lang-button" href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a>                    
                    </div>
                </div>
            </menu>
            <menu class="hinner-menu">
                <div class="inner-nav">
                    <div class="inner-nav-wrapper">
                        <div class="button no-category-button"><a href="<?= $page->parent()->url() ?>"><?= $all ?></a></div>
                        <?php foreach ($page->siblings()->listed()->pluck('category', null, true) as $sibling) : ?>
                            <?php if ($sibling->category() == $page->category()) : ?>
                                <div class="button category-button --current"><?= $sibling->category() ?></div>
                            <?php else : ?>
                                <div class="button category-button"><?= $sibling->category() ?></div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>
    </nav>
</header>