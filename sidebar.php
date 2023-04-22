<aside>
    <section class="window">
        <div class="box_ttl">
            <?php get_search_form(); ?>
        </div>
    </section>
    <section class="category">
        <div class="box_ttl box_trriger">
            <p>Categoly</p><span></span>
        </div>
        <div class="box_cont">
            <!--Category-->
            <?php
                // パラメータを指定  条件の設定
                $args = array(
                    // カテゴリー内の記事数順で指定
                    'orderby' => 'count',
                    // 降順で指定
                    'order' => 'DSC'
                );
                $categories = get_categories( $args );

                echo ' <ul class="cat-list"> ';
                foreach( $categories as $category ){
                    echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a> </li> ';
                }
                echo ' </ul> ';
                ?>
        </div>
    </section>
    <section class="tag">
        <div class="box_ttl box_trriger">
            <p>Tag</p><span></span>
        </div>
        <div class="box_cont">
            <!--Keyword.tag-->
            <?php
                // パラメータを指定
                $args = array(
                    // タグ名順で指定
                    'orderby' => 'name',
                    // 昇順で指定
                    'order' => 'ASC'
                );
                $posttags = get_tags( $args );

                if ( $posttags ){
                    shuffle( $posttags );
                    echo ' <ul class="tag-list"> ';
                    foreach( $posttags as $tag ) {
                        echo '<li><a href="'. get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li>';
                    }
                    echo ' </ul> ';
                }
                ?>
        </div>
    </section>
    <section class="social">
        <div class="box_ttl box_common">
            <p>Social</p><span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25"
                    height="25" viewBox="0 0 25 25">
                    <image id="icons8-twitter-_丸型_-48" data-name="icons8-twitter-(丸型)-48" width="25" height="25"
                        xlink:href="data:image/png;base64,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">
                    </image>
                </svg></span>
        </div>
        <div class="box_cont"></div>
    </section>
    <section class="contact">
        <div class="box_ttl box_common">
            <p>Contact</p>
        </div>
        <div class="box_cont"><img src="src/img/common/contact.jpg" alt=""></div>
    </section>



    <?php if ( is_single() ) { // シングルページの場合 ?>

    <section class="heading">
        <div class="box_ttl box_common">
            <p>目次</p>
        </div>
        <div class="box_cont">
            <!--ここにサイドバー用目次を代入-->
            <ul class="mokuji"></ul>
            <!--ここにサイドバー用目次を代入-->
        </div>
    </section>
</aside>
<?php } else { // シングルページ以外の場合 ?>

<?php } ?>