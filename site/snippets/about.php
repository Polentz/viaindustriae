<section class="section-wrapper">
    <div class="header">
        <div class="main-menu">
            <h1 class="button static-button"><?= $site->title() ?></h1>
            <div class="close-ui section-close">
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M1 1L13 13"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="content-grid">
            <div class="content-contact">
                <?= $site->contact()->toBlocks() ?>
                <div class="contact-block">
                    <a class="button contact-button" href="<?= $site->subscribeLink()->toUrl() ?>" target="_blank" rel="noopener noreferrer"><?= $site->subscribeText()->kt() ?></a>
                    <a class="button contact-button" href="<?= $site->fbLink()->toUrl() ?>" target="_blank" rel="noopener noreferrer"><?= $site->fbText()->kt() ?></a>
                    <a class="button contact-button" href="<?= $site->igLink()->toUrl() ?>" target="_blank" rel="noopener noreferrer"><?= $site->igText()->kt() ?></a>
                </div>
            </div>
            <div class="content-text description-text">
                <?= $site->about()->toBlocks() ?>
            </div>
        </div>
    </div>
</section>