<?php 
    $query   = get('q');
    $filterBy = get('filter');

    $results = $page
        ->children()
        ->listed()
        ->when($query, function($query) {
        return $this->search($query, 'header|title', ['words' => true ]);
        });
    
    $items = $page
        ->children()
        ->listed()
        ->when($filterBy, function($filterBy) {
            return $this->filterBy('category', $filterBy);
        })
        ->paginate(16);
    
    $pagination = $items->pagination();
    $totalPages = $pagination->pages();
    $range = $totalPages;
?>

<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>


<main class="main content">
    <?php if ($query) : ?>
        <?php if ($results->isNotEmpty()) : ?>
            <section class="items-grid">
                <?php foreach ($results as $result) : ?>
                    <?php snippet('item', ['page' => $result], slots: false) ?>
                    <?php endsnippet() ?>
                <?php endforeach ?>
            </section>
        <?php elseif ($results->isEmpty()) : ?>
            NO RESULTS!
        <?php endif ?>
    <?php else : ?>
        <section class="items-grid">
            <?php foreach ($items as $item) : ?>
                <?php snippet('item', ['page' => $item], slots: false) ?>
                <?php endsnippet() ?>
            <?php endforeach ?>
        </section>
        <?php if ($pagination->hasPages()) : ?>
            <section class="pagination">
                <nav class="pagination-nav">
                    <?php foreach ($pagination->range($range) as $r) : ?>
                        <a class="text-caption<?= $pagination->page() === $r ? ' --current' : '' ?>" href="<?= $pagination->pageURL($r) ?>"><?= $r ?></a>
                    <?php endforeach ?>
                </nav>
            </section>
        <?php endif ?>
    <?php endif ?>
</main>

<?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('foot') ?>