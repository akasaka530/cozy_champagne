<?php

/*----------------------------------------------------------*/
/* scriptとcssを読み込み */
/*----------------------------------------------------------*/

function add_link_files()
{

	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', false, true);
	wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', false, true);
	wp_enqueue_script('gsap-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', false, true);
	wp_enqueue_script('gsap-scroll-trigger-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', false, true);
	wp_enqueue_script('slick-script', get_template_directory_uri() . '/plugins/slick/slick-1.8.1/slick.min.js', false, true);
	wp_enqueue_script('my-script', get_template_directory_uri() . '/my.js', array('jquery', 'bootstrap-script'), date('YmdGis', filemtime(get_theme_file_path() . '/my.js')));

	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
	wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css');
	wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css');
	wp_enqueue_style('my-css', get_theme_file_uri('/css/common.css'), array('bootstrap'), date('YmdGis', filemtime(get_theme_file_path() . '/css/common.css')));
}

add_action('wp_enqueue_scripts', 'add_link_files');


/*----------------------------------------------------------*/
/* JS読み込みにdefer属性を付与 */
/*----------------------------------------------------------*/

add_filter('script_loader_tag', 'add_defer', 10, 2);
function add_defer($tag, $handle)
{
	if ($handle !== 'my-script') {
		return $tag;
	}
	return str_replace(' src=', ' defer src=', $tag);
}


/*----------------------------------------------------------*/
/* editor-style.cssファイルを有効にする */
/*----------------------------------------------------------*/

function add_block_editor_styles()
{
	//add_theme_support() で editor-styles を指定
	add_theme_support('editor-styles');

	//add_editor_style() で読み込むスタイルシートを指定
	add_editor_style('/css/common.css');
}

add_action('after_setup_theme', 'add_block_editor_styles');


/*----------------------------------------------------------*/
/* ブロックエディタ編集画面設定  カラーパレットとフォントサイズ */
/*----------------------------------------------------------*/

add_action('after_setup_theme', function () {
	// カラーパレット
	add_theme_support('editor-color-palette', array(
		array(
			'name' => 'ホワイト',
			'slug' => 'color-white',
			'color' => '#ffffff',
		),
		array(
			'name' => 'ブラック',
			'slug' => 'color-black',
			'color' => '#ffffff',
		),
		array(
			'name' => 'グレー',
			'slug' => 'color-gray',
			'color' => '#ffffff',
		),
		array(
			'name' => 'メインカラー',
			'slug' => 'color-main',
			'color' => '#b4df76',
		),
		array(
			'name' => 'アクセントカラー',
			'slug' => 'color-accent',
			'color' => '#3CA64D',
		),
		array(
			'name' => 'ベースカラー（01）',
			'slug' => 'color-bace-primary',
			'color' => '#FFF9E3',
		),
		array(
			'name' => 'ベースカラー（02）',
			'slug' => 'color-bace-secondary',
			'color' => '#FFF9E3',
		),
		array(
			'name' => 'テキスト強調カラー',
			'slug' => 'color-text-accent',
			'color' => '#FFF9E3',
		)
	));

	// フォントサイズ
	add_theme_support('editor-font-sizes', array(
		array(
			'name' => '小',
			'shortName' => 'S',
			'size' => 13.5,
			'slug' => 'small'
		),
		array(
			'name' => '中',
			'shortName' => 'M',
			'size' => 16,
			'slug' => 'regular'
		),
		array(
			'name' => '大',
			'shortName' => 'L',
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => '特大',
			'shortName' => 'LL',
			'size' => 36,
			'slug' => 'wlarge'
		)
	));
});


/*----------------------------------------------------------*/
/* 外観＞メニューの設置 */
/*----------------------------------------------------------*/

add_action('after_setup_theme', 'register_menu');
function register_menu()
{
	register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
}
// カスタムメニューの位置を設定
if (!function_exists('lab_setup')) :

	function lab_setup()
	{

		register_nav_menus(array(
			'global' => 'グローバルナビ',
			'header' => 'ヘッダーナビ',
			'footer' => 'フッターナビ',
		));
	}
endif;
add_action('after_setup_theme', 'lab_setup');


/*----------------------------------------------------------*/
/* アイキャッチ画像を有効 */
/*----------------------------------------------------------*/

