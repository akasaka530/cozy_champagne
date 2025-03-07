//*----------------------------------------------------------*/
/*  レスポンシブの375px未満のviewport画面幅を固定 */
/*----------------------------------------------------------*/


//*----------------------------------------------------------*/
/*  1200pxを境界にクラス名をつける
/*----------------------------------------------------------*/

const changeWidth = 1200; // 変更を検知する横幅
const devicePC = "pc";
const deviceSP = "sp";

jQuery(window).on('load resize', function () {
	const i_width = jQuery(window).outerWidth(true);
	jQuery('body').toggleClass(devicePC, i_width >= changeWidth);
	jQuery('body').toggleClass(deviceSP, i_width < changeWidth);
});


//*----------------------------------------------------------*/
/*  グローバルナビゲーションのスムーススクロール
/*----------------------------------------------------------*/

//基準点の準備
var elemTop = [];

//現在地を取得するための設定を関数でまとめる
function PositionCheck() {
	//headerの高さを取得
	var headerH = jQuery(".js-header").outerHeight(true);
	//.scroll-pointというクラス名がついたエリアの位置を取得する設定
	jQuery(".js-section-scroll").each(function (i) {//.scroll-pointクラスがついたエリアからトップまでの距離を計算して設定
		elemTop[i] = Math.round(parseInt(jQuery(this).offset().top - headerH));//追従するheader分の高さを引き小数点を四捨五入
	});
}

//ナビゲーションに現在地のクラスをつけるための設定
function ScrollAnime() {//スクロールした際のナビゲーションの関数にまとめる
	var scroll = Math.round(jQuery(window).scrollTop());
	var NavElem = jQuery(".js-nav-menu li");//ナビゲーションのliの何番目かを定義するための準備
	jQuery(".js-nav-menu li").removeClass('is-current');//全てのナビゲーションの現在地クラスを除去
	jQuery(".js-nav-menu li").removeClass('is-current');
	for (let i = 0; i < elemTop.length; i++) {
		if (scroll >= elemTop[i] && (i === elemTop.length - 1 || scroll < elemTop[i + 1])) {
			jQuery(NavElem[i]).addClass('is-current');
			break;
		}
	}
}

//ナビゲーションをクリックした際のアニメーション
jQuery('.js-nav-menu a').click(function () {
	var headerH = jQuery(".js-header").outerHeight(true);
	var elmHash = jQuery(this).attr('href'); //hrefの内容を取得
	var pos = Math.round(jQuery(elmHash).offset().top - headerH);  //headerの高さを引き小数点を四捨五入
	jQuery('body,html').animate({ scrollTop: pos }, 500);//取得した位置にスクロール※数値が大きいほどゆっくりスクロール

	jQuery('#js-menu-trigger').removeClass('is-active');
	jQuery('.js-drawer').removeClass('is-active');

	return false;//リンクの無効化
});

// 画面をスクロールをしたら動かしたい場合の記述
jQuery(window).scroll(function () {
	PositionCheck();/* 現在地を取得する関数を呼ぶ*/
	ScrollAnime();/* ナビゲーションに現在地のクラスをつけるための関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
jQuery(window).on('load', function () {
	PositionCheck();/* 現在地を取得する関数を呼ぶ*/
	ScrollAnime();/* ナビゲーションに現在地のクラスをつけるための関数を呼ぶ*/
});

jQuery(window).resize(function () {
	//リサイズされたときの処理
	PositionCheck()
});


//*----------------------------------------------------------*/
/*  ハンバーガーメニューをクリックでクラス名activeをつけ外し
/*----------------------------------------------------------*/

jQuery("#js-menu-trigger").click(function () {
	jQuery(this).toggleClass('is-active');
	jQuery(".js-drawer").toggleClass('is-active');
});


//*----------------------------------------------------------*/
/*  Slick JS
/*----------------------------------------------------------*/

jQuery('.slick-slider').slick({
	autoplay: true,
	dots: true,
	arrows: false,
	slidesToShow: 3,
	pauseOnFocus: false, //フォーカスで一時停止
	pauseOnHover: false, //マウスホバーで一時停止
	pauseOnDotsHover: false, //ドットナビをマウスホバーで一時停止
	responsive: [{
		breakpoint: 1920,
		settings: {
			slidesToShow: 3,
		},
	},
	{
		breakpoint: 1400,
		settings: {
			slidesToShow: 2,
		},
	},
	{
		breakpoint: 480,
		settings: {
			slidesToShow: 1,
		},
	},
	],
});
