$(function(){



	// 横幅取得
	var w = $(window).width();


	//クリックしたときのファンクションをまとめて指定
	$('.tab li').click(function() {

		//.index()を使いクリックされたタブが何番目かを調べ、
		//indexという変数に代入します。
		var index = $('.tab li').index(this);

		//コンテンツを一度すべて非表示にし、
		$('.content .box').css('display','none');

		//クリックされたタブと同じ順番のコンテンツを表示します。
		$('.content .box').eq(index).css('display','block');

		//一度タブについているクラスselectを消し、
		$('.tab li').removeClass('select');

		//クリックされたタブのみにクラスselectをつけます。
		$(this).addClass('select')
	});

	/*=======================================
	スムーズスクロール
	=========================================*/
	$('a[href^="#"]').click(function(){
		$('html,body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 500, 'swing');
		return false;
	});

	var gotop = $('.l-pagetop');
	gotop.hide();
	$(window).scroll(function(){
		if ($(window).scrollTop() > 500) gotop.fadeIn();
		else gotop.fadeOut();
	});

	var separate;
	if(w>640){ separate = 30; }
	else { separate = 10; }

	$(window).on('scroll', function(){
		scrollHeight = $(document).height();
		scrollPosition = $(window).height() + $(window).scrollTop();
		footHeight = $('.l-footer').innerHeight();
		//console.log(footHeight);
		if (scrollHeight - scrollPosition <= footHeight) gotop.css({'position':'absolute','bottom':footHeight + separate});
		else gotop.css({'position':'fixed','bottom':separate+'px'});
	});

	$(".is-accordion .is-body").hide();
	$(".is-accordion .is-head.is-open +.is-body").show();
	$(".is-accordion .is-head").click(function(e){
		$(this).toggleClass("is-open");
		$("+.is-body",this).slideToggle(400);
	});


	$("#sp-menu").hide();
	$(".openSlide").click(function() {
		$('#sp-menu').slideToggle(400);
		$('.menu-trigger').toggleClass("active");
	});
	$(".c-sp-menu span").click(function(e){
		$(this).toggleClass("is-open");
		$("+ul",this).slideToggle();
	});
});




$(window).on('load', function(){// ロード完了時に処理


	// 横幅取得
	var w = $(window).width();


	if(w>640){// PCでの処理



	} else {// SPでの処理



	}




});




$(window).on('load resize', function(){// ロード完了、リサイズ時に処理


	// 横幅取得
	var w = $(window).width();


	if(w>640){// PCでの処理



	} else {// SPでの処理



	}

});
