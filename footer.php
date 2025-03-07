<footer class="l-site-footer scroll-point">
	<div class="l-site-footer__link">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'footer',
			'container'      => false,
			'depth'          => 1,
		));
		?>
	</div>
	<div class="l-site-footer__upside">
	</div>
	<div class="l-site-footer__downside">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="l-site-footer-profile">
						<div class="l-site-footer-profile__name">特定非営利活動法人<br>ひだまりの森</div>
						<div class="l-site-footer-profile__tel">相談電話：045-341-3607</div>
						<div class="l-site-footer-profile__cel">事務局：080-4808-1154　/　070-1470-5187</div>
						<div class="l-site-footer-profile__mail">メール：hidamarimori1154@sky.hi-ho.ne.jp</div>
					</div><!-- footer-profile -->
				</div><!-- col -->
				<div class="col-md-7">
					<figure class="l-site-footer__fig">
					</figure>
					<p class="l-site-footer__note">「ひだまりの森 子育て期の相談」は「NPO法人ひだまりの森」が、赤い羽根共同募金等を財源とする、トモニー助成金の配分を受けて実施しています。</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
		<menu class="l-site-footer__menu">
			<a href="<?php echo esc_url(home_url('/')); ?>privacy-policy">個人情報の保護について</a>
			<a href="<?php echo esc_url(home_url('/')); ?>company-statute">定款</a>
			<a href="<?php echo esc_url(home_url('/')); ?>balance-sheet">貸借対照表</a>
		</menu>
	</div><!-- l-site-footer__downside -->

</footer><!-- l-site-footer -->

<?php wp_footer(); ?>
</body>

</html>