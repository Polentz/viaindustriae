<section class="slider">
    <div class="slider-wrapper">
        <div class="slider-header">
            <h1 class="button static-button"><?= $site->title() ?></h1>
        </div>

        <div class="slider-content">
            <div class="slider-content-grid">
                <div class="slider-content-contact">
                    <?= $site->contact()->toBlocks() ?>
                    <div class="slider-contact-block">
                        <?php if ($site->newsletter()->isNotEmpty()) : ?>
                            <a class="button contact-button" href="<?= $site->newsletter() ?>" target="_blank" rel="noopener noreferrer">Newletter</a>
                        <?php endif ?>
                        <?php if ($site->facebook()->isNotEmpty()) : ?>
                            <a class="button contact-button" href="<?= $site->facebook() ?>" target="_blank" rel="noopener noreferrer">FB</a>
                        <?php endif ?>
                        <?php if ($site->instagram()->isNotEmpty()) : ?>
                            <a class="button contact-button" href="<?= $site->instagram() ?>" target="_blank" rel="noopener noreferrer">IG</a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="slider-content-text description-text">
                    <?php if ($site->about()->isNotEmpty()) : ?>
                        <?= $site->about() ?>
                    <?php endif ?>
                </div>
                <div class="close-ui slider-close">
                    <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L1 13M1 1L13 13"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>