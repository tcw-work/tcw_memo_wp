<?php
// カスタム検索窓を追加
add_action('admin_head', function() {
    $screen = get_current_screen();
    if ($screen->id != 'edit-post') { // 'post'は投稿タイプに応じて変更
        return;
    }

    ?>
<!-- custom-search.jsに記述 -->
<!-- <form id="custom-id-search" action="" method="get">
    <input type="hidden" name="post_type" value="post">
    <input type="text" name="custom_id" placeholder="カスタムIDから検索">
    <input type="submit" value="検索">
</form> -->
<?php
});

// カスタムID検索クエリの処理
add_action('pre_get_posts', function($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (!empty($_GET['custom_id'])) {
        $query->set('meta_key', 'カスタムid'); // 実際のメタキーに合わせて変更
        $query->set('meta_value', $_GET['custom_id']);
    }
});