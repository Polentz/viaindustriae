<?= snippet('head') ?>

<?php snippet('header', slots: true) ?>
    <?php slot('home') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main hero">
    <section class="hero-layer">
        <div class="hero-items">
            <p>Viaindustriae è</p>
            <p>una casa editrice</p>
            <p>con sede a Foligno, Italy</p>
        </div>
    </section>

    <section class="hero-layer">
        <div class="hero-items">
            <p>Viaindustriae è</p>
            <p>un'associazione culturale</p>
            <p>con sede a Foligno, Italy</p>
        </div>
    </section>
</main>

<?php snippet('footer', slots: true) ?>
    <?php slot('home') ?>
    <?php endslot() ?>
<?php endsnippet() ?>