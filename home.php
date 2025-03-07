<?php get_header(); ?>

<!-- drawer -->

<div id="js-drawer" class="l-drawer">
	<div class="l-drawer__inner">

		<!-- site logo -->
		<h1 class="l-header__logo">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="テンプレート">
			</a>
		</h1>

		<!-- gloval navigation -->

		<nav class="l-drawer__nav">
			<ul class="l-drawer__nav-menu js-nav-menu">
				<li>
					<a href="<?php addHomeUrl(); ?>#area-0">
						<span>セクション01</span>
					</a>
				</li>
				<li>
					<a href="<?php addHomeUrl(); ?>#area-1">
						<span>セクション02</span>
					</a>
				</li>
				<li>
					<a href="<?php addHomeUrl(); ?>#area-2">
						<span>セクション03</span>
					</a>
				</li>
				<li>
					<a href="<?php addHomeUrl(); ?>#area-3">
						<span>セクション04</span>
					</a>
				</li>
				<li>
					<a href="<?php addHomeUrl(); ?>#area-4">
						<span>セクション05</span>
					</a>
				</li>
			</ul>
		</nav>


		<!-- contact -->

		<div class="l-drawer__contact-wrap">
			<a class="c-button--icon" href="">
				<div class="c-button__inner">
					<span class="c-button__text">お問い合せ</span>
				</div>
			</a>
		</div>


		<!-- sns -->

		<div class="l-drawer__sns-wrap">
			<a class="c-button-sns" href="<?php echo esc_url(''); ?>">
				SNSを見る
			</a>
		</div>
	</div>
</div>



<!-- main content -->

<main>


	<!-- hero -->

	<section id="area-0" class="p-home-hero p-home-section js-section-scroll">
		<div class="p-home-hero__wrap">

		</div>
	</section>


	<!-- section-1 -->

	<section id="area-1" class="p-home-1 p-home-section">
		<div class="p-home-1__inner js-section-scroll">
			<div class="p-home-1__header">
				<div class="l-container">
					<h2 class="c-heading-2">
						タイトル１
					</h2>
				</div>
			</div>
			<div class="p-home-1__body">
				<div class="l-container">
					<div class="p-home-1__catch-wrap">
						<p class="p-home-1__catch">
							サンプルテキスト
						</p>
					</div>
					<div class="p-home-1__lead-wrap">
						<p class="p-home-1__lead">
							サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト
						</p>
						<p class="p-home-1__lead">
							サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト
						</p>
						<p class="p-home-1__lead">
							サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト
						</p>
						<p class="p-home-1__lead">
							サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- section-2 -->

	<section id="area-2" class="p-home-2 p-home-section">
		<div class="p-home-2__inner js-section-scroll">
			<div class="p-home-2__header">
				<div class="l-container">
					<h2 class="c-heading-2">
						タイトル2
					</h2>
				</div>
			</div>
			<div class="p-home-2__body">
				<div class="l-container">
					<div class="p-home-2__slider">
						<ul class="js-slider">


							<!-- sub roop -->

							<?php
							$args = array(
								'category_name' => 'activities',
								'post_type' => 'post',
								'posts_per_page' => 9,
								'ignore_sticky_posts' => 1,
								'order' => 'DESC', //記事の順番をソート(降順)
								'orderby' => 'date' // 日付で並べる
							);
							$works_query = new WP_Query($args);
							?>

							<?php if ($works_query->have_posts()) : ?>
								<?php while ($works_query->have_posts()) : $works_query->the_post(); ?>


									<!-- roop contents -->

									<li class="c-home-2__slider-item">
										<article class="c-card__template">
											<a href="<?php the_permalink(); ?>">
												<div class="c-card__template--thumbnail">
													<?php if (has_post_thumbnail()) : ?>
														<?php the_post_thumbnail('post-thumbnails', array('alt' => the_title_attribute('echo=0'))); ?>
													<?php else : ?>
														<img src="<?php echo get_template_directory_uri(); ?>/img/img-no_image.jpg" alt="表示出来る画像がありません">
													<?php endif; ?>
												</div>
												<h3 class="c-card__template--heading">
													<?php the_title(); ?>
												</h3>
												<p class="c-card__template--body">
													<?php
															$excerpt = get_the_excerpt();
															echo $excerpt;
															?>
												</p>
												<div class="c-card__template--meta">
													<?php if (get_field('template-acf_01')) : ?>
														<?php
																	echo '<div class="c-card__template--01">' . '<p>';
																	the_field('template-acf_01');
																	echo '</p>' . '</div>';
																	?>
													<?php endif; ?>
													<?php if (get_field('template-acf_02')) : ?>
														<?php
																	echo '<div class="c-card__template--02">' . '<p>';
																	the_field('template-acf_02');
																	echo '</p>' . '</div>';
																	?>
													<?php endif; ?>
													<?php if (get_field('template-acf-img_01')) : ?>
														<?php
																	echo '<div class="c-card__template--img-01">' . '<img src="';
																	the_field('template-acf-img_01');
																	echo '">' . '</div>';
																	?>
													<?php endif; ?>
												</div>
											</a>
										</article>
									</li>
								<?php endwhile; ?>
							<?php else : ?>
								<p>まだ投稿はありません。</p>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- section-3 -->

	<section id="area-3" class="p-home-3 p-home-section">
		<div class="p-home-3__inner js-section-scroll">
			<div class="p-home-3__header">
				<div class="l-container">
					<h2 class="c-heading-2">
						タイトル3
					</h2>
				</div>
			</div>
			<div class="p-home-3__body">
				<div class="l-container">
				</div>
			</div>
		</div>
	</section>


	<!-- section-4 -->

	<section id="area-4" class="p-home-4 p-home-section">
		<div class="p-home-4__inner js-section-scroll">
			<div class="p-home-4__header">
				<div class="l-container">
					<h2 class="c-heading-2">
						タイトル3
					</h2>
				</div>
			</div>
			<div class="p-home-4__body">
				<div class="l-container">
				</div>
			</div>
		</div>
	</section>


	<!-- section-5 -->

	<section id="area-5" class="p-home-5 p-home-section">
		<div class="p-home-5__inner js-section-scroll">
			<div class="p-home-5__header">
				<div class="l-container">
					<h2 class="c-heading-2">
						タイトル3
					</h2>
				</div>
			</div>
			<div class="p-home-5__body">
				<div class="l-container">
				</div>
			</div>
		</div>
	</section>

</main>




<?php get_footer();
