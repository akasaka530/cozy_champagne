<?php get_header(); ?>

<?php get_header('page'); ?>

<section class="p-archive">
	<div class="c-page-sec-ttl">
		<?php
		$category = get_the_category();
		$slug = $category[0]->category_nicename;
		?>
		<h3>カテゴリー：<?php single_cat_title(); ?>の投稿一覧</h3>
	</div>
	<!-- お知らせ一覧＞すべてのカテゴリを表示 -->
	<?php
	$argsAll = array(
		'orderby' => 'id',
		'order' => 'asc',
		'hide_empty' => 1,
	);
	$categoriesAll = get_categories($argsAll);
	?>

	<ul class="c-archive-categories">
		<?php foreach ($categoriesAll as $categoryAll) : ?>
			<li>
				<!--取得したIDを使用し、get_category_linkでリンクを取得-->
				<a class="c-archive-categories__item" href="<?php echo get_category_link($categoryAll->term_id); ?>">
					<!--カテゴリ名を表示-->
					<?php echo $categoryAll->name; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

	<!-- お知らせ一覧＞すべての記事を表示 -->
	<main class="p-archive__body">
		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$args = array(
			'paged' => $paged,
			'category_name' => $slug,
			'post_type' => 'post',
			'posts_per_page' => 6,
			'ignore_sticky_posts' => 1,
			'order' => 'DESC', //記事の順番をソート(降順)
			'orderby' => 'date' // 日付で並べる
		);
		$works_query = new WP_Query($args);
		?>

		<?php if ($works_query->have_posts()) : ?>
			<?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
				<!-- 繰り返したい内容を記述する -->
				<article class="c-archive-post">
					<!-- 取得したカテゴリがあるか確認 -->
					<?php
							$categories = get_the_category();

							if (!empty($categories)) : ?>
						<ul class="c-archive-post__category">
							<?php
										// 投稿のカテゴリを取得
										foreach ($categories as $cat) :
											$cat_name =  esc_html($cat->name);
											$cat_slug = esc_attr($cat->slug);
											$cat_link = esc_url(get_category_link($cat->term_id));
											?>
								<li>
									<a class="c-archive-post__category-item c-archive-categories__item <?php echo $cat_slug; ?>" href="<?php echo $cat_link; ?>">
										<?php echo $cat_name; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<div class="c-archive-post__txtarea">
						<time datetime="">
							<?php echo the_time(get_option('date_format')); ?>
						</time>
						<?php if (get_field('event_date')) : ?>
							<?php
										echo '<span class="c-archive-post__event-date">';
										the_field('event_date');
										echo '</span>';
										?>
						<?php endif; ?>
						<a href="<?php echo esc_url(get_permalink($id)); ?>">
							<h3 class="c-archive-post__ttl js-textTrim_3">
								<?php the_title(); ?>
							</h3>
						</a>
					</div>
					<div class="c-archive-post__img">
						<?php the_post_thumbnail('post-thumbnails', array('alt' => the_title_attribute('echo=0'))); ?>
					</div>
					<div class="p-archive__link">
						<a class="c-button-detail c-button" href="<?php the_permalink(); ?>">
							詳しく見る
						</a>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<p>まだ投稿はありません。</p>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	</main>

	<?php the_posts_pagination(
		array(
			'mid_size'           => 1, // 現在のページの両端に表示するページ数
		)
	); ?>

</section>



<?php get_footer();
