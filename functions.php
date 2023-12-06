<?php

//    管理画面に対してcssとjsを適用する
function load_custom_wp_admin_style()
{
	wp_register_style('custom_wp_admin_css', get_stylesheet_directory_uri() . '/admin-style.css', false, '1.0.0');
	wp_enqueue_style('custom_wp_admin_css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');







//
//css表示失敗
//function my_scripts()  {
//
//    // 管理画面では読み込まない
//    if ( !is_admin() ) {
//        // スタイルシートディレクトリーを取得する。
//        $dir = get_stylesheet_directory_uri();
//        // スタイルシートも基本同じように使えます。
//        wp_enqueue_style( 'my-css', $dir.'/style.css' );
//    }
//}
//add_action( 'wp_enqueue_scripts', 'my_scripts' );






/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
	add_theme_support('post-thumbnails'); /* アイキャッチ */
	// アイキャッチ画像サイズを指定する（横：640px 縦：384）
	// 画像サイズをオーバーした場合は切り抜き
	set_post_thumbnail_size('100%', '100%', true);
	//    add_image_size( 'rela', 330, 200, true ); //関連記事の時
	add_theme_support('automatic-feed-links'); /* RSSフィード */
	add_theme_support('title-tag'); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array(
			/* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'my_setup');


//* メニューの登録
function my_menu_init()
{
	register_nav_menus(
		array(
			'global' => 'グローバルメニュー',
			'utility' => 'ユーティリティメニュー',
			'drawer' => 'ドロワーメニュー',
		)
	);
}
add_action('init', 'my_menu_init');


//↓これが原因
//wp_nav_menu( array(
//    'theme_location' => 'global',
//) );




/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init()
{
	register_sidebar(
		array(
			'name' => 'サイドバー',
			'id' => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
		)
	);
}
add_action('widgets_init', 'my_widget_init');


function insert_table_of_contents( $the_content ){
	if(is_single()) {  //投稿ページの場合
		$tag = '/^<h[2-6].*?>(.+?)<\ /h[2-6]>$/im'; //見出しタグの検索パターン
    if(preg_match_all($tag, $the_content, $tags)) { //本文中に見出しタグが含まれていれば
    $idpattern = '/id *\= *["\'](.+?)["\']/i'; //見出しタグにidが定義されているか検索するパターン
    $table_of_contents = '<div class="table_of_contents">
        <p class="title">Table of Contents</p>
        <ul>';
            $idnum = 1;
            $nest = 0;

            for($i = 0 ; $i < count($tags[0]) ; $i++){ if( ! preg_match_all($idpattern, $tags[0][$i], $idstr) ){
                //見出しタグにidが定義されていない場合、「autoid_1」のようなidを自動設定 $idstr[1][0]='autoid_' .$idnum++;
                $the_content=preg_replace( "/" .str_replace('/', '\/' ,$tags[0][$i])."/",
                preg_replace('/(^<h[2-6])/i', '${1} id="' . $idstr[1][0] . '" ' , $tags[0][$i]), $the_content,1); }
                //見出しへのリンクを目次に追加。<li>でリスト形式に。
                $table_of_contents .= '<li><a href="#' . $idstr[1][0] . '">' . $tags[1][$i] .'</a>';
                    }

                    $table_of_contents .= '</ul>
    </div>'; //目次の各タグを閉じる

    if($tags[0][0]){
    //作った目次を、1番目の見出しタグの直前に追加
    $the_content = preg_replace('/(^<h[2-6].*?>.+?<\ /h[2-6]>$)/im', $table_of_contents.'${1}', $the_content,1);
            }
            }
            }
            return $the_content;
            }

            // 記事表示時に「insert_table_of_contents()」を実行する
            add_filter('the_content','insert_table_of_contents');

            //ショートコード
            function and_mark()
            {
            return "&amp;";
            }
            add_shortcode('and_mark', 'and_mark');

            // function percente()
            // {
            // return "&#037;";
            // }

            // カスタムカラムファイルをインクルードする
            include_once get_template_directory() . '/custom-columns.php';


            ?>