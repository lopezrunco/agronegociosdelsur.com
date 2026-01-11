<?php
require_once get_template_directory() . '/functions.php';

if (file_exists(SERVICES_DATA_PATH)) {
	$json_data = file_get_contents(SERVICES_DATA_PATH);
	$services = json_decode($json_data);
?>

	<section class="featured-services bg-light overflow-hidden">
		<article class="container fade-in delay-level2">
			<div class="row">
				<?php foreach ($services as $service) : ?>
					<div class="col-lg-4 mb-4 p-5">
						<i class="<?php echo esc_html($service->icon) ?>"></i>
						<h4><?php echo esc_html($service->title) ?></h4>
						<?php if (!empty($service->description)) : ?>
							<p><?php echo esc_html($service->description); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</article>
	</section>

<?php
} else {
	echo '<p>Ocurrió un error al cargar los servicios.</p>';
}
?>