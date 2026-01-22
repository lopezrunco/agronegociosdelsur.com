<section class="bg-light">
    <article class="container fade-in delay-level2">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Síganos en Instagram</h2>
                    <div class="separator"></div>
                </div>

                <!-- Elfsight Instagram Feed -->
                <script src="https://elfsightcdn.com/platform.js" async></script>
                <?php if(defined('ELFSIGHT_INSTAGRAM_APP_ID')) : ?>
                    <div class="elfsight-app-<?php echo esc_attr(ELFSIGHT_INSTAGRAM_APP_ID); ?>" data-elfsight-app-lazy></div>
                <?php else : ?>
                    <p>Ocurrió un error al contectar con Instagram.</p>
                <?php endif; ?>
                
            </div>
        </div>
    </article>
</section>