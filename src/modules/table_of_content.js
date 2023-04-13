$(function () {
	/* -------------------------------------------------------
    記事の見出しから目次作成
  --------------------------------------------------------*/
	function makeMokuji() {

		var idcount = 1; // IDのカウント
		var mokuji = ''; // 目次のHTML格納場所
		var currentlevel = 0 // 見出しのレベル初期値

		// 見出しを回してリストに格納
		$('.article_content h2, .article_content h3, .article_content h4, .article_content h5, .article_content h6').each(function (i) {
			// 見出しごとにIDを保存
			this.id = 'autoid_' + idcount;
			//			this.class = 's_h_' + idcount;
			idcount++;

			// 見出しのレベル設定
			var level = 0;
			if (this.nodeName.toLowerCase() == 'h2') {
				level = 1;
				mokuji += '<li class="s_h2 ' + '' + this.id + '"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';
			} else if (this.nodeName.toLowerCase() == 'h3') {
				level = 2;
				mokuji += '<li class="s_h3 ' + '' + this.id + '"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';
			} else if (this.nodeName.toLowerCase() == 'h4') {
				level = 3;
				mokuji += '<li class="s_h4 ' + '' + this.id + '"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';
			} else if (this.nodeName.toLowerCase() == 'h5') {
				level = 4;
				mokuji += '<li class="s_h5 ' + '' + this.id + '"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';
			} else if (this.nodeName.toLowerCase() == 'h6') {
				level = 5;
				mokuji += '<li class="s_h6 ' + '' + this.id + '"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';
			}

			// 見出しのレベルが現在のレベルよりも数値が大きければ
			// <ol>を追加して入れ子にする
			//			while(currentlevel < level) {
			//				mokuji += '<ol class="chapter">';
			//				currentlevel ++;
			//			}
			//
			//			// そうでなければ</ol>で閉じて入れ子を終了する
			//			while(currentlevel > level) {
			//				mokuji += '</ol>';
			//				currentlevel --;
			//			}

			// リストを生成
			//			mokuji += '<li class="' + this.id + '"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';

			//			mokuji += '<li class="s_h2 ' + '' + this.id +'"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';

			//			if(currentlevel = 1) {
			//				var s_h2 = 's_h2';
			//				$('.box_cont li').addClass(s_h2);
			////				mokuji += '<li class="' + s_h2 + ' ' + this.id +'"><a href="#' + this.id + '">' + $(this).html() + '</a></li>\n';
			//			}

		});



		//		while(currentlevel > 0) {
		//			mokuji += '</ol>';
		//			currentlevel --;
		//		}

		// HTML出力

		strMokuji = mokuji +
			'</div>';

		$('.mokuji').html(strMokuji);




		/* -------------------------------------------------------
      クリックした目次にクラス追加
    --------------------------------------------------------*/
		// $('.mokuji li:first-child  a').addClass('s_heading_active');
		// $('.mokuji li a').click(function () {
		// 	$(".mokuji li a").removeClass('s_heading_active');
		// 	$(this).addClass('s_heading_active');
		// });

		/* -------------------------------------------------------
		見出しサイドバー追従
		--------------------------------------------------------*/
		if (window.matchMedia("(min-width: 768px)").matches) {
			var height_top = $('.heading').offset().top;
			var height_bottom = $('.related_block').offset().top;
			$(window).on("scroll", function () {
				if ($(this).scrollTop() > height_top) {
					$(".heading").addClass('fixed');
				} else {
					$(".heading").removeClass('fixed');
				}
				if ($(this).scrollTop() > height_bottom) {
					$(".heading").removeClass('fixed');
				} else {
					// $(".heading").addClass('fixed');
				}
			});
		}
		/* -------------------------------------------------------
		見出しを通過したらサイドバーactive更新
		--------------------------------------------------------*/

		// var heading_top_1 = $('#autoid_1').offset().top;
		// var heading_top_2 = $('#autoid_2').offset().top;
		// var heading_top_3 = $('#autoid_3').offset().top;
		// $(window).on("scroll", function () {
		// 	if ($(this).scrollTop() > heading_top_1) {
		// 		$(".autoid_1 a").addClass('s_heading_active');
		// 		$(".autoid_2 a").removeClass('s_heading_active');
		// 		$(".autoid_3 a").removeClass('s_heading_active');
		// 	}
		// 	if ($(this).scrollTop() > heading_top_2) {
		// 		$(".autoid_2 a").addClass('s_heading_active');
		// 		$(".autoid_1 a").removeClass('s_heading_active');
		// 		$(".autoid_3 a").removeClass('s_heading_active');
		// 	}
		// 	if ($(this).scrollTop() > heading_top_3) {
		// 		$(".autoid_3 a").addClass('s_heading_active');
		// 		$(".autoid_1 a").removeClass('s_heading_active');
		// 		$(".autoid_2 a").removeClass('s_heading_active');
		// 	}
		// });

		// ↓chat gptより
		// const heading_tops = [　// 変数「heading_top_1,2,3」を配列「heading_tops」にまとめる
		// 	$('#autoid_1').offset().top,
		// 	$('#autoid_2').offset().top,
		// 	$('#autoid_3').offset().top,
		// 	$('#autoid_4').offset().top,
		// 	$('#autoid_5').offset().top,
		// ];

		// $('[id^="autoid_"]') を使用して、idが"autoid_"で始まるすべての要素を選択しています。map() メソッドを使用して、各要素の offset().top を取得し、新しい配列 heading_tops を作成
		const elements = $('[id^="autoid_"]'); // 要素の選択
		const heading_tops = $.map(elements, function (element) { // ループして offset().top を取得して新しい配列に格納
			return $(element).offset().top;
		});
		$(window).on("scroll", function () {
			const scrollTop = $(this).scrollTop();
			let activeIndex = 0;
			for (let i = 0; i < heading_tops.length; i++) { // 「if」文の条件分岐をループ処理に変更
				if (scrollTop > heading_tops[i]) {
					activeIndex = i;
				}
			}
			$('.s_heading_active').removeClass('s_heading_active'); //アクティブな見出しのクラス名を切り替える際に、共通のクラス名「s_heading_active」を使用するよう
			$(`.autoid_${activeIndex + 1} a`).addClass('s_heading_active'); // アクティブな見出しのインデックスを変数「activeIndex」で管理するように変更しました。
		});

	}
	makeMokuji();
});


// SPナビゲーションの目次表示
// $(".n_btn").click(function () {
// 	$(".heading").addClass("fixed");
// });
// $(".heading").click(function () {
//     if ($(".sp_nav_torigger").hasClass("fixed")) {
// 		$(".heading").addClass("fixed");
//     } else {
//     }
// });