<?php 
    $categories = $page->children()->listed()->pluck('category', null, true);
    $query   = get('q');
    $results = $page
        ->children()
        ->listed()
        ->search( $query, 'author|title', ['words' => true ])
        ->paginate(16);
?>

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
                                <p><?= t('cart') ?> <span class="cart-count"></span></p>
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
                        <form class="search-wrapper" action="<?= $page->url() ?>" autocomplete="off">
                            <label for="search" class="button nav-button search-bar"><?= t('search') ?></label>
                            <input type="search" id="myInput" class="search-input" name="q" value="<?= $query ?>" placeholder="<?= t('search') ?>">
                            <a href="<?= $page->url() ?>" class="search-reset close-ui">
                                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 1L1 13M1 1L13 13"/>
                                </svg>
                            </a>
                        </form>
                        <a href="<?= $page->url() ?>" class="button no-category-button"><?= t('all') ?></a>
                        <?php foreach ($categories as $category) : ?>
                            <a class="button category-button" href="<?= $page->url() ?>?filter=<?= $category ?>"><?= $category ?></a>
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
                                <p><?= t('cart') ?> <span class="cart-count"></span></p>
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
                        <a href="<?= $page->parent()->url() ?>" class="button no-category-button --current"><?= t('all') ?></a>
                        <?php foreach ($categories as $category) : ?>
                            <a class="button category-button" href="<?= $page->parent()->url() ?>?filter=<?= $category ?>"><?= $category ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>
    </nav>
</header>
