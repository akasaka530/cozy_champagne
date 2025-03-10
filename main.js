$(document).ready(function () {
	// ブラウザの高さ（100vh）を取得
	var viewportHeight = $(window).height();

	console.log(viewportHeight);


	// 対象の要素に高さを適用
	$('.first-view').css('height', viewportHeight + 'px');

	// ウィンドウサイズが変わったときも更新
	// $(window).resize(function () {
	// 	viewportHeight = $(window).height();
	// 	$('#target').css('height', viewportHeight + 'px');
	// });
});
