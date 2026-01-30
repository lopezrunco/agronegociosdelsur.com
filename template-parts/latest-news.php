<section class="news-grid">
	<article class="container">
		<?php
		// Query latest blog posts
		$latest_posts = new WP_Query(
			array(
				'posts_per_page' => 3,
				'post_type' => 'post',
				'orderby' => 'date',
				'order' => 'DESC',
			)
		);
		if ($latest_posts->have_posts()) {
			echo '
				<div class="section-title">
					<h2>Novedades recientes</h2>
					<p>
						Explora las últimas novedades y tendencias.
						Mantente al día con los últimos productos, eventos y descubrimientos.
					</p>
				</div>
			';
			echo '<div class="row">';
			while ($latest_posts->have_posts()) {
				$latest_posts->the_post();
				?>
				<div class="col-lg-4 mb-5">
					<div class="new-wrapper">
						<?php if (has_post_thumbnail()) { ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							</div>
						<?php } ?>
						<div class="post-content">
							<small class="post-date mb-3">
								<i class="fa-solid fa-calendar-days me-2"></i>
								<?php echo get_the_date('j \d\e F \d\e Y'); ?>
							</small>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<div class="post-excerpt">
								<?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary read-more">Continuar leyendo <i
									class="fa-solid fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<?php
			}
			echo '</div>';
			// Restore global post data
			wp_reset_postdata();
		} else {
			echo '<p>No se encontraron novedades.</p>';
		}
		?>
	</article>
</section>