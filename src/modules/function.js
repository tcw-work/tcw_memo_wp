export default () => {
    console.log("function")
}

// headerパーツ
// $('.h_nav ul li').mouseover(
//     function() {
//         $(".h_nav_tag,.h_nav_cat").removeClass("h_nav_tag_act").removeClass("h_nav_cat_act");
//     }
// );
$('.nav_tag').mouseover(
    function () {
        $(".h_nav_tag").addClass("h_nav_tag_act");
        $(".h_nav_cat,.h_nav_window").removeClass("h_nav_cat_act").removeClass("h_nav_window_act");
    }
);
$('.nav_cat').mouseover(
    function () {
        $(".h_nav_cat").addClass("h_nav_cat_act");
        $(".h_nav_tag,.h_nav_window").removeClass("h_nav_tag_act").removeClass("h_nav_window_act");
    }
);
$('.nav_window').mouseover(
    function () {
        $(".h_nav_window").addClass("h_nav_window_act");
        $(".h_nav_tag,.h_nav_cat").removeClass("h_nav_tag_act").removeClass("h_nav_cat_act");
    }
);
$('.card_01, main').mouseover(
    function () {
        $(".h_nav_tag,.h_nav_cat,.h_nav_window").removeClass("h_nav_tag_act").removeClass("h_nav_cat_act").removeClass("h_nav_window_act");
    }
);

// サイドバースライドパーツ
$('.category .box_trriger').click(function () {
    $('.category .box_cont').slideToggle(500);
    $('.category .box_trriger span').toggleClass('triangle_act');
    // $('.category .box_trriger span').css('transform','rotate(180deg)').css('display','block');
});
$('.tag .box_trriger').click(function () {
    $('.tag .box_cont').slideToggle(500);
    $('.tag .box_trriger span').toggleClass('triangle_act');
});


// SPのナビゲーション
$(".sp_nav_torigger").click(function () {
    if ($(".sp_nav_torigger").hasClass("sp_nav_torigger_active")) {
        $(".sp_nav_torigger").removeClass("sp_nav_torigger_active");
        $(".h_nav").slideToggle(400);
        // $(".header-wrap").css("position", "static");
        // $(".header-wrap").css("height", "auto");
    } else {
        $(".sp_nav_torigger").addClass("sp_nav_torigger_active");
        // $(".header-wrap").css("height", "100%");
        // $("nav").css("height", "100%");
        $(".h_nav").toggleClass("ac");
        $(".h_nav").slideToggle(400);
        // $(".header-wrap").css("position", "fixed");
    }
});

// スムーススクロール
$(function () {
    $('a[href^="#"]').click(function () {
        var adjust = 1; // 本当は0だが、サイドバー目次のために1に設定
        var speed = 400;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top + adjust;
        $('body,html').animate({
            scrollTop: position
        }, speed, 'swing');
        return false;
    });
});

// 検索窓のinputを画像に変更
$(".search-submit").attr("value", "");
$(".search-submit").attr("type", "image");

// 現在のURLを取得
var currentUrl = window.location.href;
// 本番環境のURLに含まれる部分をチェック
if (currentUrl.includes("http://localhost")) {
    // ローカル環境の場合
    $(".search-submit").attr("src", "http://localhost/wp_tcw/wp-content/themes/tcw_memo/src/img/common/search.png");
$("header .search-submit").attr("src", "http://localhost/wp_tcw/wp-content/themes/tcw_memo/src/img/common/search_black.jpg")
} else {
    // 本番環境の場合
    $(".search-submit").attr("src", "https://t-creative-works.com/wp-content/themes/tcw_memo/src/img/common/search.png");
    $("header .search-submit").attr("src", "https://t-creative-works.com/wp-content/themes/tcw_memo/src/img/common/search_black.jpg");
}
