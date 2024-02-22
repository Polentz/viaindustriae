<header class="header">
    <nav class="nav">
        <?php if ($slots->home()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button static-button"><h1><?= $site->title() ?></h1></button>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <button class="button nav-button"><a href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a></button>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button static-button"><h1><?= $site->title() ?></h1></button>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <button class="button nav-button"><a href="<?= $projects->url() ?>"><?= $projects->title() ?></a></button>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->page()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button"><h1><a href="<?= page('home')->url() ?>"><?= $site->title() ?></a></h1></button>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <?php if ($publishing->isOpen()) : ?>
                                <button class="button nav-button --current"><p><?= $publishing->title() ?></p></button>
                            <?php else : ?>
                                <button class="button nav-button"><a href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a></button>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <?php if ($projects->isOpen()) : ?>
                                <button class="button nav-button --current"><p><?= $projects->title() ?></p></button>
                            <?php else : ?>
                                <button class="button nav-button"><a href="<?= $projects->url() ?>"><?= $projects->title() ?></a></button>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="main-nav-wrapper">
                        <button class="button nav-button info-button">Info</button>
                        <button class="button nav-button">Agenda</button>
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
                        <!-- <button class="button nav-button cart-button" id="cart"><p><?= $cart ?></p></button> -->
                        <div class="button nav-button lang-button --current"><a href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a></div>                    
                    </div>
                </div>
            </menu>
            <menu class="hinner-menu">
                <div class="inner-nav">
                    <div class="inner-nav-wrapper">
                        <!-- https://webdesign.tutsplus.com/how-to-build-a-search-bar-with-javascript--cms-107227t -->
                        <button class="button serach-bar"><?= $search ?></button>
                        <button class="button category-button --current"><?= $all ?></button>
                        <?php foreach ($page->children()->listed()->pluck('category', null, true) as $page) : ?>
                            <button class="button category-button"><?= $page->category() ?></button>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->subpage()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <button class="button nav-button"><h1><a href="<?= page('home')->url() ?>"><?= $site->title() ?></a></h1></button>
                        <?php foreach ($site->children()->filterby('template', 'publishing') as $publishing) : ?>
                            <?php if ($publishing->isOpen()) : ?>
                                <button class="button nav-button --current"><p><?= $publishing->title() ?></p></button>
                            <?php else : ?>
                                <button class="button nav-button"><a href="<?= $publishing->url() ?>"><?= $publishing->title() ?></a></button>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($site->children()->filterby('template', 'projects') as $projects) : ?>
                            <?php if ($projects->isOpen()) : ?>
                                <button class="button nav-button --current"><p><?= $projects->title() ?></p></button>
                            <?php else : ?>
                                <button class="button nav-button"><a href="<?= $projects->url() ?>"><?= $projects->title() ?></a></button>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="main-nav-wrapper">
                        <button class="button nav-button info-button"><p>Info</p></button>
                        <button class="button nav-button"><p>Agenda</p></button>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">                        
                        <details class="details-cart">
                            <summary class="button nav-button cart-button" data-action="toggle-cart">
                                <p><?= $cart ?> <span class="cart-count"></span></p>
                            </summary>
                            <div class="cart" id="cart" data-theme="dark">
                                <?php
                                ?>
                            </div>
                        </details>
                        <!-- <button class="button nav-button cart-button" id="cart"><p><?= $cart ?></p></button> -->
                        <div class="button nav-button lang-button --current"><a href="<?= $page->url($href) ?>" hreflang="<?= $href ?>"><?= $languageString ?></a></div>                    
                    </div>
                </div>
            </menu>
            <menu class="hinner-menu">
                <div class="inner-nav">
                    <div class="inner-nav-wrapper">
                        <!-- https://webdesign.tutsplus.com/how-to-build-a-search-bar-with-javascript--cms-107227t -->
                        <button class="button serach-bar"><p><?= $search ?></p></button>
                        <button class="button category-button"><a href="<?= $page->parent()->url() ?>"><?= $all ?></a></button>
                        <?php foreach ($page->siblings()->listed()->pluck('category', null, true) as $sibling) : ?>
                            <?php if ($sibling->category() == $page->category()) : ?>
                                <button class="button category-button --current"><p><?= $sibling->category() ?></p></button>
                            <?php else : ?>
                                <button class="button category-button"><p><?= $sibling->category() ?></p></button>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>
    </nav>
</header>