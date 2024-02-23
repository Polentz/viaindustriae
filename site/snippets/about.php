<section class="slider">
    <div class="slider-wrapper">
        <div class="header">
            <div class="main-menu">
                <h1 class="button static-button"><?= $site->title() ?></h1>
                <div class="close-ui slider-close">
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
                        <a class="button contact-button" href="<?= $site->newsletter() ?>" target="_blank" rel="noopener noreferrer">Newletter</a>
                        <a class="button contact-button" href="<?= $site->facebook() ?>" target="_blank" rel="noopener noreferrer">FB</a>
                        <a class="button contact-button" href="<?= $site->instagram() ?>" target="_blank" rel="noopener noreferrer">IG</a>
                    </div>
                </div>
                <div class="content-text description-text">
                    <?= $site->about()->toBlocks() ?>
                </div>
            </div>
        </div>
    </div>
</section>