<?php
require_once get_template_directory() . '/functions.php';

if (file_exists(VIDEOS_DATA_PATH)) {
    $json_data = file_get_contents(VIDEOS_DATA_PATH);
    $videos = json_decode($json_data, true); // "True" to decode as Associative array instead of an Object. 
} else {
    $videos = array();
}
?>

<section class="video-thumbs d-none d-lg-block">
    <article class="container fade-in delay-level2">
        <div class="section-title-more">
            <div>
                <span class="top-title">Vea nuestros equipos en funcionamiento</span>
                <h2>Nuestro trabajo</h2>
            </div>
            <div>
                <a 
                    class="btn btn-secondary d-none d-lg-inline-block" 
                    href="<?php echo get_permalink( get_page_by_path('contacto') ); ?>"
                >
                    Contacto <i class="fa-solid fa-chevron-right"></i>
                </a>

            </div>
        </div>
        <div class="row">
            <?php foreach($videos as $video) : ?>
                <div class="col-lg-3 mb-3">
                    <video 
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/videos/' . $video); ?>" 
                        class="w-100" 
                        controls 
                        preload="metadata">
                        <source src="<?php echo esc_url(get_template_directory_uri() . '/assets/videos/' . $video); ?>" type="video/mp4"
                    >
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php endforeach; ?>
        </div>
    </article>
</section>