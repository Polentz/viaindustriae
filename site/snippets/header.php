<?php 
    $query   = get('q');
    $filterBy = get('filter');

    $categories = $page
        ->children()
        ->listed()
        ->pluck('category', ',', true);

    $siblings = $page
        ->siblings()
        ->listed()
        ->pluck('category', ',', true);
?>

<header class="header">
    <nav class="nav">
        <?php if ($slots->home()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <?php foreach ($site->children()->listed()->filterby('template', 'shop') as $shop) : ?>
                            <a class="button nav-button" id="to-shop" href="<?= $shop->url() ?>"><?= $shop->title() ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="main-nav site-title">
                    <div class="main-nav-wrapper">
                        <h1 class="button static-button"><?= $site->title() ?></h1>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <?php foreach ($site->children()->listed()->filterby('template', 'projects') as $projects) : ?>
                            <a class="button nav-button" id="to-projects" href="<?= $projects->url() ?>"><?= $projects->title() ?></a>
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
                        <?php foreach ($site->children()->listed()->filterby('template', 'shop') as $shop) : ?>
                            <?php if ($shop->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $shop->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $shop->url() ?>"><?= $shop->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($site->children()->listed()->filterby('template', 'projects') as $projects) : ?>
                            <?php if ($projects->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $projects->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $projects->url() ?>"><?= $projects->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="main-nav-wrapper">
                        <a class="button nav-button info-button">Info</a>
                        <?php foreach ($site->children()->listed()->filterby('template', 'agenda') as $agenda) : ?>
                            <?php if ($agenda->isOpen()) : ?>
                                <p class="button nav-button --current"><?= $agenda->title() ?></p>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $agenda->url() ?>"><?= $agenda->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
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
            <menu class="inner-menu">
                <div class="inner-nav">
                    <div class="inner-nav-wrapper">
                        <?php if ($slots->subpage()) : ?>
                            <form class="search-wrapper" action="<?= $page->parent()->url() ?>" autocomplete="off">
                                <label for="search" class="button nav-button search-bar"><?= t('search') ?></label>
                                <input type="search" class="search-input" name="q" value="<?= $query ?>" placeholder="<?= t('search') ?>">
                                <a href="<?= $page->parent()->url() ?>" type="reset" class="search-reset close-ui">
                                    <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1L1 13M1 1L13 13"/>
                                    </svg>
                                </a>
                            </form>
                            <div class="button nav-button --current"><?= $page->title() ?></div>
                            <a href="<?= $page->parent()->url() ?>" class="button no-category-button"><?= t('all') ?></a>
                            <?php foreach ($siblings as $category) : ?>
                                <a class="button category-button" href="<?= $page->parent()->url() ?>?filter=<?= $category ?>"><?= $category ?></a>
                            <?php endforeach ?>
                        <?php else : ?>
                            <form class="search-wrapper" action="<?= $page->url() ?>" autocomplete="off">
                                <label for="search" class="button nav-button search-bar"><?= t('search') ?></label>
                                <input type="search" class="search-input" name="q" value="<?= $query ?>" placeholder="<?= t('search') ?>">
                                <a href="<?= $page->url() ?>" type="reset" class="search-reset close-ui">
                                    <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1L1 13M1 1L13 13"/>
                                    </svg>
                                </a>
                            </form>
                            <a href="<?= $page->url() ?>" class="button no-category-button --current"><?= t('all') ?></a>
                            <?php foreach ($categories as $category) : ?>
                                <a class="button category-button" href="<?= $page->url() ?>?filter=<?= $category ?>"><?= $category ?></a>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->agenda()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <a class="button nav-button" href="<?= page('home')->url() ?>"><?= $site->title() ?></a>
                        <?php foreach ($site->children()->filterby('template', 'shop') as $shop) : ?>
                            <?php if ($shop->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $shop->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $shop->url() ?>"><?= $shop->title() ?></a>
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
                        <?php foreach ($site->children()->filterby('template', 'agenda') as $agenda) : ?>
                            <?php if ($agenda->isOpen()) : ?>
                                <p class="button nav-button --current"><?= $agenda->title() ?></p>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $agenda->url() ?>"><?= $agenda->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
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
            <menu class="inner-menu">
                <div class="inner-nav">
                    <div class="inner-nav-wrapper">
                        <?php if ($slots->filtered()) : ?>
                            <form class="search-wrapper" action="<?= $page->parent()->url() ?>" autocomplete="off">
                                <label for="search" class="button nav-button search-bar"><?= t('search') ?></label>
                                <input type="search" class="search-input" name="q" value="<?= $query ?>" placeholder="<?= t('search') ?>">
                                <a href="<?= $page->parent()->url() ?>" type="reset" class="search-reset close-ui">
                                    <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1L1 13M1 1L13 13"/>
                                    </svg>
                                </a>
                            </form>
                            <a href="<?= $page->parent()->url() ?>" class="button no-category-button"><?= t('all') ?></a>
                        <?php else : ?>
                            <form class="search-wrapper" action="<?= $page->url() ?>" autocomplete="off">
                                <label for="search" class="button nav-button search-bar"><?= t('search') ?></label>
                                <input type="search" class="search-input" name="q" value="<?= $query ?>" placeholder="<?= t('search') ?>">
                                <a href="<?= $page->url() ?>" type="reset" class="search-reset close-ui">
                                    <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1L1 13M1 1L13 13"/>
                                    </svg>
                                </a>
                            </form>
                            <div class="button no-category-button --current"><?= t('all') ?></div>
                        <?php endif ?>
                        <?php foreach ($site->grandchildren()->unlisted()->filterby('template', 'in', ['past', 'upcoming']) as $events) : ?>
                            <?php if ($events->isOpen()) : ?>
                                <h1 class="button nav-button --current"><?= $events->title() ?></h1>
                            <?php else : ?>
                                <a class="button nav-button" href="<?= $events->url() ?>"><?= $events->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </menu>
        <?php endif ?>

        <?php if ($slots->order()) : ?>
            <menu class="main-menu">
                <div class="main-nav">
                    <div class="main-nav-wrapper">
                        <a class="button nav-button" href="<?= page('home')->url() ?>"><?= $site->title() ?></a>
                        <?php foreach ($site->children()->filterby('template', 'shop') as $shop) : ?>
                            <a class="button nav-button" href="<?= $shop->url() ?>"><?= $shop->title() ?></a>
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
                        <?php foreach ($site->children()->filterby('template', 'agenda') as $agenda) : ?>
                            <?php if ($agenda->isOpen()) : ?>
                                <p class="button nav-button --current"><?= $agenda->title() ?></p>
                            <?php else : ?>
                                <a class="button nav-button " href="<?= $agenda->url() ?>"><?= $agenda->title() ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
                
                <div class="main-nav">
                    <div class="main-nav-wrapper">                        
                        <details class="details-cart" open>
                            <summary class="button nav-button cart-button --current" data-action="toggle-cart">
                                <p><?= t('cart.to-checkout') ?></p>
                            </summary>
                        </details>
                        <?php if ($kirby->language()->code() == 'it') : ?>
                            <a class="button nav-button lang-button" href="<?= $page->url('en') ?>" hreflang="en">It</a>
                        <?php elseif ($kirby->language()->code() == 'en') : ?>
                            <a class="button nav-button lang-button" href="<?= $page->url('it') ?>" hreflang="it">En</a>
                        <?php endif ?>     
                    </div>
                </div>
            </menu>
        <?php endif ?>
    </nav>
</header>
