<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_home() || is_front_page()) { ?>
    <title>TCW 技術ブログ</title>
    <meta name="description" content="[仕事募集中]web制作に関する技術ブログです。">
    <?php } ?>

    <!-- ここからOGPの設定 -->
    <?php
        // タイトルの取得
        $ogp_title = get_the_title();
        if (is_home() || is_front_page()) {
            $ogp_title = get_bloginfo('name');
        }

        // 共通のOGP画像URL
        $ogp_image = get_template_directory_uri() . '/src/img/common/ogp.jpg';

        // ページが投稿または固定ページの場合、アイキャッチ画像を取得
        // if (is_singular() && has_post_thumbnail()) {
        //     $thumbnail_id = get_post_thumbnail_id();
        //     $ogp_image = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
        // }
    ?>
    <!-- OGPの基本設定 -->
    <!-- Facebook用の設定 -->
    <!-- <meta property="fb:app_id" content="Your-Facebook-App-ID"> -->
    <!-- Twitter用の設定 -->
    <meta name="twitter:card" content="summary_large_image">
    <!-- <meta name="twitter:site" content="@YourTwitterHandle"> -->

    <meta property="og:title" content="<?php echo esc_attr($ogp_title); ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo esc_url($ogp_image); ?>">
    <meta property="og:site_name" content="TCW 技術ブログ">
    <meta property="og:locale" content="ja_JP">
    <?php if (is_home() || is_front_page()) { ?>
    <meta property="og:description" content="web制作に関する技術ブログです。">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <?php } else { ?>
    <meta property="og:description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <?php } ?>

    <!-- ここまでOGPの設定 -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;700&amp;display=swap"
        rel="stylesheet">
    <!--    favicon-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/src/img/common/favicon.gif"
        type="image/gif">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/src/img/common/favicon.gif" type="image/gif">
    <!--    スマホ用アイコン画像-->
    <link rel="apple-touch-icon-precomposed"
        href="<?php echo get_template_directory_uri(); ?>/src/img/common/touch-icon.png">
    <!--    電話番号やメールアドレスの変換設定防止タグ-->
    <meta name="format-detection" content="email=no,telephone=no,address=no">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6B8SHB1V7D"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-6B8SHB1V7D');
    </script>

    <?php wp_head() ?>
    <?php wp_meta() ?>
</head>



<?php if (is_single() or is_page()) { // シングルページの場合 
?>

<body class="top article">
    <?php } else { // シングルページ以外の場合 
    ?>

    <body class="top">
        <?php } ?>
        <header>
            <div class="header_in">
                <nav>
                    <div class="nav_in">
                        <?php if (is_single() or is_page()) { // シングルページの場合 
                        ?>
                        <div class="head_wrapping">
                            <a href="<?php bloginfo('url'); ?>" class="h_ttl">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="131.351" height="42.321" viewBox="0 0 131.351 42.321">
                                    <defs>
                                        <lineargradient id="linear-gradient" x1="0.016" y1="0.559" x2="1" y2="0.535"
                                            gradientUnits="objectBoundingBox">
                                            <stop offset="0" stop-color="#048e67"></stop>
                                            <stop offset="1" stop-color="#fff"></stop>
                                        </lineargradient>
                                    </defs>
                                    <path id="tcw" data-name="tcw"
                                        d="M-701.879,1937.188q-5.442-5.634-5.441-15.723,0-9.9,5.509-15.682a18.105,18.105,0,0,1,9.693-5.283H-681.5a32.384,32.384,0,0,1,8.689,2.973v8.449h-.958q-6.426-5.469-12.168-5.468a10.624,10.624,0,0,0-8.695,3.923q-3.2,3.924-3.2,11.116,0,7.136,3.254,11.005a10.784,10.784,0,0,0,8.695,3.869,15.919,15.919,0,0,0,5.551-1,23.278,23.278,0,0,0,6.644-4.443h.876v8.313a39.864,39.864,0,0,1-8.258,2.98,30.606,30.606,0,0,1-5.906.6Q-696.437,1942.821-701.879,1937.188Zm68.742,4.812-8.559-30.6-8.339,30.6h-8.4l-11.7-41.207h9.406l7.028,28.164,7.738-28.164h9l7.547,28.246,7.219-28.246h9.05L-624.769,1942ZM-731,1942v-34.371h-13.5v-6.836h36.058v6.836h-13.535V1942Z"
                                        transform="translate(744.5 -1900.5)" fill="url(#linear-gradient)"></path>
                                </svg>
                                <p class="ver">Ver.2</p>
                            </a>
                            <div class="sp_nav_torigger">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                        <?php } else { // シングルページ以外の場合 
                        ?>
                        <h1 class="head_wrapping"><a href="<?php bloginfo('url'); ?>" class="h_ttl">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="131.351" height="42.321" viewBox="0 0 131.351 42.321">
                                    <defs>
                                        <lineargradient id="linear-gradient" x1="0.016" y1="0.559" x2="1" y2="0.535"
                                            gradientUnits="objectBoundingBox">
                                            <stop offset="0" stop-color="#048e67"></stop>
                                            <stop offset="1" stop-color="#fff"></stop>
                                        </lineargradient>
                                    </defs>
                                    <path id="tcw" data-name="tcw"
                                        d="M-701.879,1937.188q-5.442-5.634-5.441-15.723,0-9.9,5.509-15.682a18.105,18.105,0,0,1,9.693-5.283H-681.5a32.384,32.384,0,0,1,8.689,2.973v8.449h-.958q-6.426-5.469-12.168-5.468a10.624,10.624,0,0,0-8.695,3.923q-3.2,3.924-3.2,11.116,0,7.136,3.254,11.005a10.784,10.784,0,0,0,8.695,3.869,15.919,15.919,0,0,0,5.551-1,23.278,23.278,0,0,0,6.644-4.443h.876v8.313a39.864,39.864,0,0,1-8.258,2.98,30.606,30.606,0,0,1-5.906.6Q-696.437,1942.821-701.879,1937.188Zm68.742,4.812-8.559-30.6-8.339,30.6h-8.4l-11.7-41.207h9.406l7.028,28.164,7.738-28.164h9l7.547,28.246,7.219-28.246h9.05L-624.769,1942ZM-731,1942v-34.371h-13.5v-6.836h36.058v6.836h-13.535V1942Z"
                                        transform="translate(744.5 -1900.5)" fill="url(#linear-gradient)"></path>
                                </svg>
                                <p class="ver">Ver.2</p>
                            </a>
                            <div class="sp_nav_torigger">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </h1>
                        <?php } ?>

                        <div class="h_nav">
                            <ul>
                                <li><a href="<?php echo esc_url(get_term_link('html-css', 'category')); ?>">HTML・CSS</a>
                                </li>
                                <li><a
                                        href="<?php echo esc_url(get_term_link('javascript', 'category')); ?>">JavaScript</a>
                                </li>
                                <li><a href="<?php echo esc_url(get_term_link('git', 'category')); ?>">Git</a></li>
                                <li><a href="<?php echo esc_url(get_term_link('php', 'category')); ?>">PHP</a></li>
                                <li class="nav_cat"><a href="javascript:void(0)">Categories</a></li>
                                <li class="nav_tag"><a href="javascript:void(0)">Tag</a></li>
                                <li class="nav_window"><img
                                        src="<?php echo get_template_directory_uri(); ?>/src/img/common/search.png"
                                        alt="">
                                </li>
                                <li>
                                    <div class="h_nav_hov h_nav_window is_sp">
                                        <?php get_search_form(); ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="h_nav_inside">
                        <div class="h_nav_hov h_nav_tag">
                            <!--Keyword.tag-->
                            <?php
                            // パラメータを指定
                            $args = array(
                                // タグ名順で指定
                                'orderby' => 'name',
                                // 昇順で指定
                                'order' => 'ASC'
                            );
                            $posttags = get_tags($args);

                            if ($posttags) {
                                shuffle($posttags);
                                echo ' <ul class="tag-list"> ';
                                foreach ($posttags as $tag) {
                                    echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                                }
                                echo ' </ul> ';
                            }
                            ?>
                        </div>
                        <div class="h_nav_hov h_nav_cat">
                            <!--Category-->
                            <?php
                            // パラメータを指定  条件の設定
                            $args = array(
                                // カテゴリー内の記事数順で指定
                                'orderby' => 'count',
                                // 降順で指定
                                'order' => 'DSC'
                            );
                            $categories = get_categories($args);

                            echo ' <ul class="cat-list"> ';
                            foreach ($categories as $category) {
                                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> </li> ';
                            }
                            echo ' </ul> ';
                            ?>
                        </div>
                        <div class="h_nav_hov h_nav_window is_pc">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>