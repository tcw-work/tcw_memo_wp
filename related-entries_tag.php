<?php
// タグ情報から関連記事を2件ランダムに呼び出す
$tags_related = get_the_tags($post->ID);

// タグが存在する場合だけ処理を実行
if ($tags_related) {
    $tag_ID = array();
    foreach ($tags_related as $tag) {
        array_push($tag_ID, $tag->term_id);
    }

    $args_related = array(
        'post__not_in' => array($post->ID),
        'posts_per_page' => 3,
        'tag__in' => $tag_ID,
        'orderby' => 'rand',
    );
    $query_related = new WP_Query($args_related);
    ?>
<?php if ($query_related->have_posts()): ?>
<div class="article_scroll">
    <div class="article_scroll_in">
        <?php while ($query_related->have_posts()): $query_related->the_post(); ?>
        <article class="card_02">
            <div class="small_card">
                <a class="card_link" href="javascript:void(0);">
                    <div class="small_card_left">
                        <object><a href="javascript:void(0);">
                                <?php if (has_post_thumbnail()): // サムネイルを持っているとき ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'thumb100'); //サムネイルを呼び出す?>
                                <?php else: // サムネイルを持っていないとき ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png"
                                    alt="NO IMAGE" title="NO IMAGE" width="100px" />
                                <?php endif; ?>
                            </a></object>
                    </div>
                    <div class="small_card_right">
                        <div class="top">
                            <ul>
                                <li class="date">
                                    <?php the_time('Y-m-d'); ?>
                                </li>
                                <!-- タグ-->
                                <?php
                                            $posttags_related = get_the_tags();
                                            if ($posttags_related) {
                                                foreach ($posttags_related as $tag_related) {
                                                    echo '<li class="tag"><object><a href="' . get_tag_link($tag_related->term_id) . '">#' . $tag_related->name . '</a></object></li>';
                                                }
                                            }
                                            ?>
                            </ul>
                        </div>
                        <div class="bottom">
                            <p>
                                <object>
                                    <a
                                        href="<?php the_permalink(); ?>"><?php echo mb_substr($post->post_title, 0, 34) . '…'; //記事のタイトル?></a>
                                </object>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
</div>
<?php endif;
    wp_reset_postdata();
} else {
    // タグが存在しない場合の処理
    // 何かしらのメッセージを表示するか、処理をスキップするなど、適切な処理を行う
}
?>