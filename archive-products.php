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
            <h1 class="page-title">Products</h1>
            <ul class="product-list">
                <?php $args = array('post_type' => 'products', 'posts_per_page' => 12); ?>
                <?php $posts = get_posts($args); ?>
                <?php foreach ($posts as $post): ?>
                    <?php setup_postdata($post); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            $id = get_post_thumbnail_id();
                            $img = wp_get_attachment_image_src($id);
                            ?> 

                            <img src="<?php echo $img[0] ?>" alt="">
                            <p><?php the_title(); ?></p>

                            <?php $price = get_post_meta(get_the_ID(), 'price', true); ?>  <!--get_the_ID()で投稿のIDを取得-->
                            <?php $color = get_post_meta(get_the_ID(), 'color', true); ?>  <!--get_the_ID()で投稿のIDを取得-->
                            <?php $size = get_post_meta(get_the_ID(), 'size', true); ?>  <!--get_the_ID()で投稿のIDを取得-->
                            <p>&yen<?php echo $price; ?>+tax</p>
                            <p><?php echo $color; ?></p>
                            <p><?php echo $size; ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>

                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>
                <!-- <li>
                    <a href="item1.html">
                        <img src="img/item1.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item2.html">
                        <img src="img/item2.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item3.html">
                        <img src="img/item3.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item4.html">
                        <img src="img/item4.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item5.html">
                        <img src="img/item5.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item6.html">
                        <img src="img/item6.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item7.html">
                        <img src="img/item7.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item8.html">
                        <img src="img/item8.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item9.html">
                        <img src="img/item9.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item10.html">
                        <img src="img/item10.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item11.html">
                        <img src="img/item11.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li>
                <li>
                    <a href="item12.html">
                        <img src="img/item12.jpg" alt="">
                        <p>プロダクトタイトルプロダクトタイトル</p>
                        <p>&yen;99,999 +tax</p>
                    </a>
                </li> -->
            </ul>
            <ul class="pagination">
                <li>1</li>
                <li><a href="products2.html">2</a></li>
            </ul>
        </div>
    </main>

    <footer id="footer" class="wrapper">
        <?php get_template_part('includes/footer'); ?>
    </footer>

    <?php get_footer(); ?>
</body>

</html>