<!-- 未入力のまま検索した時の処置 -->
<?php if (isset($_GET['s']) && empty($_GET['s'])) : ?>
    <?php echo '検索キーワードが入力されていません。'; ?>
<?php else : ?>

    <!-- 検索結果タイトル -->
    <h1 class="c-single-h1">
        <?php the_search_query(); ?>の検索結果 : <?php echo esc_html($wp_query->found_posts); ?>件
    </h1>

    <!-- 検索結果のループ文  -->
    <ul class="search-result_ul">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <li class="search-result_li">
                    <a href="<?php the_permalink(); ?>" class="search-result-li_a">
                        <h2 class="search-result_h2"><?php the_title(); ?></h2>
                    </a>
                </li>
            <?php endwhile; ?>

            <!-- 検索にヒットしなかった時 -->
        <?php else : ?>
            <p class="search-result_p">お探しの記事は見つかりませんでした。</p>

            <!-- サイト内検索やトップページ・サイトマップへのリンクへの誘導（上で紹介したコードと同じ） -->
            <div class="nonexistent-contents_wrapper">
                <p class="nonexistent_p--center">下記より目的のページをお探し下さい。</p>
                <div class="nonexistent_btn-wrapper">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nonexistent-btn_a">トップページ</a>
                    <a href="<?php echo esc_url(home_url('/')); ?>sitemap" class="nonexistent-btn_a">サイトマップ</a>
                </div>
                　　　　　<!-- サイト内検索（上で解説したものと同じ） -->
                <div class="nonexistent_search-wrapper">
                    <?php get_search_form(); ?>
                </div>

            </div>
        <?php endif; ?>

    </ul>

<?php endif; ?>