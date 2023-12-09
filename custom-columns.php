<?php
// 投稿一覧にカスタムIDのカラムを追加する
function add_custom_id_column($columns) {
    $columns['custom_id'] = 'カスタムID';// $columnsの中にcustom_id（カスタムID）という値を配列として保管
    return $columns;// WordPressのフックシステムでは、フィルターフックを使用する際に、変更されたデータ（この場合はカラムの配列）を返すことで、その変更をWordPressに伝える必要がある
}
// add_filter 関数は特定のフックに対してカスタム関数を接続し、WordPressの標準的な動作を変更または拡張するために使用
add_filter('manage_posts_columns', 'add_custom_id_column');//'manage_posts_columns' は、WPが管理画面の投稿一覧ページのカラムを生成する際に使用するフィルターフックで、ここに関数（add_custom_id_column）を接続することで、既存のカラムの配列（$columns['']）を代入カスタマイズできる

// カスタムIDのカラムに値を表示する
function show_custom_id_column_content($column, $post_id) {
    if ($column == 'custom_id') {// カラム情報に入っているカスタムIDというカラム（一行）をWP側で用意されている変数に代入。「もし現在処理しているカラムが 'custom_id' であれば」
        $custom_id = get_post_meta($post_id, 'カスタムid', true); // 指定された投稿IDに関連付けられている特定のカスタムフィールド（この場合は 'カスタムid'）の値を取得し、それらを表示するために「manage_posts_custom_column」フックへと渡す。
        // ここでのtrueは指定されたキーに関連するメタデータの最初の値のみが返される（WP仕様のイレギュラーな使い方）
        echo $custom_id;
    }
}
// add_action は、特定のイベントやアクションが発生した際に特定の関数を実行するために使用（データの変更よりも、特定のタイミングで何かを実行することが主な目的）
add_action('manage_posts_custom_column', 'show_custom_id_column_content', 10, 2);//show_custom_id_column_contenで取得した内容を優先度10（普通デフォルト）で実行
// 'manage_posts_custom_column' は、WordPressの投稿一覧ページの各カラムの内容を出力する際に使われるアクションフック
// さらに第四引数に「2」と加えることで、show_custom_id_column_contentで設定した引数 $column（処理中のカラム名）と $post_id（投稿ID）の2つの引数を'manage_posts_custom_column'フックに渡してID表示を処理できる


// カスタムIDフィールドを一番左に移動
function add_custom_id_column_before_title($columns) {
    $new_columns = array();// 新しいカラムの配列を初期化
    foreach($columns as $key => $title) {// $columnsをループ処理。$key はカラムの識別子（例: 'title', 'author', 'date' など）、$title はそのカラムの表示名（例: 'タイトル', '著者', '日付' など）。この$●●（キー） => $●●（値）の箱は任意で設定
        if ($key == 'title') { // もし「title（記事名）」の値が条件がヒットしたら
            $new_columns['custom_id'] = 'カスタムID';// $new_columnsに連想配列として、キー＝'custom_id'、値＝カスタムIDを作成
        }
        $new_columns[$key] = $title;// 新しいカラム（$new_columns）に入っている「カスタムID」の後ろにループで取り出した既存カラムの連想配列を順番に追加（ループ処理なので全部追加）
    }
    return $new_columns;// 変更されたデータを使いまわすために一度返す（WP使用）
}
add_filter('manage_posts_columns', 'add_custom_id_column_before_title');// カラム情報を扱う「manage_posts_columns」フックに対して作成した更新データを扱う関数「add_custom_id_column_before_title」を代入


// ソート可能なカラムを定義（フィルターにソート可能なカラムだと加えるだけ）
function make_custom_id_column_sortable($columns) {
    $columns['custom_id'] = 'custom_id';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'make_custom_id_column_sortable');


// ソートクエリのカスタマイズ
function custom_id_column_orderby($query) {
    if (!is_admin() || !$query->is_main_query()) {// 処理が管理画面に限定される
        return;
    }

    // $query オブジェクトは、WP_Queryクラスのインスタンス。現在のページのクエリを表し、投稿データなどの情報を取得・変更するために使われる
    if ($query->get('orderby') == 'custom_id') {// orderby' パラメータの値を取得（投稿一覧の並び順を制御するために使用）
        // $query->set() を使用して、クエリのパラメータをカスタマイズ
        $query->set('meta_key', 'カスタムid'); //ソートに使用するメタキーを 'カスタムid'（カスタムフィールドの識別子）に設定
        $query->set('orderby', 'meta_value_num'); // 数値としてソート
    }
}
//つまり既存のインスタンス情報の中身を->getで取得し、->setで変更を加えて、pre_get_postsに追加要素として渡す（カスタムid情報を付け加える）ということ
add_action('pre_get_posts', 'custom_id_column_orderby');




//※※※通常の記事投稿ではなく、カスタム投稿タイプ（edit.php?post_type=store のようなURL）の場合は各フックを「add_action(manage_store（カスタムタイプ）_posts_columns...」 のように改造すること