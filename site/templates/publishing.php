<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('page') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main main-content">
    <section class="items-grid">
        <?php foreach ($page->children()->listed() as $product) : ?>
            <?php snippet('product', ['page' => $product], slots: true) ?>
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