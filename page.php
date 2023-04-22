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
                </div>
            </div>
        </section>

        <div class="article_content">
            <?php the_content(); ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
</main>
<section class="card_01">
    <div class="large_card">
        <h2>PIC UP</h2>
        <ul>
            <li><a href="#">
                    <dl>
                        <dt class="c-v_a_ttl">HTML・CSS</dt>
                        <dd class="c-v_a_des">Bracketsエディターを使ってSCSSをCMD経由でコンパイルする方法を解説。</dd>
                    </dl>
                </a></li>
            <li><a href="#">
                    <dl>
                        <dt class="c-v_a_ttl">DESIGN</dt>
                        <dd class="c-v_a_des">Bracketsエディターを使ってSCSSをCMD経由でコンパイルする方法を解説。Rubyをインストールすれば後は簡単！</dd>
                    </dl>
                </a></li>
            <li><a href="#">
                    <dl>
                        <dt class="c-v_a_ttl">Word Press</dt>
                        <dd class="c-v_a_des">Bracketsエディターを使ってSCSSをCMD経由でコンパイルする方法を解説。</dd>
                    </dl>
                </a></li>
            <li><a href="#">
                    <dl>
                        <dt class="c-v_a_ttl">New Article</dt>
                        <dd class="c-v_a_des">Bracketsエディターを使ってSCSSをCMD経由でコンパイルする方法を解説。</dd>
                    </dl>
                </a></li>
        </ul>
    </div>
</section>
<?php get_footer(); ?>











<!--
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>sample</title>
    </head>

    <body>

        <h2>問合せ内容</h2>    

        <form action="mailto.php" method="post">

            <table border="1">
                <tr>
                    <td>名前</td>
                    <td><?php echo $_POST["name"]; ?></td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td><?php echo $_POST["mail"]; ?></td>
                </tr>
                <tr>
                    <td>問い合わせ内容</td>
                    <td><?php echo $_POST["inquiry"]; ?></td>
                </tr>
            </table>

            <input type="submit" value="送信" />
        </form>

    </body>

</html>-->