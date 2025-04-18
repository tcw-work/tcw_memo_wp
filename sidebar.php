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
            $categories = get_categories($args);

            echo ' <ul class="cat-list"> ';
            foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> </li> ';
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
    </section>
    <section class="social">
        <div class="box_ttl box_common">
            <p>Social</p><span>
                <!-- <a href="" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px"
                        height="25px">
                        <image x="0px" y="0px" width="25px" height="25px"
                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAQAAABu4E3oAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnChURMy7fu58uAAACA0lEQVQ4y32TS0jUURSHPzVTIprIBwVhYZQZ5aJWSSIRBrVRatGqB/QgqIiWgSVBURS2C4TQFtkiWkhtCheFClFGmmFShKk4GT6C8hW++lroODP/mTxnc/+/c777v/eec1KIt9WUUcZ21rOCKQbo4iUvGOQ/lsFFvmCC91NFKBmwjeYk6RH/QHEQKCa8BCAySnkssJWBFLMMucYsMxPS080xRSYoid6hBVOtcdhOe+wyLw7Its2bpop8JWceuTAfKvC3VRbZYWMMkGGTbwxFvqsBVtEdCZ+0x5Vudsbzi8hDv5kb3eIXeXA49hDPfCqec9pCEa85urBa9EtQGyusc8hT4nPfisedcV/wMRqhNV464pj55vrDRw55IvGx+6A/KNb7WixX7yarzwSMBMU19npZrLM1SY2Yhe+JOx30rzvNtM87icgfaEtEapzyvWmWOOPeYDQM9UHghsPu8aP3xFv2Rss4701wLB447ZSlYrGzHhDbvR+PVEI2A1Fhv3MeXVhfd8iQhU5aHgUmKQC4GhF2OO6VmP5t94l4xr5oy9TNt2WIT4ibDPsg7hBFTlvpbgdsMF1kkA3RARtN9baPXW7wZh022+I7d8kch2KHrIKxZUtOZdocZ4OjXMrnJZBw/B8ilkM1P5Okj1PLxmhaSgDLp4IytrCWDKYYoZtXNNAZm/IPHZ8wcWrJefEAAAAASUVORK5CYII=" />
                    </svg>
                </a> -->
                <a href="https://github.com/tcw-work" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25"
                        height="25" viewBox="0 0 96 96">
                        <g id="グループ_245" data-name="グループ 245" transform="translate(-843 -2605)">
                            <circle id="楕円形_4" data-name="楕円形 4" cx="47" cy="47" r="47" transform="translate(844 2607)"
                                fill="#fff" />
                            <g id="グループ_244" data-name="グループ 244" transform="translate(-49)">
                                <image id="github-logo" width="96" height="96" transform="translate(892 2605)"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAAQKAAAECgFCV1GHAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAp1QTFRF////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+jJ5vAAAAN50Uk5TAAECAwQFBgcICQoLDA0ODxAREhMUFRYXGBkaGxwdHh8gISIjJCUmJygpKistLi8xMjM0NTY3ODk7PD0+QEFCQ0RFSElKS0xNTk9QUVJTVFVWV1hZWltcXV5fYGJkZmdoaWprbG1ub3BxcnV2d3h5fX5/gIKDhIWGh4iKi42PkJGSk5SVlpeYmZucnZ6foKKjpKWmp6iqq6ytrq+wsrO0tba3ubq7vL2/wsTFxsfIycrMzs/Q0dLT1dbZ2tvc3d7f4OHi4+Tl5ufp6uvs7e7v8PHy8/T19vf4+fr7/P3+xycM7gAABshJREFUGBnVwY1fVfUdB/CPF43Lw0ih3GlI5JwIpk63pI1NXamElQvIKWKileXD2lQSaj4yFTdb+dw2tcRpw+VMFpVaztDEh/kAcQkRvOfzt0wuwj33nu/v3HO5v9vr1fsNfGd5jdz8J0sXLSp9Mj/X8OLblP1M1eHmTobobD5c9Uw24i5t9ptHrlPp+pE3Z6chbpKL999iRLf2FycjDhJn7W2nS+17ZyVCrzHbWxmV1u1joE/ubj+j5t+dCz3y9vg5IP49eYhd3l4/B8y/Nw+xSa31Myb+2lTEYGoTY9Y0FQOVutWkBubWVAzIlCZq0jQF0UveYlIbc0syojS8gVo1DEdUxnxJzb4cgygU3KB2NwrgWkkn46CzBC6tMBkX5gq4Us24qYYLFYyjCkQ08w7j6M5MRDCpnXHVPgmOsq8wzq5kw8HQM4y7M0Oh5Knnt6DeA5WltDP9jME3bSZtlkJhdAfDFdyHlKI/NXMg/CfXFAyGZybDdYyGyPMhw10chICf7rnDKHW9NRoBQ1oY7kMPJMtosxl9Hqn5hlHoqMlCn120WQZBTgdtfoWgjNXX6FLbH4Yj6Ne06ciBjec4bdqGwCppeRv7dV/7/MThXTWVlTW7Dp/4/Fo3+/lWDYVVahdtjnsQ7iXa/Qdhst7nXTePVj89AmFGPF199CbvOvQwwnxBu5cQxnuZdn+FTfH60lFQGlW6vhg2/6DdZS9CvULBWmixhYJXEMJ7mYLF0GI5BZe9sFpCSTm0qKBkCSwSL1GyDFr8lpJLiQh6maI10OINil5Gv8RmijZDiy0UNSeiTzFlR6HFUcqK0Wc/ZZ3J0CC5k7L9uCftFhUKoUEhFW6lodc8qmyFBlupMg+96qiyCBosokodAtK7qLATWuykQlc6erxAhVPJ0CL5FBVeQI8PKPONhiajfZR9gLsSOiirgjZVlHUkABhH2dfp0Cb9a8rGASinrAoaVVFWDqCGorZ0aJTeRlENgOMU7YZWeyg6DnjaKZoHrcopavdgLEXm96FVJmVjMY+ij6HZaYrmYTVFG6HZNopWYwNFr0GzlRRtwNsULYBmCyl6GwcoKoRmsyg6gGMUTYZm+RQdQyNF46DZOIoa0URRATQroKgJLRQVQbMiilrQTVEZNCujqBs3KXoVmr1K0U2cpagSmlVSdBYfUbQJmm2i6CPUUXQEmh2hqA47KGodBK0GtVC0AxspGwutcinbiJWULYBW5ZStxIuU/RlabaPsRZRQdhpafUpZCaZRYQI0GkuFacgwKdsMjTZSZmYApylrSYI23puUnQZQS4UyaFNGhVoAc6hwAtqcoMIcAFlUKYMmv6FKFu46T4VrD0CLjP9R4Tx67KTKDmjxDlV2osdCKj0LDYqotBA98qh0ezpiNqOTSnkIuEilW08gRoW3qXQRvVZRrWMWYvL8baqtQi+jiw7+koYBS99LB10G7tlHJxemYYAKr9DJPvQpoCPz7z/GADxeR2cF6PcZg5r+9samfzHM+48hSlPqGcFnCKpgUA7u+slBk6E+fu0RuJa7+gwjqkBQSiv7LUfAuP0Md3LDgsdSEMH3Hl/4x0/pQmsKLDaxX9cc9PqdSTvzvwdef+5+iDJKq99rMunSJljldLOfuc6LgBI/RY2JEHn/Tfe6cxBiHS2+mIiASkp8OVB44CxdW4dQKRdocS0HPTzHKCiD0lS6dSEFYYpo1ZSOHpk3aPMeHByjS0WwOUCr7QiYTZu5cPBLunMAdlk+Wpg/Q8BbDGM+CAeeFrrhy4JgOa1ODUaPpIMM1QBHB+nGckgSGmm1AgGerQzxOhwtpQuNCRBN9tPiehJ6zT/Hfr59P4SjpxiZfzIU1tCqAvcMLj90zu+/eqr+nWeTEMHPGdkaqAx6lxbnhyDoPg9ceZQRvTsISkknabEI0ctkJCeT4MD4ikHNwxA1gxF8ZcDReB+DGtIQLYPOfOMRQaGfQcfTECWDjvyFiGgpLS6VIDoGHS2FC7W0qn8uDVEw6KQWbnjWM0TXPzf/fv4Tjz6YPf4XT1VsGQpHBh2s98CdxXeo9BAcGVS6sxiuTfdR5QdwZFDFNx1RmNBMhUw4MqjQPAFRyWykbAQcGZQ1ZiJKqXUUZcGRQVFdKqKWUNlJwcNwZFDQWZmAgcipp102HBm0q8/BQM29ynAj4chguKtzEYNh20yGGgVHBkOZ24YhNvmfMMSP4MhgiE/yEbPBS87RIgeODFqcWzIYOnhmHPKzz0NwlOznPf5DMzzQZuTa6ww4jwgaGHB97Ujo5Z3fQLJ1CiKYdINkw3wv4mBi8fP3I6LUkuKJ+A75PxNLzRiGDB4nAAAAAElFTkSuQmCC" />
                            </g>
                        </g>
                    </svg>
                </a>
                <a href="https://corporate.t-creative-works.com/contact/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26.433"
                        height="22" viewBox="0 0 333 249">
                        <image id="レイヤー_1" data-name="レイヤー 1" width="333" height="249"
                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAZCAYAAAC/zUevAAADGUlEQVRIic1XPUhbURQ+972X5JH4GvKgijgIoiSIRiMRREHRuDgZ0GxSRF3SQLsYMgSXtBV1kQ5WpSiC4OBQEAcFnR39WQRxcAlCAsFHNGiCeaec2yZU2vqTNKEf3Onc+33fOe/+nMfcbjcwxt7puv4+k8m8RkQoB4xGoyaK4ldE/CAxxt4CwOd4PA5msxkEQSi5BUpU0zSlsrIyIkmSiblcLk3TNGswGITe3l6qSslNUKLHx8cQDocp8bSk67qSTqehq6sLHA5HyQ3kQJr39/eQzWYFwWg0pmw2G3i9XlhaWiqLgbm5OfB4PCDLMlXijm8ARVEgFouB3++HiYkJuL6+Lol4NBqF4eFhCIVCvBKUPD8Izc3Nyb6+PpyZmcGWlhY6GtjR0YEHBwf4L7G1tYUOh4Pzu91uXF9fR6/Xi3a7PUn7INnW1sblzs/Psbu7m09UVRXn5+eLtqHrOoZCITQYDJx3cHAQLy8veYySr6urS0JjY2OyqakJLy4ueCCTyWAgEOALaIyMjGAsFivIwOHhIXo8Hs4jyzJGIpF87ObmhidcX1//w4TT6cybyGFlZQVramo4AcX39vZeZGBhYQGrqqr4epfLhbu7uw/iZKKnp+dxE4STkxPs7+/nRBaLBWdnZ58Uv7q6wvHx8XwlR0dHMZFI/Dbv2SZyCAaDKIoiJ/X5fBiNRv84j6pFm47mVVdX4+Li4l85X2yCsLGxwYlJwG63487OzoP49PQ0VlRU8HhnZyceHR09yleQCfz5eWhHk5CiKLi8vIynp6c4NjaWL7/f78dUKvUkV8EmCNlsFicnJ5ExhmazOX+31NbW4tra2rM4ijaRw+bmZv70DAwM4NnZ2YvW/2pCKvQK9vl80NDQANvb2zA1NVXUdV6wCUJraysfxaL0Hcwz8H+YoKeUOh1RFMsqTHqky/UZY+bc215OUENDnRUAmCRZlu/i8bhldXUVhoaGytbo7u/v8ybHarUy1t7eHtZ1/WMikQBVVctmgvSsViuYTKYvEiJ+EgTBoqrqm9vb21fl+u+w2Wwpg8HwTdf1wHeHDZKgZpSsogAAAABJRU5ErkJggg==">
                        </image>
                    </svg>
                </a>

            </span>
        </div>
    </section>
    <!-- <section class="information">
        <div class="box_ttl box_common">
            <p>
                Information
            </p>
        </div>
        <div class="box_cont ">
            <a href="https://corporate.t-creative-works.com/works/" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/src/img/common/anken.png" alt="案件募集中">
            </a>
        </div>
    </section> -->
    <!-- <section class="contact">
        <div class="box_ttl box_common">
            <p>Contact</p>
        </div>
        <div class="box_cont"><img src="src/img/common/contact.jpg" alt=""></div>
    </section> -->



    <?php if (is_single()) { // シングルページの場合 
    ?>

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
<?php } else { // シングルページ以外の場合 
?>

<?php } ?>