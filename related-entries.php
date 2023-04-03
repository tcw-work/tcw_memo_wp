<?php
//カテゴリ情報から関連記事を10個ランダムに呼び出す
$categories = get_the_category($post->ID);
$category_ID = array();
foreach ($categories as $category):
    array_push($category_ID, $category->cat_ID);
endforeach;
$args = array(
    'post__not_in' => array($post->ID),
    'posts_per_page' => 2,
    'category__in' => $category_ID,
    'orderby' => 'rand',
);
$query = new WP_Query($args); ?>
<?php if ($query->have_posts()): ?>
<?php while ($query->have_posts()):
        $query->the_post(); ?>


<article class="card_02">
    <div class="small_card">
        <a class="card_link" href="<?php the_permalink(); ?>">
            <div class="small_card_left">
                <object>
                    <a href="#">
                        <?php if (has_post_thumbnail()): // サムネイルを持っているとき ?>
                        <?php echo get_the_post_thumbnail($post->ID, 'thumb100'); //サムネイルを呼び出す?>
                        <?php else: // サムネイルを持っていないとき ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE"
                            title="NO IMAGE" width="100px" />
                        <?php endif; ?>
                    </a>
                </object>
            </div>
            <div class="small_card_right">
                <div class="top">
                    <ul>
                        <li class="date">
                            <?php the_time('Y-m-d'); ?>
                        </li>
                        <!-- 親カテゴリー-->
                        <?php
                                $category = get_the_category();
                                if (!empty($category)) { ?>
                        <?php
                                    if (isset($category[0])) {
                                        echo '<li class="l_cat"><object><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></object><li>';
                                    }
                                    ?>
                        <?php } ?>
                        <!-- 子カテゴリー-->
                        <?php
                                if (isset($category[1])) {
                                    echo '<li class="s_cat"><object><a href="' . get_category_link($category[1]->term_id) . '">' . $category[1]->name . '</a></object><li>';
                                }
                                ?>
                        <!-- タグ-->
                        <?php
                                $posttags = get_the_tags();
                                if ($posttags) {
                                    foreach ($posttags as $tag) {
                                        echo '<li class="tag"><object><a href="' . get_tag_link($tag->term_id) . '">#' . $tag->name . '</a></object></li>';
                                    }
                                }
                                ?>
                    </ul>
                </div>
                <div class="bottom">
                    <p>
                        <object>
                            <a
                                href="<?php the_permalink(); ?>"><?php echo mb_substr($post->post_title, 0, 60) . '…'; //記事のタイトル?></a>
                        </object>
                    </p>
                </div>
            </div>
        </a>
    </div>
</article>
<?php endwhile; ?>


<?php else: ?>
<!-- <p>Not found</p> -->

<?php
endif;
wp_reset_postdata();
?>