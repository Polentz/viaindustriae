<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('home') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main hero">
    <section class="hero-layer">
        <div class="hero-text">
            <p>Viaindustriae è</p>
            <p>una casa editrice</p>
            <p>con sede a Foligno, Italy</p>
        </div>
        <?php if ($heroLeft = $page->heroLeft()->toFile()) : ?>
            <div class="hero-cover">
                <img src="<?= $heroLeft->resize(1600, null)->url() ?>" alt="Some text">
            </div>
        <?php endif ?>
    </section>

    <section class="hero-layer">
        <div class="hero-text">
            <p>Viaindustriae è</p>
            <p>un'associazione culturale</p>
            <p>con sede a Foligno, Italy</p>
        </div>
        <?php if ($heroRight = $page->heroRight()->toFile()) : ?>
            <div class="hero-cover">
                <img src="<?= $heroRight->resize(1600, null)->url() ?>" alt="Some text">
            </div>
        <?php endif ?>
    </section>
</main>

<?= snippet('about') ?>

<?php snippet('footer', slots: true) ?>
    <?php slot('home') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('foot') ?>