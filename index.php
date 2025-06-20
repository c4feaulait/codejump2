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
        <div id="top" class="wrapper">
            <ul class="product-list">
                <?php $args = array('post_type' => 'products', 'posts_per_page' => 8); ?>
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
                            <?php $price = get_post_meta(get_the_ID(), 'price', true); ?> <!--get_the_ID()で投稿のIDを取得-->
                            <p>&yen<?php echo $price; ?>+tax</p>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </ul>

                    <?php echo get_template_part('template-parts/bread')?>


            <a class="link-text" href="products.html">View More</a>
        </div>



    </main>

    <footer id="footer" class="wrapper">
        <?php get_template_part('includes/footer'); ?>
    </footer>


    <?php get_footer(); ?>
</body>

</html>