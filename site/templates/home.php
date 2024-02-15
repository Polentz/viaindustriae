<?= snippet('head') ?>

<header class="header">
    <?php snippet('nav', slots: true) ?>
        <?php slot('homeNav') ?>
        <?php endslot() ?>
    <?php endsnippet() ?>
</header>

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

<?= snippet('footer') ?>