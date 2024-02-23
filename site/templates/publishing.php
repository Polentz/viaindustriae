<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main content">
    <section class="items-grid">
        <?php foreach ($page->children()->listed() as $item) : ?>
            <?php snippet('item', ['page' => $item], slots: true) ?>
                <?php slot('product') ?>
                <?php endslot() ?>
            <?php endsnippet() ?>
        <?php endforeach ?> 
    </section>
</main>

<?php snippet('footer', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('foot') ?>