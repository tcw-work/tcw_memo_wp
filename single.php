<?php get_header(); ?>
<main>
    <div class="main_content m_c_article">
        <section class="article_block">
            <div class="article_heading">
                <div class="article_heading_in">
                    <div class="article_img">
                        <?php
                        // アイキャッチ画像が設定されているかチェック
                        if (has_post_thumbnail()) {
                            // アイキャッチ画像を表示する
                            the_post_thumbnail();
                        } else {
                            // 代替画像を表示する
                            echo '<img src="<?php echo get_template_directory_uri(); ?>/src/img/common/a_icon_psd.png"
                        alt="No Image">';
                        }
                        ?>

                    </div>
                    <div class="article_inf">
                        <h1 class="article_ttl">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>
                <div class="article_detail">
                    <div class="date">
                        <?php the_time('Y.m.d'); ?>
                    </div>
                    <div class="cat">
                        <ul>
                            <?php
                            $category = get_the_category();
                            if (!empty($category)) { ?>
                            <?php
                                if (isset($category[0])) {
                                    echo '<li><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a><li>';
                                } else {
                                    echo '';
                                }
                                ?>
                            <?php } ?>
                            <?php
                            if (isset($category[1])) {
                                echo '<li><a href="' . get_category_link($category[1]->term_id) . '">' . $category[1]->name . '</a><li>';
                            } else {
                                echo '';
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="tag">
                        <ul>
                            <?php
                            $posttags = get_the_tags();
                            if ($posttags) {
                                foreach ($posttags as $tag) {
                                    echo '<li><a href="' . get_tag_link($tag->term_id) . '">#' . $tag->name . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div class="article_content">
            <?php the_content(); ?>
        </div>
        <section class="new_block related_block">
            <h2>関連記事</h2>
            <?php include(TEMPLATEPATH . '/related-entries.php'); ?>



            <!-- <div class="article_scroll">
                <div class="article_scroll_in"> -->
            <?php include(TEMPLATEPATH . '/related-entries_tag.php'); ?>
            <!-- <article class="card_02">
                        <div class="small_card">
                            <a class="card_link" href="javascript:void(0);">
                                <div class="small_card_left">
                                    <object><a href="javascript:void(0);">
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/common/a_icon_psd.png"
                                                alt="">
                                        </a>
                                    </object>
                                </div>
                                <div class="small_card_right">
                                    <div class="top">
                                        <ul>
                                            <li class="date">2022/12/31</li>
                                            <li class="l_cat">
                                                <object><a href="javascript:void(0);">Cat</a></object>
                                            </li>
                                            <li class="s_cat">
                                                <object><a href="javascript:void(0);">Cat02</a></object>
                                            </li>
                                            <li class="tag">
                                                <object><a href="javascript:void(0);">Tag</a></object>
                                            </li>
                                            <li class="tag">
                                                <object><a href="javascript:void(0);">Tag02</a></object>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        <p>
                                            <object><a href="javascript:void(0);">【準備中】しばらくお待ちください</a></object>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                    <article class="card_02">
                        <div class="small_card">
                            <a class="card_link" href="javascript:void(0);">
                                <div class="small_card_left">
                                    <object><a href="javascript:void(0);">
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/common/a_icon_js.png"
                                                alt="">
                                        </a>
                                    </object>
                                </div>
                                <div class="small_card_right">
                                    <div class="top">
                                        <ul>
                                            <li class="date">2022/12/31</li>
                                            <li class="l_cat">
                                                <object><a href="javascript:void(0);">Cat</a></object>
                                            </li>
                                            <li class="s_cat">
                                                <object><a href="javascript:void(0);">Cat02</a></object>
                                            </li>
                                            <li class="tag">
                                                <object><a href="javascript:void(0);">Tag</a></object>
                                            </li>
                                            <li class="tag">
                                                <object><a href="javascript:void(0);">Tag02</a></object>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        <p>
                                            <object><a href="javascript:void(0);">【準備中】しばらくお待ちください</a></object>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                    <article class="card_02">
                        <div class="small_card">
                            <a class="card_link" href="javascript:void(0);">
                                <div class="small_card_left">
                                    <object><a href="javascript:void(0);">
                                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/common/a_icon_html.png"
                                                alt="">
                                        </a>
                                    </object>
                                </div>
                                <div class="small_card_right">
                                    <div class="top">
                                        <ul>
                                            <li class="date">2022/12/31</li>
                                            <li class="l_cat">
                                                <object><a href="javascript:void(0);">Cat</a></object>
                                            </li>
                                            <li class="s_cat">
                                                <object><a href="javascript:void(0);">Cat02</a></object>
                                            </li>
                                            <li class="tag">
                                                <object><a href="javascript:void(0);">Tag</a></object>
                                            </li>
                                            <li class="tag">
                                                <object><a href="javascript:void(0);">Tag02</a></object>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        <p>
                                            <object><a href="javascript:void(0);">【準備中】しばらくお待ちください</a></object>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article> -->
            <!-- </div>
            </div> -->
        </section>
    </div>
    <?php get_sidebar(); ?>
</main>
<section class="card_01">
    <div class="large_card">
        <h2>PIC UP</h2>
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
<?php get_footer(); ?>