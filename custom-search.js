jQuery(document).ready(function ($) {
    var customSearchBox = '<form id="custom-id-search" action="" method="get"><input type="hidden" name="post_type" value="post"><input type="text" name="custom_id" placeholder="カスタムIDから検索"><input type="submit" value="検索"></form>';

    // '.subsubsub' の隣にカスタム検索ボックスを挿入
    $(customSearchBox).insertAfter('.subsubsub');

    // 'custom-id-search' のスタイルを設定
    $('#custom-id-search').css({
        'display': 'block',
        'width': 'fit-content',
        'float': 'right',
        'margin-left': '20px'
    });
});
