<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
</head>

<body>
    <header id="header" class="wrapper">
        <?php get_template_part('includes/header'); ?>
    </header>

    <main>
        <div class="content wrapper">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <div id="item">
                        <div class="item-img">
                            <?php
                            $id = get_post_thumbnail_id();
                            $img = wp_get_attachment_image_src($id);
                            ?>

                            <img src="<?php echo $img[0] ?>" alt="">
                        </div>
                        <div class="item-text">
                            <p>
                                テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                            <p>
                                テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                            <p>&yen;99,999 +tax</p>
                            <dl>
                                <dt>SIZE：</dt>
                                <dd>W999 × D999 × H999</dd>
                                <dt>COLOR：</dt>
                                <dd>テキスト</dd>
                                <dt>MATERIAL：</dt>
                                <dd>テキストテキストテキスト</dd>
                                <dt>生産国：</dt>
                                <dd>
                                    <?php $terms = get_the_terms(get_the_ID(), 'genre'); ?>
                                    <?php if ($terms): ?>
                                            <?php foreach ($terms as $term): ?>
                                                <a href="<?php echo get_term_link($term); ?>">
                                                <p><?php echo esc_html($term->name); ?></p>
                                                </a>
                                            <?php endforeach; ?>
                                        <? endif; ?>
                                    </a>
                                </dd>
                            </dl>

                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>記事が見つかりませんでした</p>
            <?php endif; ?>

            <a class="link-text" href="products.html">Back To Products</a>
        </div>
    </main>

    <footer id="footer" class="wrapper">
        <?php get_template_part('includes/footer'); ?>
    </footer>


    <?php get_footer(); ?>
</body>