add_theme_support('post-thumbnails');

add_filter('image_send_to_editor', 'remove_image_attribute', 10);
add_filter('post_thumbnail_html', 'remove_image_attribute', 10);
function remove_image_attribute($html)
{
	$html = preg_replace('/(width|height)="\d*"\s/', '', $html);
	$html = preg_replace('/class=[\'"]([^\'"]+)[\'"]/i', '', $html); // class を削除
	return $html;
}


/*----------------------------------------------------------*/
/* アーカイブURLを有効化 */
/*----------------------------------------------------------*/

function post_has_archive($args, $post_type)
{
	if ('post' == $post_type) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'archive'; //任意のスラッグ名 ←アーカイブページを有効に
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

add_filter('post_type_archive_link', function ($link, $post_type) {
	if ('post' === $post_type) {
		$post_type_object = get_post_type_object('post');
		$slug = $post_type_object->has_archive;
		$link = get_home_url(null, '/' . $slug . '/');
	}
	return $link;
}, 10, 2);

function add_article_post_permalink($permalink)
{
	$permalink = '/archive' . $permalink; //「archive」は任意のものに変えて下さい。
	return $permalink;
}
add_filter('pre_post_link', 'add_article_post_permalink');

function add_article_post_rewrite_rules($post_rewrite)
{
	$return_rule = array();
	foreach ($post_rewrite as $regex => $rewrite) {
		$return_rule['archive/' . $regex] = $rewrite; //「archive」は任意のものに変えて下さい。
	}
	return $return_rule;
}
add_filter('post_rewrite_rules', 'add_article_post_rewrite_rules');


/*----------------------------------------------------------*/
/* パンくずリスト */
/*----------------------------------------------------------*/

function breadcrumb()
{
	$home = '<li class="c-breadcrumb-first"><a href="' . get_bloginfo('url') . '" >HOME</a></li>';
	$root = ' class="c-breadcrumb-last"';
	$arrow = '<li class="c-breadcrumb-arrow">＞</li>';

	echo '<ul class="c-breadcrumb">';
	if (is_front_page()) {
		// トップページの場合は表示させない
	}
	// カテゴリページ
	else if (is_category()) {
		$cat = get_queried_object();
		$cat_id = $cat->parent;
		$cat_list = array();
		while ($cat_id != 0) {
			$cat = get_category($cat_id);
			$cat_link = get_category_link($cat_id);
			array_unshift($cat_list, '<li><a href="' . $cat_link . '">' . $cat->name . '</a></li>');
			$cat_id = $cat->parent;
		}
		echo $home;
		echo $arrow;
		foreach ($cat_list as $value) {
			echo $value;
		}
		the_archive_title('<li' . $root . '>', '</li>');
	}
	// アーカイブ・タグページ
	else if (is_archive()) {
		echo $home;
		echo $arrow;
		the_archive_title('<li' . $root . '>', '</li>');
	}
	// 投稿ページ
	else if (is_single()) {
		echo $home;
		echo $arrow;
		$cat = get_the_category();
		if (isset($cat[0]->cat_ID)) $cat_id = $cat[0]->cat_ID;
		$cat_list = array();
		while ($cat_id != 0) {
			$cat = get_category($cat_id);
			$cat_link = get_category_link($cat_id);
			array_unshift($cat_list, '<li><a href="' . $cat_link . '">' . $cat->name . '</a></li>');
			$cat_id = $cat->parent;
		}
		foreach ($cat_list as $value) {
			echo $value;
		}
		echo $arrow;
		the_title('<li' . $root . '>', '</li>');
	}
	// 固定ページ
	else if (is_page()) {
		echo $home;
		echo $arrow;
		the_title('<li' . $root . '>', '</li>');
	}
	// 404ページの場合
	else if (is_404()) {
		echo $home;
		echo $arrow;
		echo '<li>ページが見つかりません</li>';
	}
	echo "</ul>";
}
// アーカイブのタイトルを削除
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_month()) {
		$title = single_month_title('', false);
	}
	return $title;
});


/*----------------------------------------------------------*/
/* トップページ以外のページではグローバルナビゲーションのメニューのリンクにURLを追加する */
/*----------------------------------------------------------*/

function addHomeUrl()
{
	if (!is_front_page()) :
		echo home_url();
	endif;
}
