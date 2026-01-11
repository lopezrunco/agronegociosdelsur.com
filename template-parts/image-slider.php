<?php
require_once get_template_directory() . '/functions.php';

if (file_exists(SERVICES_DATA_PATH)) {
	$json_data = file_get_contents(SERVICES_DATA_PATH);
	$services = json_decode($json_data, true);
} else {
	$services = [];
}

function resolve_service_url($slug) {
    switch ($slug) {
        case 'shop':
            return get_permalink(wc_get_page_id('shop'));
        default:
            return get_permalink(get_page_by_path($slug));
    }
}
?>

<section class="slider-content">
    <div class="slider">
        <?php foreach ($services as $index => $service): ?>
            <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/image-slider/<?php echo esc_attr($service['img']); ?>');">
                <div class="slider-caption">
                    <div class="caption">
                        <h1 class="title"><?php echo esc_html($service['title']); ?></h1>
                        <?php if (!empty($service['description'])): ?>
                            <h6 class="subtitle"><?php echo esc_html($service['description']); ?></h6>
                        <?php endif; ?>
                        <?php
                            $url = resolve_service_url($service['url']);
                            $btnText = esc_html($service['btnText']);
                            echo '<a class="btn btn-secondary" href="' . esc_url($url) . '">' . $btnText . ' <i class="fa-solid fa-chevron-right"></i></a>'
                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Slider arrow controls -->
    <div class="arrow-controls">
        <div class="prev"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="next"><i class="fa-solid fa-chevron-right"></i></div>
    </div>

    <!-- Slider position -->
    <div class="position"></div>

</section>

<script>
    const slides = document.querySelector(".slider").children;
    const prev = document.querySelector(".prev");
    const next = document.querySelector(".next");
    const position = document.querySelector(".position");
    let index = 0;

    prev.addEventListener("click", function() {
        prevSlide();
        updateCirclePosition();
        resetTimer();
    })
    next.addEventListener("click", function() {
        nextSlide();
        updateCirclePosition();
        resetTimer();
    })

    // Create slider position indicators.
    function circlePosition() {
        for (let i = 0; i < slides.length; i++) {
            const div = document.createElement("div");
            div.innerHTML = i + 1;
            div.setAttribute("onclick", "slideIndicator(this)")
            div.id = i;
            if (i == 0) {
                div.className = "active";
            }
            position.appendChild(div);
        }
    }
    circlePosition();

    // On click in slide indicator, go to slider.
    function slideIndicator(element) {
        index = element.id;
        changeSlide();
        updateCirclePosition();
        resetTimer();
    }

    // Update slider position indicator on slidee change.
    function updateCirclePosition() {
        for (let i = 0; i < position.children.length; i++) {
            position.children[i].classList.remove("active"); // Remove .active class from all the slide indicators.
        }
        position.children[index].classList.add("active");
    }

    // Prev and Next buttons
    function prevSlide() {
        if (index == 0) {
            index = slides.length - 1;
        } else {
            index--;
        }
        changeSlide();
    }

    function nextSlide() {
        if (index == slides.length - 1) {
            index = 0;
        } else {
            index++;
        }

        changeSlide();
    }

    function changeSlide() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove("active");
        }

        slides[index].classList.add("active");
    }

    // Stop autoplay when clicmk on indicators or arrows.
    function resetTimer() {
        clearInterval(timer);
        timer = setInterval(autoPlay, 9000); // Autoplay starts again.
    }

    // Autoplay slider
    function autoPlay() {
        nextSlide();
        updateCirclePosition();
    }

    let timer = setInterval(autoPlay, 9000);
</script>