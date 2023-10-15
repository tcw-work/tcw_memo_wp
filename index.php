<?php get_header(); ?>
<section class="card_01">
    <div class="large_card">
        <ul>
            <li><a class="l_c01" href="<?php echo get_template_directory_uri(); ?>/javascript/quick-event/">
                    <dl>
                        <dt class="c-v_a_ttl">JavaScript</dt>
                        <dd class="c-v_a_des">【JS】フォームに値がセットされた瞬間にイベントを発火させる方法</dd>
                    </dl>
                </a></li>
            <li><a class="l_c02" href="<?php echo get_template_directory_uri(); ?>/javascript/pwa-application/">
                    <dl>
                        <dt class="c-v_a_ttl">HTML</dt>
                        <dd class="c-v_a_des">【実践】PWAを使ってサイトをアプリ化する方法</dd>
                    </dl>
                </a></li>
            <li><a class="l_c03" href="<?php echo get_template_directory_uri(); ?>/php/php-login/">
                    <dl>
                        <dt class="c-v_a_ttl">PHP</dt>
                        <dd class="c-v_a_des">【PHP】ログイン機能＋メール送信機能をゼロから自作してみた</dd>
                    </dl>
                </a></li>
            <li><a class="l_c04" href="<?php echo get_template_directory_uri(); ?>/html/tranceform-center/">
                    <dl>
                        <dt class="c-v_a_ttl">CSS</dt>
                        <dd class="c-v_a_des">Positionで指定した要素を中央寄せで固定する方法</dd>
                    </dl>
                </a></li>
        </ul>
    </div>
</section>
<main>
    <div class="main_content">
        <section class="new_block">
            <h2>新着記事</h2>
            <?php if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>
            <article class="card_02">
                <div class="small_card">
                    <a class="card_link" href="<?php the_permalink(); ?>">
                        <div class="small_card_left">
                            <object>
                                <a href="<?php the_permalink(); ?>" itemprop="url">
                                    <?php
                                            // アイキャッチ画像が設定されているかチェック
                                            if (has_post_thumbnail()) {
                                                // アイキャッチ画像を表示する
                                                the_post_thumbnail();
                                            } else { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/common/a_icon_html.png"
                                        alt="">
                                    <?php } ?>
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
                                        <?php the_title(); ?>
                                    </object>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
            <?php endwhile;
            endif; ?>
            <?php
            the_posts_pagination(
                array(
                    'prev_text' => '',
                    'next_text' => '',
                    'mid_size' => 3,
                    'screen_reader_text' => 'posts_pagination',
                )
            );
            ?>
        </section>
    </div>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>