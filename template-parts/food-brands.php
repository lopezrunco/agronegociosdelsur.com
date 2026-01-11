<?php
require_once get_template_directory() . '/functions.php';

if (file_exists(FOOD_BRANDS_DATA_PATH)) {
	$json_data = file_get_contents(FOOD_BRANDS_DATA_PATH);
	$food_brands = json_decode($json_data, true);
} else {
	$food_brands = [];
}
?>

<section class="food-brands bg-light">
	<article class="container">
		<div class="row">
			<?php if (!empty($food_brands)) : ?>
				<?php foreach ($food_brands as $brand) : ?>
					<div class="col-lg-4 mb-3">
						<div class="wrapper bg-primary">
							<div class="paws-overlay">
								<div class="dark-gradient-overlay">
									<h2><?php echo esc_html($brand['title']) ?></h2>
									<span><?php echo esc_html($brand['subtitle']) ?></span>
									<img src="<?php
												echo esc_url(get_template_directory_uri() . '/assets/images/' . $brand['imageName']); ?>" alt="<?php echo esc_attr($brand['title']); ?>" />
									<?php
									$shop_page_url = get_permalink(wc_get_page_id($brand['link']));
									echo '<a 
											class="btn btn-dark" 
											href="' . esc_url($shop_page_url) . '">
											' . esc_html($brand['btnText']) . '
											<i class="fa-solid fa-chevron-right"></i>
										</a>'
									?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<p>No hay datos para mostrar.</p>
			<?php endif; ?>
		</div>
	</article>
</section>