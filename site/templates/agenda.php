<?php 
    $query = get('q');

    $results = $page
        ->children()
        ->listed()
        ->when($query, function($query) {
            return $this->search($query, 'header|title|category', ['words' => true ]);
        });

    $items = $page
        ->children()
        ->listed()
        ->paginate(16);

    $pagination = $items->pagination();
    $totalPages = $pagination->pages();
    $range = $totalPages;
?>

<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('agenda') ?>
    <?php endslot() ?>
<?php endsnippet() ?>


<main class="main content">
    <?php if ($query) : ?>
        <?php if ($results->isNotEmpty()) : ?>
            <section class="items-grid">
                <?php foreach ($results->sortBy('category', 'desc') as $result) : ?>
                    <?php snippet('item', ['page' => $result], slots: true) ?>
                        <?php slot('agenda') ?>
                        <?php endslot() ?>
                    <?php endsnippet() ?>
                <?php endforeach ?>
            </section>
        <?php elseif ($results->isEmpty()) : ?>
            NO RESULTS!
        <?php endif ?>
    <?php else : ?>
        <section class="items-grid">
            <?php foreach ($items->sortBy('category', 'desc') as $item) : ?>
                <?php snippet('item', ['page' => $item], slots: true) ?>
                    <?php slot('agenda') ?>
                    <?php endslot() ?>
                <?php endsnippet() ?>
            <?php endforeach ?>
        </section>
        <?php if ($pagination->hasPages()) : ?>
            <section class="pagination">
                <nav class="pagination-nav">
                    <?php foreach ($pagination->range($range) as $r) : ?>
                        <a class="text-title<?= $pagination->page() === $r ? ' --current' : '' ?>" href="<?= $pagination->pageURL($r) ?>"><?= $r ?></a>
                    <?php endforeach ?>
                </nav>
            </section>
        <?php endif ?>
    <?php endif ?>
</main>

<?= snippet('about') ?>

<?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('foot') ?>

<!-- https://getkirby.com/docs/reference/objects/cms/pages/filter-by -->
<!-- https://getkirby.com/docs/cookbook/content/filtering#filter-page-collections-by-a-single-field -->
<!-- https://getkirby.com/docs/cookbook/extensions/use-placeholders -->