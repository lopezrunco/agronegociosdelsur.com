<div class="hero">
	<div class="gray-overlay">
		<div class="container">
			<div class="content-wrapper">
				<h6 class="subtitle">Clínica especializada en la atención médica y quirúrgica de animales exóticos y silvestres</h6>
				<h1 class="title">Tu mejor amigo es nuestra prioridad</h1>
				<?php
				$shop_page_url = get_permalink(wc_get_page_id('shop'));
				echo '<a class="btn btn-light" href="' . esc_url($shop_page_url) . '">Ir a la tienda <i class="fa-solid fa-paw"></i></a>'
					?>
			</div>
		</div>
	</div>
</div>