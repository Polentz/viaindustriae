<section class="section-wrapper">
    <div class="header">
        <ul class="main-menu">
            <li class="button static-button"><h1><?= $site->title() ?></h1></li>
            <li class="close-ui section-close">
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M1 1L13 13"/>
                </svg>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="content-grid">
            <div class="content-contact">
                <?= $site->contact()->toBlocks() ?>
                <div class="contact-block">
                    <button class="button contact-button">
                        <a href="<?= $site->subscribeLink()->toUrl() ?>" target="_blank" rel="noopener noreferrer"><?= $site->subscribeText()->kt() ?></a>
                    </button>
                    <button class="button contact-button">
                        <a href="<?= $site->fbLink()->toUrl() ?>" target="_blank" rel="noopener noreferrer"><?= $site->fbText()->kt() ?></a>
                    </button>
                    <button class="button contact-button">
                        <a href="<?= $site->igLink()->toUrl() ?>" target="_blank" rel="noopener noreferrer"><?= $site->igText()->kt() ?></a>
                    </button>
                </div>
            </div>
            <div class="content-text description-text">
                <?= $site->about()->toBlocks() ?>
            </div>
        </div>
    </div>
</section>