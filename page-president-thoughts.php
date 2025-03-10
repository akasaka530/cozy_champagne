<?php
    /*
    Template Name: 社長の想い
    */
?>

<?php get_header('page'); ?>


<div class="f-pt-first-view">

<p class="f-pt-first-view__copy">
	<span class="f-pt-first-view__copy-underline">
		若者達に伝えたい<br>人生は自分でつくるもの。
	</span>
</p>

<div class="profile">
	<p class="profile__company-name">株式会社 南一<br>代表取締役社長</p>
	<p class="profile__full-name">南清次郎</p>
</div>

<div class="clearfix"></div>

<img class="f-pt-first-view__main-visual" src="<?php echo get_template_directory_uri(); ?>/img/main-visual_president-thoughts_01.jpg" alt="ホストクラブやキャバクラ向けのイベント事業を手掛ける。株式会社 南一のメインビジュアル画像">

<div class="f-message">
	<h2 class="f-message__ttl">S1社長の想い</h2>
	<p class="f-message__txt">人生とはどうあるべきなのか、苦労とは人を強くする。</p>
	<p class="f-message__txt">誰しも人生という道は、心の支えが必要であると考えております。<br class="d-none d-md-block">人には良い事、悪い事を神様は誰しもに半分ずつ与えると考えています。</p>
	<p class="f-message__txt">しかし乗り越えられない試練は与えないのです。</p>
</div>
</div><!-- f-pt-first-view -->


<section class="f-pt-ten-knowledges">
<div class="container">
	<h2 class="f-pt-ten-knowledges__sec-ttl">
		<img class="f-pt-ten-knowledges__sec-img" src="<?php echo get_template_directory_uri(); ?>/img/heading-image/heading-image_ten-knowledge.png" alt="">
	</h2>
	<?php the_content(); ?>
</div><!-- container -->
</section><!-- f-pt-ten-knowledges -->

<?php get_footer('page'); ?>