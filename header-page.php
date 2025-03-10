<!doctype html>
<html lang="ja">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="./plugins/bootstrap/4.6.2/bootstrap.min.css">
	<!-- User CSS -->
	<link rel="stylesheet" href="./css/style.css">
	<title>会社概要 | 株式会社 南一</title>

	<?php wp_head('page'); ?>
</head>
<body>
	<header class="f-site-header">

		<h1 class="f-site-title">
			<a class="f-site-title__link" href="/">
				<img class="f-site-title__site-logo" src="<?php echo get_template_directory_uri(); ?>/img/site-logo_white.png" alt="株式会社南一のサイトロゴ">
			</a>
		</h1>

		<nav class="f-global-nav d-none d-xl-block">
			<ul class="f-global-nav__list clearfix">
				<li class="f-global-nav__list-item">
					<a class="f-global-nav__link" href="/">HOME</a>
				</li>
				<li class="f-global-nav__list-item">
					<a class="f-global-nav__link" href="./president-thoughts">S1社長の想い</a>
				</li>
				<li class="f-global-nav__list-item">
					<a class="f-global-nav__link" href="./company-profile">会社概要</a>
				</li>
				<li class="f-global-nav__list-item f-global-nav__list-item--dropdown">
					<a class="f-global-nav__link" href="">サービス料金一覧</a>
					<ul>
						<li>
							<a href="./price-list-champagne-tower">シャンパンタワー価格表</a>
						</li>
						<li>
							<a href="./price-list-original-champagne">オリジナルシャンパン価格表</a>
						</li>
						<li>
							<a href="./price-list-vacation-rental">民泊価格表</a>
						</li>
					</ul>
				</li>
				<li class="f-global-nav__list-item f-global-nav__list-item--dropdown">
					<a class="f-global-nav__link" href="">会社実績一覧</a>
					<ul>
						<li>
							<a href="./posts-list-champagne-tower">シャンパンタワー設置実績一覧</a>
						</li>
						<li>
							<a href="./posts-list-original-champagne">オリジナルシャンパン制作実績一覧</a>
						</li>
						<li>
							<a href="./posts-list-fan-meeting">ファンミーティング＆社会活動</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav><!-- global-nav -->

		<a class="btn f-site-header__btn-line d-none d-md-block" href="">
			<span>LINEでお問い合わせ</span>
		</a>

		<button type="button" class="btn c-btn-modal-gnav" data-toggle="modal" data-target="#modal-gnav">
			<span class="c-btn-modal-gnav__bar"></span>
		</button>

	</header><!-- site-header -->


	<div class="c-bottom-nav">

		<div class="container">
			<div class="row no-gutters">

				<div class="col-6 col-xl-4 order-xl-1">
					<a class="btn c-bottom-nav__btn-tel" href="">
						<span class="c-bottom-nav__tel-no d-none d-xl-inline-block">03-5944-1137</span>
						<span class="d-none d-xl-block clearfix"></span>
						<span class="c-bottom-nav__tel-txt">電話で簡単<br class="d-xl-none">お問合わせ</span>
					</a>
				</div><!-- col -->

				<div class="col-6 col-xl-4 order-xl-3">
					<a class="btn c-bottom-nav__btn-line" href="">
						<span class="c-bottom-nav__line-txt">LINEで簡単<br class="d-xl-none">お問合わせ</span>
					</a>
				</div><!-- col -->

				<div class="col-12 col-xl-4 order-xl-2">
					<p class="c-bottom-nav__open-time">受付時間 9:00-0:00<span>（年中無休）</span></p>
				</div>

			</div><!-- row -->
		</div><!-- container -->

	</div><!-- c-bottom-nav -->

	<!-- Modal -->
	<div class="modal fade c-modal-gnav" id="modal-gnav" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close c-modal-gnav__close-btn" data-dismiss="modal" aria-label="Close"></button>
				<div class="modal-body">
					<ul class="c-modal-gnav__list">
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="/">HOME</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./president-thoughts">S1社長の想い</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./company-profile">会社概要</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./price-list-champagne-tower">シャンパンタワー価格表</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./price-list-original-champagne">オリジナルシャンパン価格表</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./price-list-vacation-rental">民泊価格表</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./posts-list-champagne-tower">シャンパンタワー設置実績一覧</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./posts-list-original-champagne">オリジナルシャンパン制作実績一覧</a>
						</li>
						<li class="c-modal-gnav__list-item">
							<a class="c-modal-gnav__link" href="./posts-list-fan-meeting">ファンミーティング投稿一覧</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
