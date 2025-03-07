<!doctype html>
<html lang="ja">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="このテンプレートサイトの説明を入れてください">

	<!-- Adobe Fonts -->
	<script>
		(function(d) {
			var config = {
					kitId: 'jam7ego',
					scriptTimeout: 3000,
					async: true
				},
				h = d.documentElement,
				t = setTimeout(function() {
					h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
				}, config.scriptTimeout),
				tk = d.createElement("script"),
				f = false,
				s = d.getElementsByTagName("script")[0],
				a;
			h.className += " wf-loading";
			tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
			tk.async = true;
			tk.onload = tk.onreadystatechange = function() {
				a = this.readyState;
				if (f || a && a != "complete" && a != "loaded") return;
				f = true;
				clearTimeout(t);
				try {
					Typekit.load(config)
				} catch (e) {}
			};
			s.parentNode.insertBefore(tk, s)
		})(document);
	</script>

	<!-- wordpress 管理画面のヘッダーを非表示にする -->
	<?php if (is_user_logged_in()) : ?>
		<style type="text/css">
			.l-header {
				margin-top: 32px;
			}

			@media screen and (max-width: 780px) {
				.l-header {
					margin-top: 46px;
				}
			}

			@media screen and (max-width: 600px) {
				#wpadminbar {
					position: fixed !important;
				}
			}
		</style>
	<?php endif; ?>

	<!-- title -->
	<?php
	if (is_front_page()) {
		// トップページだったら
		$title = get_bloginfo('name');
	} else {
		$title = get_the_title(); // 今表示しているページのタイトルを取得
		$current_id = get_the_ID(); // 今表示しているページのページIDを取得
		$ancestors = get_post_ancestors($current_id); // 今表示しているページの親ページを取得
		if (!empty($ancestors)) { // 親ページがあるか判定
			foreach ($ancestors as $ancestor) { // 親ページの個数分繰り返す
				$title = get_the_title($ancestor) . '｜' . $title; // 親ページのタイトルを付け加える
			}
		}
		$title = get_bloginfo('name') . '｜' . $title; // サイト名を付け加える
	}
	?>
	<title><?php echo $title; ?></title>

	<!-- favicon -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	<!-- Google tag (gtag.js) -->


	<?php wp_head(); ?>
</head>

<body>
	<header class="l-header js-header">
		<div class="l-header__inner l-row-between l-container">
			<!-- site logo -->
			<h1 class="l-header__logo l-shrink">
				<a href="">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="l-contain l-center" alt="テンプレート">
				</a>
			</h1>
			<!-- gloval navigation -->
			<nav class="l-header__nav">
				<ul class="l-header__nav-menu l-row-between js-nav-menu">
					<li>
						<a href="<?php addHomeUrl(); ?>#area-1">
							<span>セクション01</span>
						</a>
					</li>
					<li>
						<a href="<?php addHomeUrl(); ?>#area-2">
							<span>セクション02</span>
						</a>
					</li>
					<li>
						<a href="<?php addHomeUrl(); ?>#area-3">
							<span>セクション03</span>
						</a>
					</li>
					<li>
						<a href="<?php addHomeUrl(); ?>#area-4">
							<span>セクション04</span>
						</a>
					</li>
					<li>
						<a href="<?php addHomeUrl(); ?>#area-5">
							<span>セクション05</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- contact -->
			<div class="l-header__contact-wrap">
				<a class="c-button--icon" href="">
					<div class="c-button__inner">
						<span class="c-button__text">お問い合せ</span>
					</div>
				</a>
			</div>
			<!-- sns -->
			<div class="l-header__sns-wrap">
				<a class="c-button-sns" href="<?php echo esc_url(''); ?>">
					SNSを見る
				</a>
			</div>
			<!-- hambarger menu -->
			<div class="l-header__ham-menu">
				<button id="js-menu-trigger" class="l-header__trigger">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</div>
	</header>