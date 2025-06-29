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

            <div class="breadClumb">
                <?php echo get_template_part('template-parts/bread') ?>
            </div>

            <h1 class="page-title">Products</h1>
            <h2 class="page-title"><?php the_archive_title(); ?></h1>
                <ul class="product-list">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    $id = get_post_thumbnail_id();
                                    $img = wp_get_attachment_image_src($id);
                                    ?>

                                    <img src="<?php echo $img[0] ?>" alt="">
                                    <p><?php the_title(); ?></p>

                                    <?php $price = get_post_meta(get_the_ID(), 'price', true); ?> <!--get_the_ID()で投稿のIDを取得-->
                                    <?php $color = get_post_meta(get_the_ID(), 'color', true); ?> <!--get_the_ID()で投稿のIDを取得-->
                                    <?php $size = get_post_meta(get_the_ID(), 'size', true); ?> <!--get_the_ID()で投稿のIDを取得-->
                                    <p>&yen<?php echo $price; ?>+tax</p>
                                    <?php $terms = get_the_terms(get_the_ID(), 'country');
                                    // var_dump($term);
                                    ?>
                                    <?php if ($terms): ?>
                                        <?php foreach ($terms as $term): ?>
                                            <p><a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?></a></p>
                                        <?php endforeach; ?>
                                    <? endif; ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>記事が見つかりませんでした</p>
                    <?php endif; ?>
                </ul>

                <div class="pagination">
                    <?php the_posts_pagination(); ?>
                </div>
        </div>
    </main>

    <footer id="footer" class="wrapper">
        <?php get_template_part('includes/footer'); ?>
    </footer>

    <?php get_footer(); ?>
</body>

</html>