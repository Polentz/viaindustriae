<!DOCTYPE html>
<html lang="<?= I18n::locale() ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site->title() ?></title>
    <meta name="description"
        content="<?= $site->description() ?>">
    <link rel="canonical" href="<?= $page->url() ?>">
    <meta name="keywords"
        content="<?= $site->keywords() ?>">
    <meta property="og:locale" content="<?= t('langCode') ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $site->title()?>">
    <meta property="og:description"
        content="<?= $site->description() ?>">
    <meta property="og:url" content="<?= $page->url() ?>">
    <meta property="og:site_name" content="<?= $site->title()?>">
    <?php if ($site->ogimage()->isNotEmpty()) : ?>
        <meta property="og:image" content="<?= $site->ogimage()->toFile()->url() ?>">
        <meta property="og:image:alt" content="<?= $site->ogimage()->toFile()->alt() ?>">
    <?php endif ?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description"
        content="<?= $site->description() ?>">
    <meta name="twitter:title"
        content="<?= $site->title()?>">
    <?php if ($site->ogimage()->isNotEmpty()) : ?>
        <meta name="twitter:image:alt" content="<?= $site->ogimage()->toFile()->alt() ?>">
    <?php endif ?>
    <!-- Make sure order pages are not indexed by search engines -->
    <?php if (option('debug') === true || $page->intendedTemplate()->name() === 'order'): ?>
        <meta name="robots" content="noindex,nofollow">
    <?php else : ?>
        <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <?php endif ?>
    <?= css ([
        'assets/css/base.css',
        'assets/css/variables.css',
        'assets/css/style.css',
        '@auto',
    ]) ?>
    <noscript>Please turn on JS to navigate this website</noscript>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <?= js('assets/js/script.js') ?>
    <?= js('assets/js/cart.js', ['defer' => true]) ?>
    <?php if (in_array($page->intendedTemplate()->name(), ['agenda', 'home', 'product', 'projects', 'shop'])) : ?>
        <?= js('assets/js/templates/agenda.js') ?>
        <?= js('assets/js/templates/home.js') ?>
        <?= js('assets/js/templates/product.js', ['defer' => true]) ?>
        <?= js('assets/js/templates/projects.js') ?>
        <?= js('assets/js/templates/shop.js', ['defer' => true]) ?>
    <?php endif ?>
    <?php if ($page->intendedTemplate()->name() === 'checkout') : ?>
        <?= js('assets/js/templates/checkout.js', ['defer' => true]) ?>
        <?= js('assets/js/templates/conditional-fields.js', ['defer' => true]) ?>
    <?php endif ?>
</head>
<body>