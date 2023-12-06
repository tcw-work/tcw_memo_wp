<?php
// 投稿一覧にカスタムIDのカラムを追加する
function add_custom_id_column($columns) {
    $columns['custom_id'] = 'カスタムID';
    return $columns;
}
add_filter('manage_posts_columns', 'add_custom_id_column');

// カスタムIDのカラムに値を表示する
function show_custom_id_column_content($column, $post_id) {
    if ($column == 'custom_id') {
        $custom_id = get_post_meta($post_id, 'カスタムid', true); // フィールド名に基づいて変更
        echo $custom_id;
    }
}
add_action('manage_posts_custom_column', 'show_custom_id_column_content', 10, 2);//優先度10で二つに引数（$column, $post_id）を実行


//カスタムIDフィールドを一番左に移動
function add_custom_id_column_before_title($columns) {
    $new_columns = array();
    foreach($columns as $key => $title) {
        if ($key == 'title') { // タイトルカラムの前に挿入
            $new_columns['custom_id'] = 'カスタムID';
        }
        $new_columns[$key] = $title;
    }
    return $new_columns;
}
add_filter('manage_posts_columns', 'add_custom_id_column_before_title');


//ソート可能なカラムを定義
function make_custom_id_column_sortable($columns) {
    $columns['custom_id'] = 'custom_id';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'make_custom_id_column_sortable');


// ソートクエリのカスタマイズ
function custom_id_column_orderby($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') == 'custom_id') {
        $query->set('meta_key', 'カスタムid'); // 実際のメタキーに合わせて変更
        $query->set('orderby', 'meta_value_num'); // 数値としてソート
    }
}
add_action('pre_get_posts', 'custom_id_column_orderby');