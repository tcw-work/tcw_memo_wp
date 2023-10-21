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

                <div class="article_detail">
                    <div class="social">
                        <ul>
                            <li>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>"
                                    target="_blank" rel="nofollow noopener">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="25px" height="25px">
                                        <image x="0px" y="0px" width="25px" height="25px"
                                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAQAAABu4E3oAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnChURMy7fu58uAAACA0lEQVQ4y32TS0jUURSHPzVTIprIBwVhYZQZ5aJWSSIRBrVRatGqB/QgqIiWgSVBURS2C4TQFtkiWkhtCheFClFGmmFShKk4GT6C8hW++lroODP/mTxnc/+/c777v/eec1KIt9WUUcZ21rOCKQbo4iUvGOQ/lsFFvmCC91NFKBmwjeYk6RH/QHEQKCa8BCAySnkssJWBFLMMucYsMxPS080xRSYoid6hBVOtcdhOe+wyLw7Its2bpop8JWceuTAfKvC3VRbZYWMMkGGTbwxFvqsBVtEdCZ+0x5Vudsbzi8hDv5kb3eIXeXA49hDPfCqec9pCEa85urBa9EtQGyusc8hT4nPfisedcV/wMRqhNV464pj55vrDRw55IvGx+6A/KNb7WixX7yarzwSMBMU19npZrLM1SY2Yhe+JOx30rzvNtM87icgfaEtEapzyvWmWOOPeYDQM9UHghsPu8aP3xFv2Rss4701wLB447ZSlYrGzHhDbvR+PVEI2A1Fhv3MeXVhfd8iQhU5aHgUmKQC4GhF2OO6VmP5t94l4xr5oy9TNt2WIT4ibDPsg7hBFTlvpbgdsMF1kkA3RARtN9baPXW7wZh022+I7d8kch2KHrIKxZUtOZdocZ4OjXMrnJZBw/B8ilkM1P5Okj1PLxmhaSgDLp4IytrCWDKYYoZtXNNAZm/IPHZ8wcWrJefEAAAAASUVORK5CYII=" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="sns__facebook"
                                    href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>"
                                    target="_blank" rel="nofollow noopener">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="25px" height="25px">
                                        <image x="0px" y="0px" width="25px" height="25px"
                                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAMAAADzN3VRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABuVBMVEUIZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8AXv9amf////9Tlf8AXv8IZv8IZv8IZv8IZv8DY/8AYP8AX/8AYf8EZP8BYv8acf87hv9LkP9Ijv82gv8Xb/8HZf8jdv+gxP/o8f/////+/v+hxf8DYv8idv/e6v+uzf8HZv+nyf+10f8CY/8edP/y9//Q4v+Su/+Ktv9hnf8EYv9Ei/+61P8JZf8AXP8AXf8AXv9Xl/9gnf8AW/8AV/9Tlf9Kj/8LaP9Bif9Bh/+Es/9/sP9Hjf9Ijf8leP8GZP8Vbv/t9P9enP/m7//9/v8zgP8Wbv/x9v/v9f8GZf8Qa/+Wvv+kxv/E2//C2f+kxf8FZP8AVv9SlP9amf/AbzEfAAAAR3RSTlMABUaOw9/r59StbCJczvKbIxivXyXWgBfYdQGx/UBZ0gcG00TBkO7F4O3s6NXvH/WUnfkpXc0M3vzKJEP2jV696u3t7dySLQQzC6YAAAABYktHREGJ3mxOAAAAB3RJTUUH5woVETsVpmn8AgAAAVhJREFUKM9t0udTwjAYBvAoioq4FcWJC3HhBPceoaEqKmqd4N6iggou3Hugf7G8TVrx5PmSy/O7Xu9NghBNRKQiKloZExunikd/ok7AUhKTkn/7lFQcGmWaBOkZUmfhCLHyGGsoZGaxfogMj9hGx8btGGsBsnMYcBOTU4IgTM8QjHPzgpLPYHZuXhCzEBRcoEOFRRQcxElBWATBalTMPllaXoF6dW19YxP2JaiUCdkC2N7Z3ePEvR6VMXHtgxwcSgPokYH+hXN7QI7chFjEphxVwGI/PvH6QE69Z+cXl1QqYeH9V4KcaxeVKio3MtzeWamIh8nfP8jy6OehqkYqWJ6eX17foH7/cPo+HVAZkLGGnkDgC8QWIHQcXItQHZvnG8TjYuPUNyBk1IcTBVxDYxgxmcWr0/yTJukpaJv/Skur/ETaTCHS3mEOeVW6zq7unmB6+/oHBmn1A8CToReyYcayAAAAAElFTkSuQmCC" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <div class="article_content">
            <?php the_content(); ?>

            <div class="social_block_bottom">
                <ul>
                    <li>投稿をシェア！→</li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>"
                            target="_blank" rel="nofollow noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="25px" height="25px">
                                <image x="0px" y="0px" width="25px" height="25px"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAQAAABu4E3oAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnChURMy7fu58uAAACA0lEQVQ4y32TS0jUURSHPzVTIprIBwVhYZQZ5aJWSSIRBrVRatGqB/QgqIiWgSVBURS2C4TQFtkiWkhtCheFClFGmmFShKk4GT6C8hW++lroODP/mTxnc/+/c777v/eec1KIt9WUUcZ21rOCKQbo4iUvGOQ/lsFFvmCC91NFKBmwjeYk6RH/QHEQKCa8BCAySnkssJWBFLMMucYsMxPS080xRSYoid6hBVOtcdhOe+wyLw7Its2bpop8JWceuTAfKvC3VRbZYWMMkGGTbwxFvqsBVtEdCZ+0x5Vudsbzi8hDv5kb3eIXeXA49hDPfCqec9pCEa85urBa9EtQGyusc8hT4nPfisedcV/wMRqhNV464pj55vrDRw55IvGx+6A/KNb7WixX7yarzwSMBMU19npZrLM1SY2Yhe+JOx30rzvNtM87icgfaEtEapzyvWmWOOPeYDQM9UHghsPu8aP3xFv2Rss4701wLB447ZSlYrGzHhDbvR+PVEI2A1Fhv3MeXVhfd8iQhU5aHgUmKQC4GhF2OO6VmP5t94l4xr5oy9TNt2WIT4ibDPsg7hBFTlvpbgdsMF1kkA3RARtN9baPXW7wZh022+I7d8kch2KHrIKxZUtOZdocZ4OjXMrnJZBw/B8ilkM1P5Okj1PLxmhaSgDLp4IytrCWDKYYoZtXNNAZm/IPHZ8wcWrJefEAAAAASUVORK5CYII=" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="sns__facebook"
                            href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>"
                            target="_blank" rel="nofollow noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="25px" height="25px">
                                <image x="0px" y="0px" width="25px" height="25px"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAMAAADzN3VRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABuVBMVEUIZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8IZv8AXv9amf////9Tlf8AXv8IZv8IZv8IZv8IZv8DY/8AYP8AX/8AYf8EZP8BYv8acf87hv9LkP9Ijv82gv8Xb/8HZf8jdv+gxP/o8f/////+/v+hxf8DYv8idv/e6v+uzf8HZv+nyf+10f8CY/8edP/y9//Q4v+Su/+Ktv9hnf8EYv9Ei/+61P8JZf8AXP8AXf8AXv9Xl/9gnf8AW/8AV/9Tlf9Kj/8LaP9Bif9Bh/+Es/9/sP9Hjf9Ijf8leP8GZP8Vbv/t9P9enP/m7//9/v8zgP8Wbv/x9v/v9f8GZf8Qa/+Wvv+kxv/E2//C2f+kxf8FZP8AVv9SlP9amf/AbzEfAAAAR3RSTlMABUaOw9/r59StbCJczvKbIxivXyXWgBfYdQGx/UBZ0gcG00TBkO7F4O3s6NXvH/WUnfkpXc0M3vzKJEP2jV696u3t7dySLQQzC6YAAAABYktHREGJ3mxOAAAAB3RJTUUH5woVETsVpmn8AgAAAVhJREFUKM9t0udTwjAYBvAoioq4FcWJC3HhBPceoaEqKmqd4N6iggou3Hugf7G8TVrx5PmSy/O7Xu9NghBNRKQiKloZExunikd/ok7AUhKTkn/7lFQcGmWaBOkZUmfhCLHyGGsoZGaxfogMj9hGx8btGGsBsnMYcBOTU4IgTM8QjHPzgpLPYHZuXhCzEBRcoEOFRRQcxElBWATBalTMPllaXoF6dW19YxP2JaiUCdkC2N7Z3ePEvR6VMXHtgxwcSgPokYH+hXN7QI7chFjEphxVwGI/PvH6QE69Z+cXl1QqYeH9V4KcaxeVKio3MtzeWamIh8nfP8jy6OehqkYqWJ6eX17foH7/cPo+HVAZkLGGnkDgC8QWIHQcXItQHZvnG8TjYuPUNyBk1IcTBVxDYxgxmcWr0/yTJukpaJv/Skur/ETaTCHS3mEOeVW6zq7unmB6+/oHBmn1A8CToReyYcayAAAAAElFTkSuQmCC" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <section class="new_block related_block">
            <h2>関連記事</h2>
            <?php include(TEMPLATEPATH . '/related-entries.php'); ?>
            <?php include(TEMPLATEPATH . '/related-entries_tag.php'); ?>
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