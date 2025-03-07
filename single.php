<?php get_header(); ?>

<?php get_header('page'); ?>


<section class="p-post">
	<div class="container">
		<?php if (have_posts()) : the_post(); ?>
			<main>
				<article class="c-post p-post__article">
					<div class="p-post__header">
						<div class="p-post__meta">

							<!-- 取得したカテゴリがあるか確認 -->
							<?php
								$categories = get_the_category();

								if (!empty($categories)) : ?>
								<ul class="c-post__category">
									<?php
											// 投稿のカテゴリを取得
											foreach ($categories as $cat) :
												$cat_name =  esc_html($cat->name);
												$cat_slug = esc_attr($cat->slug);
												$cat_link = esc_url(get_category_link($cat->term_id));
												?>
										<li>
											<a class="c-post__category-item c-archive-categories__item <?php echo $cat_slug; ?>" href="<?php echo $cat_link; ?>">
												<?php echo $cat_name; ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="p-post__date">
							<time class="c-post__date"><?php the_date(); ?></time>
						</div>
						<div class="p-post__ttl">
							<h1 class="c-post__ttl"><?php the_title(); ?></h1>
						</div>
					</div>
					<div class="p-post__body">
						<?php if (has_post_thumbnail()) : ?>
							<div class="c-post__first-img">
								<div class="c-post__img-wrap">
									<?php the_post_thumbnail('post-thumbnails', array('width' => '100%', 'alt' => the_title_attribute('echo=0'))); ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="p-post__txt">
							<p class="c-post__txt"><?php the_content(); ?></p>
						</div>
						<div class="p-post__info">
							<ul class="c-post__info">
								<?php if (get_field('about_date')) : ?>
									<?php
											echo '<li class="c-post__info-item">' . '<span class="c-post__info-ttl">日時</span>' . '<p class="c-post__item-txt">';
											the_field('about_date');
											echo '</p>' . '</li>';
											?>
								<?php endif; ?>
								<?php if (get_field('about_area')) : ?>
									<?php
											echo '<li class="c-post__info-item">' . '<span class="c-post__info-ttl">会場</span>' . '<p class="c-post__item-txt">';
											the_field('about_area');
											echo '</p>' . '</li>';
											?>
								<?php endif; ?>
								<?php if (get_field('about_cost')) : ?>
									<?php
											echo '<li class="c-post__info-item">' . '<span class="c-post__info-ttl">参加費</span>' . '<p class="c-post__item-txt">';
											the_field('about_cost');
											echo '</p>' . '</li>';
											?>
								<?php endif; ?>
								<?php if (get_field('about_capa')) : ?>
									<?php
											echo '<li class="c-post__info-item">' . '<span class="c-post__info-ttl">定員</span>' . '<p class="c-post__item-txt">';
											the_field('about_capa');
											echo '</p>' . '</li>';
											?>
								<?php endif; ?>
								<?php if (get_field('about_deadline')) : ?>
									<?php
											echo '<li class="c-post__info-item">' . '<span class="c-post__info-ttl">申込締切</span>' . '<p class="c-post__item-txt">';
											the_field('about_deadline');
											echo '</p>' . '</li>';
											?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<?php if (get_field('about_flyer')) : ?>
						<div class="p-post__flyer">
							<div class="c-post__flyer-img">
								<img src="<?php the_field('about_flyer'); ?>">
							</div>
							<div class="p-post__flyer-btn">
								<button type="button" class="c-button-flyer c-button" data-toggle="modal" data-target="#exampleModalScrollable">チラシを見る</button>
							</div>
						</div>
						<div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable" role="document">
								<div class="modal-content">
									<img src="<?php the_field('about_flyer'); ?>">
									<button type="button" class="c-button-flyer-close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
						</div>
					<?php endif; ?>

				</article>
			</main>

		<?php else : ?>
			<p>まだ投稿はありません。</p>
		<?php endif; ?>


		<?php
		$prevpost = get_adjacent_post(true, '', true); //前の記事
		$nextpost = get_adjacent_post(true, '', false); //次の記事
		if ($prevpost or $nextpost) { //前の記事、次の記事いずれか存在しているとき
			?>
			<ul class="c-post__link">
				<?php
					if ($prevpost) { //前の記事が存在しているとき
						echo '<li><a href="' . get_permalink($prevpost->ID) . '"><div class="c-post__link-img">' . get_the_post_thumbnail($prevpost->ID, 'thumbnail') . '</div><span>' . '＜' . get_the_title($prevpost->ID) . '</span></a></li>';
					} else { //前の記事が存在しないとき
						echo '<li></li>';
					}

					if ($nextpost) { //次の記事が存在しているとき
						echo '<li><a href="' . get_permalink($nextpost->ID) . '"><div class="c-post__link-img">' . get_the_post_thumbnail($nextpost->ID, 'thumbnail') . '</div><span>'  . get_the_title($nextpost->ID) .  '＞' . '</span></a></li>';
					} else { //次の記事が存在しないとき
						echo '<li></li>';
					}
					?>
			</ul>
		<?php } ?>
	</div>
</section>


<?php get_footer();
