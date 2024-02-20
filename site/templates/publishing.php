<?= snippet('header') ?>

<header class="header">
    <?php snippet('nav', slots: true) ?>
        <?php slot('page') ?>
        <?php endslot() ?>
    <?php endsnippet() ?>
</header>

<main class="main">
    <section class="items-grid">
        <?php foreach ($items = $page->children()->listed()->paginate(16) as $item) : ?>
            <?php snippet('item', slots: true) ?>
                <?php slot('book') ?>
                <?php endslot() ?>
            <?php endsnippet() ?>
        <?php endforeach ?> 
    </section>
</main>

<?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>